<div class="header-top fixed-top">
    <div class="wd-sl-topheadleft">
        <a href="{{route('front.home')}}" class="d-block mr-4"><img src="{{site_logo}}"> </a>
    </div>
    <div class="wd-sl-topheadright">
        <a href="{{route('front.subscription.index')}}" class="wd-sl-upgrade"> <img
                src="{{asset('assets/web/dashboard/images/Upgrade.svg')}}"> </a>
        @if(\Illuminate\Support\Facades\Auth::user()->DealerStock()->count()>0)
            <a href="{{route('front.my_website')}}" class="wd-sl-mywebtop"> <img
                    src="{{asset('assets/web/dashboard/images/mywebsite.svg')}}"></a>
        @endif
        <a href="javascript:;" id="show-hidden-menu"> <img src="{{Auth::user()->profile_image}}"
                                                           class="profile_img mr-2">
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3"
                      d="M4.58829 5.8272C4.63416 5.88049 4.69555 5.92407 4.76715 5.95417C4.83875 5.98427 4.91843 6 4.99932 6C5.08021 6 5.15989 5.98427 5.2315 5.95417C5.3031 5.92407 5.36448 5.88049 5.41035 5.8272L9.91071 0.627557C9.9628 0.567584 9.99335 0.497339 9.99903 0.424453C10.0047 0.351568 9.98532 0.27883 9.94295 0.214143C9.90058 0.149456 9.83686 0.0952928 9.75871 0.0575393C9.68056 0.0197859 9.59097 -0.00011453 9.49967 4.95827e-07H0.49897C0.407885 0.000301439 0.318625 0.0204577 0.24079 0.0583016C0.162955 0.0961456 0.0994899 0.150245 0.0572196 0.214783C0.0149493 0.279321 -0.00452694 0.351854 0.000885468 0.424584C0.00629787 0.497313 0.0363941 0.567486 0.0879376 0.627557L4.58829 5.8272Z"
                      fill="black"/>
            </svg>
        </a>
        <div class="hidden-menu" style="display: none;">
            <ul>
                <li><a href="{{route('front.my_profile')}}">My Profile</a></li>
                <li><a href="{{route('front.dealer_details')}}">Dealer Details</a></li>
                <li><a href="{{route('front.settings')}}">Settings</a></li>
                <li><a href="{{route('front.logout')}}">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
