<!DOCTYPE html>
<html>
<head>
    <title>Mongo | Invoice</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    @font-face {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        src: url(https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap) format('truetype');
    }

    body {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .wd-sl-greybox tr td {
        font-size: 12px;
        color: #545454;
        padding: 0 0 12px;
        width: 100%;
    }

    .wd-sl-greybox tr th {
        font-size: 12px;
        font-weight: 500;
        border-bottom: 1px solid rgb(0 0 0 / 10%);
        padding: 10px 0;
        margin-bottom: 10px;
    }

    .wd-sl-greybox tr, .wd-sl-greybox tr th {
        width: 100%;
    }

    .wd-sl-total tr:nth-child(odd) {
        background-color: #fff;
    }

    .wd-sl-total {
        background: #f2f2f2;
        box-sizing: border-box;
        box-shadow: 0px 4px 20px rgb(0 0 0 / 25%);
        border-radius: 20px;
        border-spacing: unset;
        margin: 20px 0;
    }

    .wd-sl-total th {
        font-size: 18px;
        font-weight: 600;
        color: #000;
        padding: 7px 20px;
    }

    .wd-sl-total tr td {
        font-size: 12px;
        font-weight: 400;
        color: #545454;
        padding: 10px 20px;
    }

    .wd-sl-text {
        margin: 0px 0 20px;
    }

    .wd-sl-text tr td {
        font-size: 12px;
        font-weight: 400;
        padding-bottom: 10px;
        color: #545454;
    }

    .wd-sl-signlbog tr td {
        font-size: 12px;
        font-weight: 500;
        color: #545454;
    }

    .row {
        margin-top: 20px;
    }

    .column {
        float: left;
        width: 50%;
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
<body style="max-width: 1140px;margin: 0 auto;border: none;">
<div
    style="background-image: url({{asset('assets/web/images/bg.png')}});background-repeat: no-repeat;background-size: auto;background-position: 100% 0%;">
    <table>
        <thead>
        <tr>
            <th style="text-align: left;"><img src="{{$logo}}"
                                               style="padding: 0 0px 30px;"/></th>
            <th style="text-align: right;padding-bottom: 20px;"><img src="{{asset('assets/web/images/bg3.png')}}"></th>
        </tr>
        </thead>
    </table>
    <table>
        <thead>
        <tr>
            <th style="background-color: #102442;height: 47px;width:100%;"></th>
        </tr>
        </thead>
    </table>
    <div class="row">
        <div class="column">
            <table style="width: 99%;margin-right: auto;">
                <thead style="width: 100%;border-radius:20px;box-sizing: border-box;background-color: #f2f2f2;">
                <tr>
                    <th style="font-size: 12px;font-weight: 500;background-color: #FFAC1F;padding: 10px 10px;border-radius: 10px 10px 0 0;text-align: left;">
                        Vehicle Detail
                    </th>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 10px 10px 8px;">VRN
                        : {{$registration_number}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 10px 10px 8px;">Vehicle Make and
                        Model: {{$model}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 10px 10px 8px;">Mileage : {{$mileage}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 10px 10px 8px;">Vehicle Color :{{$color}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 10px 10px 8px;">Engine Size
                        : {{$engine_size}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 10px 10px 8px;">Engine Number
                        :{{$engine_number}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 10px 10px 8px;">Date of Registration
                        :{{$date_registration}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 10px 10px 8px;">Vin Number :{{$vin_number}}</td>
                </tr>
                </thead>
            </table>
        </div>
        <div class="column" style="padding: 21px 0;">
            <table style="width: 99%;margin-left: auto;">
                <thead style="text-align: right;margin-left: auto;">
                <tr>
                    <th style="border: none;font-size: 14px;font-weight: 600;margin-bottom: 0;text-align: right;padding: 0px 0 10px;">
                        {{ucfirst($type)}} Receipt
                    </th>
                </tr>
                <tr>
                    <td style="padding-bottom: 5px;font-size: 12px">{{$vendor_address}}</td>
                </tr>
                <tr>
                    <td style="padding-bottom: 5px;font-size: 12px">{{$vendor_email}} | {{$vendor_mobile}}</td>
                </tr>
                <tr>
                    <td style="padding-bottom: 18px;font-size: 12px">{{$vendor_website}}</td>
                </tr>
                </thead>
                <thead style="width: 100%;border-radius:20px;box-sizing: border-box;background-color: #f2f2f2;">
                <tr>
                    <th style="font-size: 12px;font-weight: 500;background-color: #FFAC1F;padding: 10px 10px;border-radius: 10px 10px 0 0;text-align: left;">
                        Customer Detail
                    </th>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 10px 10px 8px;">Name : {{$customer_name}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 4px 10px 20px;">Address
                        : {{$house_number.', '.$address.'-'.$postcode}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 4px 10px 8px;">Email ID :{{$email}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12px;color: #545454;padding: 4px 10px 8px;">Contact No
                        :{{$contact_number}}</td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <table class="wd-sl-total">
        <thead>
        <tr style="background: #FFAC1F;border-radius: 20px 20px 0px 0px;">
            <th style="text-align: left;border-radius: 20px 0px 0 0;">Type</th>
            <th style="text-align: left;border-radius: 0px 0px 0 0;">Detail</th>
            <th style="text-align: center;border-radius: 0px 20px 0 0;">Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Vehicle price</td>
            <td>-</td>
            <td style="text-align: center;">{{$price}}</td>
        </tr>
        <tr>
            <td>Admin Fee</td>
            <td>{{$admin_description}}</td>
            <td style="text-align: center;">{{$admin_cost}}</td>
        </tr>
        <tr>
            <td>Value Added Product</td>
            <td>{{$product_description}}</td>
            <td style="text-align: center;">{{$product_cost}}</td>
        </tr>
        <tr>
            <td>Part Exchange</td>
            <td>{{$part_exchange_registration_number}}</td>
            <td style="text-align: center;">{{$part_exchange_cost}}</td>
        </tr>
        <tr>
            <td>Finance</td>
            <td>{{$finance_description}}</td>
            <td style="text-align: center;">{{$finance_cost}}</td>
        </tr>
        <tr>
            <td>Deposit Value</td>
            <td>{{$deposit_description}}</td>
            <td style="text-align: center;">{{$deposit_cost}}</td>
        </tr>
        <tr>
            <td>Discount Value</td>
            <td>{{$discount_description}}</td>
            <td style="text-align: center;">{{$discount_cost}}</td>
        </tr>
        <tr style="background-color: #102442;">
            <td colspan="2" style="font-size: 12px;font-weight: 600;color: #fff;padding: 14px 20px;">Total Outstanding (To be
                paid)
            </td>
            <td style="text-align: center;font-size: 12px;font-weight: 600;color: #fff;padding: 14px 20px;">{{$sale_price}}</td>
        </tr>
        </tbody>
        <table class="wd-sl-text">

            <tbody>
            <tr>
                <td style="font-size: 12px;font-weight: 500;padding-bottom: 10px;color: #000;text-align: left;">
                    Terms and Conditions
                </td>
            </tr>
            <tr>
                <td>{{$notes}}
                </td>
            </tr>
            <tr>
                <td style="font-size: 12px;font-weight: 500;padding-bottom: 10px;color: #000;text-align: left;">
                    Principle Agreement
                </td>
            </tr>
            <tr>
                <td>1. I, the customer agree to settle payment for the sum, shown on the invoice, which was
                    established/agreed upon by myself the customer and the dealer or representative.
                </td>
            </tr>
            <tr>
                <td>2. I, the customer have conducted the necessary checks on the documents of the vehicle up to a
                    satisfactory standard and understand that {{$vendor_trading_name}} will not be held / responsible
                    for any misinterpretations or assumptions held by myself.
                </td>
            </tr>
            <tr>
                <td>3. I understand that {{$vendor_trading_name}} cannot be held responsible for any errors or faults in
                    the mileage unless the vehicle has been advertised as a “mileage warranty”.
                </td>
            </tr>
            <tr>
                <td>4. I agree to pay the administration costs involved to {{$vendor_trading_name}} which covers the cost
                    of Postage and Packaging of the relevant documents,processing and handling of the vehicle logbook
                    and internet/advertising fees as well as an AA break down cover and a 30 day GAP insurance cover.
                    <br>(Please Note: the administration fee is a non refundable charge)
                </td>
            </tr>
            <tr>
                <td>2. In the event of a holding deposit having been paid on a vehicle and the buyer no longer wishes to
                    purchase the vehicle, the administration costs will be deducted from the deposit and will not be
                    returned to the customer. <br> ( Please Note: This policy will also be enforced when buyers return
                    vehicles.)
                </td>
            </tr>
            </tbody>

            <tbody>
            <tr>
                <td style="font-size: 12px;font-weight: 500;padding-bottom: 10px;color: #000;text-align: left;">
                    Faulty/Mechanical Repairs
                </td>
            </tr>
            <tr>
                <td>1. The customer may only claim liability/compensation for the amount he/she is entitled to which is
                    shown on the warranty letter.
                </td>
            </tr>
            <tr>
                <td>2. In the event of the vehicle being faulty, or having any mechanical issues, which are covered by
                    the policy agreement provided by customer protect or a similar warranty agreement provided by
                    {{$vendor_trading_name}}, the customer would be responsible for notifying {{$vendor_trading_name}} .
                    If the customer decides to address the fault/mechanica issue privately,
                    {{$vendor_trading_name}} will not be held responsible for the access charges incurred by the customer and
                    may not be obliged to fully reimburse the customers costs.
                </td>
            </tr>
            <tr>
                <td>3. {{$vendor_trading_name}} will not be held accountable on matters concerning the warranty of the
                    vehicle and any disagreements between the warranty provider and provider and the customer will not
                    be of any concern to {{$vendor_trading_name}}
                </td>
            </tr>
            </tbody>

            <tbody>
            <tr>
                <td style="font-size: 12px;font-weight: 500;padding-bottom: 10px;color: #000;text-align: left;">
                    Liability
                </td>
            </tr>
            <tr>
                <td>1. Once the agreement has been made between the buyer and the dealer, the buyer would be responsible
                    for insuring the vehicle and the purchase of the necessary road tax and/or MOT4
                </td>
            </tr>
            <tr>
                <td>2. After completion of the agreement between the buyer and the dealer, the buyer must ensure that
                    the vehicle undergoes routine checks and mechanical inspections and is of a satisfactory standard to
                    be used on the road.
                </td>
            </tr>
            </tbody>
        </table>

    </table>
    <table class="wd-sl-signlbog">
        <tbody>
        <tr>
            <th style="text-align: center;border-top: 2px solid #545454;"></th>
            <th style="text-align: center;border-top: 2px solid #545454;"></th>
        </tr>
        <tr>
            <td style="text-align: center;padding-top: 10px;padding-right: 15px;">Customer Name (Block Capitals)</td>
            <td style="text-align: center;padding-top: 10px;padding-left: 15px;">Customer Signature</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
