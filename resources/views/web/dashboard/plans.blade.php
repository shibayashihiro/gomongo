@extends('layouts.web.dashboard.app')

@section('header_css')
    <link href="{{asset('assets/web/css/checkout.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="wd-md-rightbar">
        <div class="wd-md-topbar">
            <h2>{{$title}}</h2>
        </div>

        <div class="wd-md-bottombar">
            <div class="price-blogs">
                <h3 class="d-block text-center">Pricing For Every Business To Any Stage</h3>
                <div class="main-blog-price">
                    <div class="row">
                        @if(!empty($plan))
                            @foreach($plan as $key => $value)
                                <div class="col-md-4" id="wrap-top">
                                    <div class="main-price">
                                        <div class="starter">
                                            <p>{{$value->name}}</p>
                                            <h4>{{place_currency($value->price).'+VAT'}}</h4>
                                            <span>{{$value->validity}}</span>
                                        </div>
                                        <div class="load-manage mt-4">
                                            {!! $value->description !!}
                                        </div>
                                        <div class="text-center">
                                            <button class="add-stock-btn" type="button"
                                                    onclick="stripPayment('{{$value->id}}')">
                                                Purchase
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Additional Price Modal start -->
    <div class="modal fade wd-md-myexpense-popup" id="stripPaymentModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <form id="payment-form">
                    <div id="payment-element">
                        <!--Stripe.js injects the Payment Element-->
                    </div>
                    <button id="submit" class="btnStripPay">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Pay now</span>
                    </button>
                    <div id="payment-message" class="hidden"></div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let plan_id = 0;

        function stripPayment(id) {
            plan_id = id;
            initialize();
            $("#stripPaymentModal").modal('show');
        }

        // A reference to Stripe.js initialized with a fake API key.
        const stripe = Stripe("pk_live_51LdYReIWc2J4BeGZWZb8kFwHtv4VNZls8jLlNIqm1MDWmPUuEgBKb6o1ECDe0iUoAqQCfl7OHg0LvrpcROGwwCTo00HCSMCI1u");
        //const stripe = Stripe("pk_test_51LdYReIWc2J4BeGZmtpkmZJT3sfE6BzOANzd6dQetP1wwBwiDu1YPFsOqHEatGgVGxBSQofN9wIQxkCGJLql2nES008taFwcRp");
        //const stripe = Stripe("pk_test_TYooMQauvdEDq54NiTphI7jx");

        // The items the customer wants to buy


        let elements;


        checkStatus();

        document
            .querySelector("#payment-form")
            .addEventListener("submit", handleSubmit);

        // Fetches a payment intent and captures the client secret
        async function initialize() {
            addOverlay();
            const {clientSecret} = await fetch("{{route('front.subscription.create_payment_intent')}}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(plan_id)
            }).then((r) => r.json());

            elements = stripe.elements({clientSecret});

            const paymentElement = elements.create("payment");
            paymentElement.mount("#payment-element");
            removeOverlay();
        }

        async function handleSubmit(e) {
            e.preventDefault();
            setLoading(true);

            const {error} = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "{{route('front.subscription.payment')}}",
                },
            });

            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occured.");
            }

            setLoading(false);
        }

        // Fetches the payment intent status after payment submission
        async function checkStatus() {
            const clientSecret = new URLSearchParams(window.location.search).get(
                "payment_intent_client_secret"
            );

            if (!clientSecret) {
                return;
            }

            const {paymentIntent} = await stripe.retrievePaymentIntent(clientSecret);

            switch (paymentIntent.status) {
                case "succeeded":
                    showMessage("Payment succeeded!");
                    break;
                case "processing":
                    showMessage("Your payment is processing.");
                    break;
                case "requires_payment_method":
                    showMessage("Your payment was not successful, please try again.");
                    break;
                default:
                    showMessage("Something went wrong.");
                    break;
            }
        }

        // ------- UI helpers -------

        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");

            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;

            setTimeout(function () {
                messageContainer.classList.add("hidden");
                messageText.textContent = "";
            }, 4000);
        }

        // Show a spinner on payment submission
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        }
    </script>
@endsection
