<nav class="navbar navbar-expand-lg navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('front.dashboard')}}"><img src="{{site_logo}}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll justify-content-center">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#how-it-works">How It Works</a></li>
                <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="{{route('front.get_login')}}">
                    <button type="button" class="btn btn-link"><i class="bi bi-person"></i> Login</button>
                </a>
                <a href="{{route('front.get_signup')}}">
                    <button type="button" class="btn btn-primary">Sign-up</button>
                </a>
            </div>
        </div>
    </div>
</nav>
