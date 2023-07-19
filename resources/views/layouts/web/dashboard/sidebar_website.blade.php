<div class="sidetop-menu website_menu">
    <ul>
        <li>
            <a href="{{route('front.website.home')}}" class="{{ isActiveRoute('front.website.home')}}"><i class="fas fa-home"></i><span>Home</span></a>
        </li>
        <li>
            <a href="{{route('front.website.services')}}" class="{{ isActiveRoute('front.website.services')}}"><i class="fab fa-servicestack"></i><span>Services</span></a>
        </li>
        <li>
            <a href="{{route('front.website.testimonials')}}" class="{{ isActiveRoute('front.website.testimonials')}}"><i class="fas fa-comment-dots"></i><span>Testimonials</span></a>
        </li>
        <li>
            <a href="{{route('front.website.recent_stock')}}" class="{{ isActiveRoute('front.website.recent_stock')}}"><i class="fas fa-cubes"></i><span>Recent Stock</span></a>
        </li>
        <li>
            <a href="{{route('front.website.openingHour')}}" class="{{ isActiveRoute('front.website.openingHour')}}"><i class="fas fa-clock"></i><span>Opening Hours</span></a>
        </li>
        <li>
            <a href="{{route('front.website.setting')}}" class="{{ isActiveRoute('front.website.setting')}}"><i class="fas fa-cogs"></i><span>Setting</span></a>
        </li>
    </ul>
</div>
<div class="sidebottom-menu">
    <a href="{{route('front.logout')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="25" viewBox="0 0 28 25" fill="none">
            <path
                d="M6.25 11.25H16.25V13.75H6.25V17.5L0 12.5L6.25 7.5V11.25ZM5 20H8.385C9.82835 21.2729 11.6084 22.1023 13.5114 22.3887C15.4145 22.675 17.3597 22.4062 19.1138 21.6144C20.8678 20.8226 22.3561 19.5415 23.4001 17.9248C24.4441 16.3081 24.9994 14.4245 24.9994 12.5C24.9994 10.5755 24.4441 8.69193 23.4001 7.07523C22.3561 5.45854 20.8678 4.17743 19.1138 3.38562C17.3597 2.59382 15.4145 2.32497 13.5114 2.61133C11.6084 2.89768 9.82835 3.72708 8.385 5H5C6.16332 3.44647 7.67291 2.18564 9.40884 1.31768C11.1448 0.449719 13.0592 -0.00145455 15 3.52286e-06C21.9037 3.52286e-06 27.5 5.59625 27.5 12.5C27.5 19.4037 21.9037 25 15 25C13.0592 25.0015 11.1448 24.5503 9.40884 23.6823C7.67291 22.8144 6.16332 21.5535 5 20Z"
                fill="white"/>
        </svg>
    </a>
</div>
