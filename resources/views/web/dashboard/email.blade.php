@extends('layouts.web.dashboard.app')

@section('header_css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/style2.css')}}">
    <style>
        .reaply-pop {
            height: 100%;
            display: flex;
            align-items: center;
        }
    </style>
@endsection

@section('content')
    <section id="email-body">
        <div class="col-lg-2 col-md-12 email-link ">
            <div class="mail-blog inquiries">
                <div class="us-em-box row">
                    <div class="col-md-9">
                        <div class="us-contact-details"> <img src="{{asset('assets/web/dashboard/images/inbox-user1.png')}}" alt="">
                            <div class="us-dt-text">
                                <h5>Brooklyn</h5>
                                <p><a href="mailto:brooklyn@gmail.com">brooklyn@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 my-auto text-center">
                        <a href="#" class="add-icon">
                            <svg class="gb_xb" enable-background="new 0 0 24 24" focusable="false" height="20" viewBox="0 0 24 24" width="20" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M9 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 7c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6 5H3v-.99C3.2 16.29 6.3 15 9 15s5.8 1.29 6 2v1zm3-4v-3h-3V9h3V6h2v3h3v2h-3v3h-2z"></path>
                                    </svg>
                        </a>
                    </div>
                </div>
                <!-- <h2>Email</h2> -->
                <div class="compose-btn">
                    <button type="button" data-toggle="modal" data-target="#addstock">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4758 0.567324L0.567324 13.4758C0.203952 13.8391 0 14.3316 0 14.8447V18.1828C0 18.5391 0.289149 18.8282 0.645422 18.8282C0.645422 18.8282 2.92053 18.8282 3.98354 18.8282C4.49665 18.8282 4.98911 18.6243 5.35248 18.2609L18.2609 5.35248C18.6236 4.98976 18.8282 4.4973 18.8282 3.98354C18.8282 3.46979 18.6243 2.97733 18.2609 2.6146L16.2136 0.567324C15.8509 0.203952 15.3585 0 14.8447 0C14.3309 0 13.8385 0.204597 13.4758 0.567324ZM12.263 3.60533L15.2229 6.56523L4.43986 17.3483C4.31852 17.4696 4.15458 17.5374 3.98354 17.5374H1.29084V14.8447C1.29084 14.6737 1.35861 14.5097 1.47995 14.3884L12.263 3.60533ZM16.1355 5.6526L13.1756 2.6927L14.3884 1.47995C14.5091 1.35926 14.6737 1.29084 14.8447 1.29084C15.0157 1.29084 15.1803 1.35926 15.301 1.47995L17.3483 3.52723C17.469 3.64792 17.5374 3.81251 17.5374 3.98354C17.5374 4.15458 17.469 4.31916 17.3483 4.43986L16.1355 5.6526Z" fill="white" /> </svg> Compose</button>
                </div>
                <div class="nav flex-column nav-pills email-menu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-inbox-tab" data-toggle="pill" href="#v-pills-inbox" role="tab" aria-controls="v-pills-inbox" aria-selected="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="21" viewBox="0 0 28 21" fill="none">
                            <path d="M24.6187 2.90391C24.6187 2.87164 24.5864 2.87164 24.5864 2.83937C23.7152 1.06477 21.9406 0 19.9724 0H7.19523C5.22703 0 3.45242 1.09703 2.58125 2.83937C2.58125 2.87164 2.54898 2.87164 2.54898 2.90391L0.129063 8.42133C0.0645313 8.58266 0 8.77625 0 8.96984V15.4875C0 18.3269 2.32312 20.65 5.1625 20.65H22.0052C24.8445 20.65 27.1677 18.3269 27.1677 15.4875V8.96984C27.1677 8.77625 27.1354 8.58266 27.0386 8.42133L24.6187 2.90391ZM4.90438 4.00094C5.35609 3.12977 6.22727 2.61352 7.19523 2.61352H19.9724C20.9404 2.61352 21.8116 3.16203 22.2633 4.00094L23.8766 7.67922H18.8431C18.2301 7.67922 17.7138 8.09867 17.5848 8.71172C17.5525 8.84078 16.8749 12.0673 13.5838 12.0673C10.3895 12.0673 9.64742 9.06664 9.58289 8.71172C9.45383 8.09867 8.93758 7.67922 8.32453 7.67922H3.25883L4.90438 4.00094ZM24.5864 15.4875C24.5864 16.9072 23.4248 18.0687 22.0052 18.0687H5.1625C3.74281 18.0687 2.58125 16.9072 2.58125 15.4875V10.2605H7.35656C8.09867 12.1641 9.97008 14.6486 13.5838 14.6486C17.1976 14.6486 19.069 12.1641 19.8111 10.2605H24.5864V15.4875Z" fill="#333333" /> </svg> Inbox </a>
                    <a class="nav-link" id="v-pills-send-tab" data-toggle="pill" href="#v-pills-send" role="tab" aria-controls="v-pills-send" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path d="M1.2776 9.11158L9.05893 13.2941L13.2371 21.071C13.3292 21.2422 13.5092 21.3475 13.7023 21.3475C13.7154 21.3475 13.7286 21.3475 13.7374 21.3475C13.9437 21.3344 14.1236 21.1983 14.1938 21.0052L21.3168 1.70768C21.3871 1.51457 21.3388 1.29952 21.1939 1.15469C21.0491 1.00986 20.8341 0.961584 20.641 1.0318L1.34343 8.15043C1.15032 8.22065 1.01427 8.40059 1.0011 8.60686C0.987938 8.81314 1.09327 9.01063 1.2776 9.11158ZM13.6145 19.5437L10.0991 12.9957L19.4999 3.59486L13.6145 19.5437ZM18.7538 2.84877L9.35298 12.254L2.8049 8.73414L18.7538 2.84877Z" fill="black" stroke="black" stroke-width="1.1" /> </svg> Send </a>
                    <a class="nav-link" id="v-pills-draft-tab" data-toggle="pill" href="#v-pills-draft" role="tab" aria-controls="v-pills-draft" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.9535 21.3075V9.85295C23.9535 9.11156 23.5954 8.41608 22.9925 7.98532C21.1631 6.67927 15.9159 2.93096 13.8111 1.42751C13.0131 0.857497 11.9404 0.857497 11.1424 1.42751C9.03754 2.93096 3.79037 6.67927 1.96098 7.98532C1.35807 8.41608 1 9.11156 1 9.85295V21.3075C1 21.9165 1.24177 22.5003 1.67253 22.9303C2.10253 23.3611 2.68631 23.6029 3.29535 23.6029C7.23875 23.6029 17.7147 23.6029 21.6581 23.6029C22.2672 23.6029 22.8509 23.3611 23.2809 22.9303C23.7117 22.5003 23.9535 21.9165 23.9535 21.3075ZM22.4232 10.5523L13.8111 16.7038C13.0131 17.2738 11.9404 17.2738 11.1424 16.7038L2.53023 10.5523V21.3075C2.53023 21.5103 2.61057 21.7054 2.75441 21.8484C2.89749 21.9923 3.09259 22.0726 3.29535 22.0726H21.6581C21.8609 22.0726 22.056 21.9923 22.1991 21.8484C22.3429 21.7054 22.4232 21.5103 22.4232 21.3075V10.5523ZM21.8724 9.06566L12.9213 2.67236C12.6558 2.48261 12.2977 2.48261 12.0322 2.67236L3.08112 9.06566L12.0322 15.459C12.2977 15.6487 12.6558 15.6487 12.9213 15.459L21.8724 9.06566Z" fill="black" stroke="black" /> </svg> Draft</a>
                    <a class="nav-link" id="v-pills-delete-tab" data-toggle="pill" href="#v-pills-delete" role="tab" aria-controls="v-pills-delete" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
                            <path d="M7.04167 2.89H6.83333C6.94792 2.89 7.04167 2.7955 7.04167 2.68V2.89H14.9583V2.68C14.9583 2.7955 15.0521 2.89 15.1667 2.89H14.9583V4.78H16.8333V2.68C16.8333 1.75337 16.0859 1 15.1667 1H6.83333C5.91406 1 5.16667 1.75337 5.16667 2.68V4.78H7.04167V2.89ZM20.1667 4.78H1.83333C1.3724 4.78 1 5.15538 1 5.62V6.46C1 6.5755 1.09375 6.67 1.20833 6.67H2.78125L3.42448 20.3988C3.46615 21.2939 4.20052 22 5.08854 22H16.9115C17.8021 22 18.5339 21.2965 18.5755 20.3988L19.2187 6.67H20.7917C20.9062 6.67 21 6.5755 21 6.46V5.62C21 5.15538 20.6276 4.78 20.1667 4.78ZM16.7109 20.11H5.28906L4.65885 6.67H17.3411L16.7109 20.11Z" fill="black" />
                            <path d="M7.04167 2.89H6.83333C6.94792 2.89 7.04167 2.7955 7.04167 2.68V2.89ZM7.04167 2.89H14.9583V2.68C14.9583 2.7955 15.0521 2.89 15.1667 2.89H14.9583V4.78H16.8333V2.68C16.8333 1.75337 16.0859 1 15.1667 1H6.83333C5.91406 1 5.16667 1.75337 5.16667 2.68V4.78H7.04167V2.89ZM20.1667 4.78H1.83333C1.3724 4.78 1 5.15537 1 5.62V6.46C1 6.5755 1.09375 6.67 1.20833 6.67H2.78125L3.42448 20.3987C3.46615 21.2939 4.20052 22 5.08854 22H16.9115C17.8021 22 18.5339 21.2965 18.5755 20.3987L19.2187 6.67H20.7917C20.9062 6.67 21 6.5755 21 6.46V5.62C21 5.15537 20.6276 4.78 20.1667 4.78ZM16.7109 20.11H5.28906L4.65885 6.67H17.3411L16.7109 20.11Z" stroke="black" stroke-width="0.6" /> </svg> Delete</a>
                    <a class="nav-link" id="v-pills-important-tab" data-toggle="pill" href="#v-pills-important" role="tab" aria-controls="v-pills-important" aria-selected="false">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 7L10.5 0L7.5 6.5L0 7.5L5 12.5L4 20L10.5 16L17.5 20.5L15.5 12.5L21 7.5L13.5 7Z" fill="black" /> </svg> Starred </a>
                    <a class="nav-link" id="v-pills-spam-tab" data-toggle="pill" href="#v-pills-spam" role="tab" aria-controls="v-pills-spam" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="76" viewBox="0 0 90 76" fill="none">
                            <path d="M68 0C55.86 0 46 9.87 46 22C46 22.67 46.03 23.34 46.09 24H6C2.69 24 0 26.69 0 30V70C0 73.31 2.69 76 6 76H76C79.3 76 82 73.31 82 70V38.96C86.88 34.92 90 28.81 90 22C90 9.87 80.13 0 68 0ZM6 28H46.83C47.03 28.68 47.25 29.35 47.51 30C49.55 35.22 53.54 39.48 58.58 41.87L42.11 52.86C41.43 53.3 40.56 53.3 39.89 52.86L5.6 30L4.23 29.08C4.56 28.44 5.22 28 6 28ZM4 33.74L28.39 50L4 66.26V33.74ZM76 72H6C5.22 72 4.56 71.55 4.23 70.91L31.99 52.4L37.67 56.18C38.68 56.86 39.84 57.19 41 57.19C42.15 57.19 43.31 56.86 44.32 56.18L50 52.4L77.76 70.91C77.43 71.55 76.77 72 76 72ZM78 66.26L53.6 50L63.35 43.5C64.85 43.82 66.4 44 68 44C71.6 44 74.99 43.12 78 41.58V66.26ZM68 40C58.07 40 50 31.92 50 22C50 12.07 58.07 4 68 4C77.92 4 86 12.07 86 22C86 31.92 77.92 40 68 40Z" fill="black" />
                            <path d="M68 10C66.89 10 66 10.89 66 12V24C66 25.1 66.89 26 68 26C69.1 26 70 25.1 70 24V12C70 10.89 69.1 10 68 10Z" fill="black" />
                            <path d="M68 34C69.1046 34 70 33.1046 70 32C70 30.8954 69.1046 30 68 30C66.8954 30 66 30.8954 66 32C66 33.1046 66.8954 34 68 34Z" fill="black" /> </svg> Spam </a>
                    <div class="hrline"></div>
                    <a class="nav-link" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="69" height="76" viewBox="0 0 69 76" fill="none">
                            <path d="M39.1 32.4001C41.0383 32.4001 42.933 31.8253 44.5446 30.7485C46.1562 29.6716 47.4123 28.1411 48.1541 26.3504C48.8958 24.5596 49.0899 22.5892 48.7117 20.6882C48.3336 18.7872 47.4003 17.041 46.0297 15.6704C44.6591 14.2999 42.913 13.3665 41.0119 12.9884C39.1109 12.6102 37.1405 12.8043 35.3498 13.546C33.559 14.2878 32.0285 15.5439 30.9516 17.1555C29.8748 18.7671 29.3 20.6618 29.3 22.6001C29.3 25.1992 30.3325 27.6918 32.1704 29.5297C34.0083 31.3676 36.5009 32.4001 39.1 32.4001V32.4001ZM39.1 16.8001C40.2472 16.8001 41.3686 17.1402 42.3224 17.7775C43.2762 18.4148 44.0196 19.3207 44.4585 20.3805C44.8975 21.4403 45.0124 22.6065 44.7886 23.7316C44.5648 24.8567 44.0124 25.8901 43.2013 26.7013C42.3901 27.5124 41.3567 28.0648 40.2316 28.2886C39.1065 28.5124 37.9403 28.3975 36.8805 27.9586C35.8207 27.5196 34.9148 26.7762 34.2775 25.8224C33.6402 24.8686 33.3 23.7472 33.3 22.6001C33.3 21.0618 33.9111 19.5865 34.9988 18.4988C36.0865 17.4111 37.5618 16.8001 39.1 16.8001V16.8001Z" fill="black" />
                            <path d="M27.8001 62.4H50.4001C51.9914 62.4 53.5175 61.7678 54.6427 60.6426C55.768 59.5174 56.4001 57.9913 56.4001 56.4V49.3C56.3948 46.2005 55.3461 43.1931 53.4232 40.7623C51.5003 38.3314 48.8151 36.6187 45.8001 35.9C45.4346 35.8176 45.0534 35.8396 44.6998 35.9634C44.3462 36.0871 44.0345 36.3077 43.8001 36.6C43.2585 37.3053 42.5619 37.8765 41.7643 38.2697C40.9667 38.6628 40.0894 38.8673 39.2001 38.8673C38.3109 38.8673 37.4335 38.6628 36.6359 38.2697C35.8383 37.8765 35.1417 37.3053 34.6001 36.6C34.3658 36.3077 34.054 36.0871 33.7004 35.9634C33.3468 35.8396 32.9656 35.8176 32.6001 35.9C29.5308 36.5457 26.7791 38.2323 24.8109 40.6744C22.8427 43.1164 21.7791 46.1636 21.8001 49.3V56.4C21.8001 57.9913 22.4323 59.5174 23.5575 60.6426C24.6827 61.7678 26.2088 62.4 27.8001 62.4V62.4ZM25.8001 49.3C25.7899 47.3064 26.4007 45.3591 27.5475 43.7284C28.6944 42.0977 30.3205 40.8645 32.2001 40.2C34.0421 42.0048 36.5213 43.0109 39.1001 43C40.378 43.0108 41.6454 42.769 42.8295 42.2885C44.0136 41.808 45.0911 41.0982 46.0001 40.2C47.8636 40.8892 49.4736 42.1286 50.6166 43.7538C51.7596 45.379 52.3816 47.3132 52.4001 49.3V56.4C52.4001 56.9304 52.1894 57.4391 51.8143 57.8142C51.4393 58.1893 50.9305 58.4 50.4001 58.4H27.8001C27.2697 58.4 26.761 58.1893 26.3859 57.8142C26.0108 57.4391 25.8001 56.9304 25.8001 56.4V49.3Z" fill="black" />
                            <path d="M14.4 75.2H59C60.3132 75.2 61.6136 74.9413 62.8268 74.4388C64.0401 73.9362 65.1425 73.1997 66.0711 72.2711C66.9997 71.3425 67.7362 70.2401 68.2388 69.0268C68.7413 67.8136 69 66.5132 69 65.2V10C69 8.68678 68.7413 7.38642 68.2388 6.17317C67.7362 4.95991 66.9997 3.85752 66.0711 2.92893C65.1425 2.00035 64.0401 1.26375 62.8268 0.761205C61.6136 0.258658 60.3132 0 59 0H14.4C11.7478 0 9.2043 1.05357 7.32893 2.92893C5.45357 4.8043 4.4 7.34784 4.4 10V16.1H2C1.46957 16.1 0.96086 16.3107 0.585787 16.6858C0.210714 17.0609 0 17.5696 0 18.1C0 18.6304 0.210714 19.1391 0.585787 19.5142C0.96086 19.8893 1.46957 20.1 2 20.1H4.4V35.6H2C1.46957 35.6 0.96086 35.8107 0.585787 36.1858C0.210714 36.5609 0 37.0696 0 37.6C0 38.1304 0.210714 38.6391 0.585787 39.0142C0.96086 39.3893 1.46957 39.6 2 39.6H4.4V55.1H2C1.46957 55.1 0.96086 55.3107 0.585787 55.6858C0.210714 56.0609 0 56.5696 0 57.1C0 57.6304 0.210714 58.1391 0.585787 58.5142C0.96086 58.8893 1.46957 59.1 2 59.1H4.4V65.2C4.4 67.8522 5.45357 70.3957 7.32893 72.2711C9.2043 74.1464 11.7478 75.2 14.4 75.2V75.2ZM8.4 39.6H11.2C11.7304 39.6 12.2391 39.3893 12.6142 39.0142C12.9893 38.6391 13.2 38.1304 13.2 37.6C13.2 37.0696 12.9893 36.5609 12.6142 36.1858C12.2391 35.8107 11.7304 35.6 11.2 35.6H8.4V20.1H10.2C10.7304 20.1 11.2391 19.8893 11.6142 19.5142C11.9893 19.1391 12.2 18.6304 12.2 18.1C12.2 17.5696 11.9893 17.0609 11.6142 16.6858C11.2391 16.3107 10.7304 16.1 10.2 16.1H8.4V10C8.4 8.4087 9.03214 6.88258 10.1574 5.75736C11.2826 4.63214 12.8087 4 14.4 4H59C60.5913 4 62.1174 4.63214 63.2426 5.75736C64.3679 6.88258 65 8.4087 65 10V65.2C65 66.7913 64.3679 68.3174 63.2426 69.4426C62.1174 70.5679 60.5913 71.2 59 71.2H14.4C12.8087 71.2 11.2826 70.5679 10.1574 69.4426C9.03214 68.3174 8.4 66.7913 8.4 65.2V59.1H11.2C11.7304 59.1 12.2391 58.8893 12.6142 58.5142C12.9893 58.1391 13.2 57.6304 13.2 57.1C13.2 56.5696 12.9893 56.0609 12.6142 55.6858C12.2391 55.3107 11.7304 55.1 11.2 55.1H8.4V39.6Z" fill="black" /> </svg> Contact Book </a> <a class="nav-link" id="v-pills-sign-tab" data-toggle="pill" href="#v-pills-sign" role="tab" aria-controls="v-pills-sign" aria-selected="false"><i class="fas fa-file-signature"></i> Signature</a> </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-12 inbox-blog ">
            <div class="wd-sl-emails">
                <div class="row">
                    <div class="email-tab-content">
                        <div class="tab-content email-inbox-body" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-inbox" role="tabpanel" aria-labelledby="v-pills-inbox-tab">
                                <div class="row">
                                    <div class="col-lg-5 col-md-12 email-inbox">
                                        <div class="email-inbox-head">
                                            <div class="inbox-fillter"> <img class="fillt" src="{{asset('assets/web/dashboard/images/fillter.png')}}" alt="">
                                                <p>Newest</p>
                                            </div>
                                            <div class="search-box">
                                                <div class="st-search-box"> <span class="search-icon"><img src="{{asset('assets/web/dashboard/images/seach.png')}}" alt=""></span>
                                                    <input type="text" placeholder="Search Here"> </div>
                                            </div>
                                        </div>
                                        <div class="email-inbox-body">
                                            <div class="inbox-card">
                                                <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user1.png')}}" alt=""></span> </div>
                                                <div class="card-cont">
                                                    <div class="user-name">
                                                        <div class="user-name-text">
                                                            <h5>Brooklyn Simmons</h5>
                                                            <h4>Car Inquiry Submission</h4> </div>
                                                        <div class="user-time">10:15 AM</div>
                                                    </div>
                                                    <div class="user-desc"> <span class="star"><img src="{{asset('assets/web/dashboard/images/blank-star.png')}}" alt=""></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inbox-card">
                                                <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user2.png')}}" alt=""></span> </div>
                                                <div class="card-cont">
                                                    <div class="user-name">
                                                        <div class="user-name-text">
                                                            <h5>Brooklyn Simmons</h5>
                                                            <h4>Car Inquiry Submission</h4> </div>
                                                        <div class="user-time"><span class="green-point"></span> 10:15 AM</div>
                                                    </div>
                                                    <div class="user-desc"> <span class="star"><img src="{{asset('assets/web/dashboard/images/fill-star.png')}}" alt=""></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inbox-card">
                                                <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user3.png')}}" alt=""></span> </div>
                                                <div class="card-cont">
                                                    <div class="user-name">
                                                        <div class="user-name-text">
                                                            <h5>Brooklyn Simmons</h5>
                                                            <h4>Car Inquiry Submission</h4> </div>
                                                        <div class="user-time">10:15 AM</div>
                                                    </div>
                                                    <div class="user-desc"> <span class="star"><img src="{{asset('assets/web/dashboard/images/blank-star.png')}}" alt=""></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inbox-card">
                                                <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user4.png')}}" alt=""></span> </div>
                                                <div class="card-cont">
                                                    <div class="user-name">
                                                        <div class="user-name-text">
                                                            <h5>Brooklyn Simmons</h5>
                                                            <h4>Car Inquiry Submission</h4> </div>
                                                        <div class="user-time"><span class="green-point"></span> 10:15 AM</div>
                                                    </div>
                                                    <div class="user-desc"> <span class="star"><img src="{{asset('assets/web/dashboard/images/blank-star.png')}}" alt=""></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 email-inbox-detail">
                                        <div class="inbox-detail-head">
                                            <div class="next-prev">
                                                <a href="#" class="prev"><img src="{{asset('assets/web/dashboard/images/prev.png')}}" alt=""></a>
                                                <a href="#" class="next"><img src="{{asset('assets/web/dashboard/images/next.png')}}" alt=""></a>
                                            </div>
                                            <div class="print-icons">
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/star.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/trash.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/print.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-body">
                                            <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user1.png')}}" alt=""></span> </div>
                                            <div class="card-desc">
                                                <h4>Car Inquiry Submission</h4>
                                                <div class="user-name-row">
                                                    <div class="user-text">
                                                        <h5>Brooklyn Simmons</h5> <span>To : Rehana ( rehana.234@gmail.com )</span> <span>Cc : Jhone ( jhone.123@gmail.com )</span> </div>
                                                    <div class="user-date">
                                                        <p>SAT, 19 MAR 2021 6:30</p>
                                                        <div class="dots"><img src="{{asset('assets/web/dashboard/images/dots.png')}}" alt=""></div>
                                                    </div>
                                                </div>
                                                <div class="user-desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    <div class="doc-img"> <img src="{{asset('assets/web/dashboard/images/pdf.png')}}"><span>file_document</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-footer">
                                            <button class="mr-2" data-toggle="modal" data-target="#addstock1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                                    <path d="M8.481 4.328V0L3.774 4.707L0 8.481L3.841 11.682L8.481 15.549V11.314C16.627 10.7 19.481 15.414 19.481 15.414C19.481 12.477 19.239 9.429 16.93 7.121C14.246 4.436 10.359 4.246 8.481 4.328Z" fill="#0AACDD" /> </svg> Reply</button>
                                            <button> <i class="fas fa-arrow-right"></i> Forward </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-send" role="tabpanel" aria-labelledby="v-pills-send-tab">
                                <div class="row">
                                    <div class="col-lg-5 col-md-12 email-inbox">
                                        <div class="email-inbox-head">
                                            <div class="inbox-fillter"> <img class="fillt" src="{{asset('assets/web/dashboard/images/fillter.png')}}" alt="">
                                                <p>Newest</p>
                                            </div>
                                            <div class="search-box">
                                                <div class="st-search-box"> <span class="search-icon"><img src="{{asset('assets/web/dashboard/images/seach.png')}}" alt=""></span>
                                                    <input type="text" placeholder="Search Here"> </div>
                                            </div>
                                        </div>
                                        <div class="email-inbox-body">
                                            <div class="inbox-card">
                                                <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user1.png')}}" alt=""></span> </div>
                                                <div class="card-cont">
                                                    <div class="user-name">
                                                        <div class="user-name-text">
                                                            <h5>Brooklyn Simmons</h5>
                                                            <h4>Car Inquiry Submission</h4> </div>
                                                        <div class="user-time">10:15 AM</div>
                                                    </div>
                                                    <div class="user-desc"> <span class="star"><img src="{{asset('assets/web/dashboard/images/blank-star.png')}}" alt=""></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 email-inbox-detail">
                                        <div class="inbox-detail-head">
                                            <div class="next-prev">
                                                <a href="#" class="prev"><img src="{{asset('assets/web/dashboard/images/prev.png')}}" alt=""></a>
                                                <a href="#" class="next"><img src="{{asset('assets/web/dashboard/images/next.png')}}" alt=""></a>
                                            </div>
                                            <div class="print-icons">
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/star.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/trash.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/print.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-body">
                                            <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user1.png')}}" alt=""></span> </div>
                                            <div class="card-desc">
                                                <h4>Car Inquiry Submission</h4>
                                                <div class="user-name-row">
                                                    <div class="user-text">
                                                        <h5>Brooklyn Simmons</h5> <span>To : Rehana ( rehana.234@gmail.com )</span> <span>Cc : Jhone ( jhone.123@gmail.com )</span> </div>
                                                    <div class="user-date">
                                                        <p>SAT, 19 MAR 2021 6:30</p>
                                                        <div class="dots"><img src="{{asset('assets/web/dashboard/images/dots.png')}}" alt=""></div>
                                                    </div>
                                                </div>
                                                <div class="user-desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    <div class="doc-img"> <img src="{{asset('assets/web/dashboard/images/pdf.png')}}"><span>file_document</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-footer">
                                            <button class="mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                                    <path d="M8.481 4.328V0L3.774 4.707L0 8.481L3.841 11.682L8.481 15.549V11.314C16.627 10.7 19.481 15.414 19.481 15.414C19.481 12.477 19.239 9.429 16.93 7.121C14.246 4.436 10.359 4.246 8.481 4.328Z" fill="#0AACDD" /> </svg> Reply</button>
                                            <button> <i class="fas fa-arrow-right"></i> Forward </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-draft" role="tabpanel" aria-labelledby="v-pills-draft-tab">
                                <div class="row">
                                    <div class="col-lg-5 col-md-12 email-inbox">
                                        <div class="email-inbox-head">
                                            <div class="inbox-fillter"> <img class="fillt" src="{{asset('assets/web/dashboard/images/fillter.png')}}" alt="">
                                                <p>Newest</p>
                                            </div>
                                            <div class="search-box">
                                                <div class="st-search-box"> <span class="search-icon"><img src="{{asset('assets/web/dashboard/images/seach.png')}}" alt=""></span>
                                                    <input type="text" placeholder="Search Here"> </div>
                                            </div>
                                        </div>
                                        <div class="email-inbox-body">
                                            <div class="inbox-card">
                                                <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user3.png')}}" alt=""></span> </div>
                                                <div class="card-cont">
                                                    <div class="user-name">
                                                        <div class="user-name-text">
                                                            <h5>Brooklyn Simmons</h5>
                                                            <h4>Car Inquiry Submission</h4> </div>
                                                        <div class="user-time">10:15 AM</div>
                                                    </div>
                                                    <div class="user-desc"> <span class="star"><img src="{{asset('assets/web/dashboard/images/blank-star.png')}}" alt=""></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inbox-card">
                                                <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user4.png')}}" alt=""></span> </div>
                                                <div class="card-cont">
                                                    <div class="user-name">
                                                        <div class="user-name-text">
                                                            <h5>Brooklyn Simmons</h5>
                                                            <h4>Car Inquiry Submission</h4> </div>
                                                        <div class="user-time"><span class="green-point"></span> 10:15 AM</div>
                                                    </div>
                                                    <div class="user-desc"> <span class="star"><img src="{{asset('assets/web/dashboard/images/blank-star.png')}}" alt=""></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 email-inbox-detail">
                                        <div class="inbox-detail-head">
                                            <div class="next-prev">
                                                <a href="#" class="prev"><img src="{{asset('assets/web/dashboard/images/prev.png')}}" alt=""></a>
                                                <a href="#" class="next"><img src="{{asset('assets/web/dashboard/images/next.png')}}" alt=""></a>
                                            </div>
                                            <div class="print-icons">
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/star.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/trash.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/print.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-body">
                                            <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user1.png')}}" alt=""></span> </div>
                                            <div class="card-desc">
                                                <h4>Car Inquiry Submission</h4>
                                                <div class="user-name-row">
                                                    <div class="user-text">
                                                        <h5>Brooklyn Simmons</h5> <span>To : Rehana ( rehana.234@gmail.com )</span> <span>Cc : Jhone ( jhone.123@gmail.com )</span> </div>
                                                    <div class="user-date">
                                                        <p>SAT, 19 MAR 2021 6:30</p>
                                                        <div class="dots"><img src="{{asset('assets/web/dashboard/images/dots.png')}}" alt=""></div>
                                                    </div>
                                                </div>
                                                <div class="user-desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    <div class="doc-img"> <img src="{{asset('assets/web/dashboard/images/pdf.png')}}"><span>file_document</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-footer">
                                            <button class="mr-2" data-toggle="modal" data-target="#addstock1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                                    <path d="M8.481 4.328V0L3.774 4.707L0 8.481L3.841 11.682L8.481 15.549V11.314C16.627 10.7 19.481 15.414 19.481 15.414C19.481 12.477 19.239 9.429 16.93 7.121C14.246 4.436 10.359 4.246 8.481 4.328Z" fill="#0AACDD" /> </svg> Reply</button>
                                            <button> <i class="fas fa-arrow-right"></i> Forward </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-delete" role="tabpanel" aria-labelledby="v-pills-delete-tab">
                                <div class="row">
                                    <div class="col-lg-5 col-md-12 email-inbox">
                                        <div class="email-inbox-head">
                                            <div class="inbox-fillter"> <img class="fillt" src="{{asset('assets/web/dashboard/images/fillter.png')}}" alt="">
                                                <p>Newest</p>
                                            </div>
                                            <div class="search-box">
                                                <div class="st-search-box"> <span class="search-icon"><img src="{{asset('assets/web/dashboard/images/seach.png')}}" alt=""></span>
                                                    <input type="text" placeholder="Search Here"> </div>
                                            </div>
                                        </div>
                                        <div class="email-inbox-body"> </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 email-inbox-detail">
                                        <div class="inbox-detail-head">
                                            <div class="next-prev">
                                                <a href="#" class="prev"><img src="{{asset('assets/web/dashboard/images/prev.png')}}" alt=""></a>
                                                <a href="#" class="next"><img src="{{asset('assets/web/dashboard/images/next.png')}}" alt=""></a>
                                            </div>
                                            <div class="print-icons">
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/star.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/trash.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/print.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-body">
                                            <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user1.png')}}" alt=""></span> </div>
                                            <div class="card-desc">
                                                <h4>Car Inquiry Submission</h4>
                                                <div class="user-name-row">
                                                    <div class="user-text">
                                                        <h5>Brooklyn Simmons</h5> <span>To : Rehana ( rehana.234@gmail.com )</span> <span>Cc : Jhone ( jhone.123@gmail.com )</span> </div>
                                                    <div class="user-date">
                                                        <p>SAT, 19 MAR 2021 6:30</p>
                                                        <div class="dots"><img src="{{asset('assets/web/dashboard/images/dots.png')}}" alt=""></div>
                                                    </div>
                                                </div>
                                                <div class="user-desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    <div class="doc-img"> <img src="{{asset('assets/web/dashboard/images/pdf.png')}}"><span>file_document</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-footer">
                                            <button class="mr-2" data-toggle="modal" data-target="#addstock1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                                    <path d="M8.481 4.328V0L3.774 4.707L0 8.481L3.841 11.682L8.481 15.549V11.314C16.627 10.7 19.481 15.414 19.481 15.414C19.481 12.477 19.239 9.429 16.93 7.121C14.246 4.436 10.359 4.246 8.481 4.328Z" fill="#0AACDD" /> </svg> Reply</button>
                                            <button> <i class="fas fa-arrow-right"></i> Forward </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-important" role="tabpanel" aria-labelledby="v-pills-important-tab">
                                <div class="row">
                                    <div class="col-lg-5 col-md-12 email-inbox">
                                        <div class="email-inbox-head">
                                            <div class="inbox-fillter"> <img class="fillt" src="{{asset('assets/web/dashboard/images/fillter.png')}}" alt="">
                                                <p>Newest</p>
                                            </div>
                                            <div class="search-box">
                                                <div class="st-search-box"> <span class="search-icon"><img src="{{asset('assets/web/dashboard/images/seach.png')}}" alt=""></span>
                                                    <input type="text" placeholder="Search Here"> </div>
                                            </div>
                                        </div>
                                        <div class="email-inbox-body">
                                            <div class="inbox-card">
                                                <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user2.png')}}" alt=""></span> </div>
                                                <div class="card-cont">
                                                    <div class="user-name">
                                                        <div class="user-name-text">
                                                            <h5>Brooklyn Simmons</h5>
                                                            <h4>Car Inquiry Submission</h4> </div>
                                                        <div class="user-time"><span class="green-point"></span> 10:15 AM</div>
                                                    </div>
                                                    <div class="user-desc"> <span class="star"><img src="{{asset('assets/web/dashboard/images/fill-star.png')}}" alt=""></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 email-inbox-detail">
                                        <div class="inbox-detail-head">
                                            <div class="next-prev">
                                                <a href="#" class="prev"><img src="{{asset('assets/web/dashboard/images/prev.png')}}" alt=""></a>
                                                <a href="#" class="next"><img src="{{asset('assets/web/dashboard/images/next.png')}}" alt=""></a>
                                            </div>
                                            <div class="print-icons">
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/star.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/trash.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/print.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-body">
                                            <div class="card-image"> <span><img src="{{asset('assets/web/dashboard/images/inbox-user1.png')}}" alt=""></span> </div>
                                            <div class="card-desc">
                                                <h4>Car Inquiry Submission</h4>
                                                <div class="user-name-row">
                                                    <div class="user-text">
                                                        <h5>Brooklyn Simmons</h5> <span>To : Rehana ( rehana.234@gmail.com )</span> <span>Cc : Jhone ( jhone.123@gmail.com )</span> </div>
                                                    <div class="user-date">
                                                        <p>SAT, 19 MAR 2021 6:30</p>
                                                        <div class="dots"><img src="{{asset('assets/web/dashboard/images/dots.png')}}" alt=""></div>
                                                    </div>
                                                </div>
                                                <div class="user-desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursusmauris porttitor metus. Nam eget ut facilisis cursusLorem ipsum dolor sit amet, consectetur adipiscing elit. Sit eget hendrerit mauris porttitor metus. Nam eget ut facilisis cursus</p>
                                                    <div class="doc-img"> <img src="{{asset('assets/web/dashboard/images/pdf.png')}}"><span>file_document</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-footer">
                                            <button class="mr-2" data-toggle="modal" data-target="#addstock1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                                    <path d="M8.481 4.328V0L3.774 4.707L0 8.481L3.841 11.682L8.481 15.549V11.314C16.627 10.7 19.481 15.414 19.481 15.414C19.481 12.477 19.239 9.429 16.93 7.121C14.246 4.436 10.359 4.246 8.481 4.328Z" fill="#0AACDD" /> </svg> Reply</button>
                                            <button> <i class="fas fa-arrow-right"></i> Forward </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-spam" role="tabpanel" aria-labelledby="v-pills-spam-tab">
                                <div class="row">
                                    <div class="col-lg-5 col-md-12 email-inbox">
                                        <div class="email-inbox-head">
                                            <div class="inbox-fillter"> <img class="fillt" src="{{asset('assets/web/dashboard/images/fillter.png')}}" alt="">
                                                <p>Newest</p>
                                            </div>
                                            <div class="search-box">
                                                <div class="st-search-box"> <span class="search-icon"><img src="{{asset('assets/web/dashboard/images/seach.png')}}" alt=""></span>
                                                    <input type="text" placeholder="Search Here"> </div>
                                            </div>
                                        </div>
                                        <div class="email-inbox-body"> </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 email-inbox-detail">
                                        <div class="inbox-detail-head">
                                            <div class="next-prev">
                                                <a href="#" class="prev"><img src="{{asset('assets/web/dashboard/images/prev.png')}}" alt=""></a>
                                                <a href="#" class="next"><img src="{{asset('assets/web/dashboard/images/next.png')}}" alt=""></a>
                                            </div>
                                            <div class="print-icons">
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/star.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/trash.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('assets/web/dashboard/images/print.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="inbox-detail-body"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                                <div class="stock-body">
                                    <table class="table stock-list-table">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="r-number">Name</th>
                                            <th scope="col" class="price">Email</th>
                                            <th scope="col" class="additional">Phone Number</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="check-box">Brooklyn</td>
                                            <td class="r-number">brooklyn@gmail.com</td>
                                            <td class="price">+91 6794237990</td>
                                            <td><a href="javascript:;" ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="check-box">Brooklyn</td>
                                            <td class="r-number">brooklyn@gmail.com</td>
                                            <td class="price">+91 6794237990</td>
                                            <td><a href="javascript:;" ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="check-box">Brooklyn</td>
                                            <td class="r-number">brooklyn@gmail.com</td>
                                            <td class="price">+91 6794237990</td>
                                            <td><a href="javascript:;" ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="check-box">Brooklyn</td>
                                            <td class="r-number">brooklyn@gmail.com</td>
                                            <td class="price">+91 6794237990</td>
                                            <td><a href="javascript:;" ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="check-box">Brooklyn</td>
                                            <td class="r-number">brooklyn@gmail.com</td>
                                            <td class="price">+91 6794237990</td>
                                            <td><a href="javascript:;" ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="check-box">Brooklyn</td>
                                            <td class="r-number">brooklyn@gmail.com</td>
                                            <td class="price">+91 6794237990</td>
                                            <td><a href="javascript:;" ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="check-box">Brooklyn</td>
                                            <td class="r-number">brooklyn@gmail.com</td>
                                            <td class="price">+91 6794237990</td>
                                            <td><a href="javascript:;" ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="check-box">Brooklyn</td>
                                            <td class="r-number">brooklyn@gmail.com</td>
                                            <td class="price">+91 6794237990</td>
                                            <td><a href="javascript:;" ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade mb-3" id="v-pills-sign" role="tabpanel" aria-labelledby="v-pills-sign-tab">
                                <form class="login-body">
                                    <div class="form-row">
                                        <input type="text" placeholder="Company Name"> </div>
                                    <div class="form-row">
                                        <input type="text" placeholder="Company Registration Number"> </div>
                                    <div class="form-row">
                                        <input type="text" placeholder="FCA Number"> </div>
                                    <div class="form-row">
                                        <input type="text" placeholder="ICO Number"> </div>
                                    <div class="form-row">
                                        <input type="text" placeholder="VAT Number"> </div>
                                    <div class="form-row">
                                        <textarea type="text" placeholder="Address"></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="logo-box">
                                            <label>Company logo</label>
                                            <div class="logo-select-row">
                                                <div class="logo-select-box"> <img src="{{asset('assets/web/dashboard/images/plush.png')}}" alt="">
                                                    <input type="file"> </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <input type="text" placeholder="Name ( Persons name who is replying )">
                                    </div>
                                    <div class="form-row action mt-5">
                                        <button type="button" class="next-step">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade show" id="addstock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog wd-sl-custwidth" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <label>To</label>
                            <input type="text" class="form-control" placeholder=""> </div>
                        <div class="form-row">
                            <label>Cc</label>
                            <input type="text" class="form-control" placeholder=""> </div>
                        <div class="form-row">
                            <label>Subject</label>
                            <input type="text" class="form-control" placeholder=""> </div>
                        <div class="form-row">
                            <textarea class="form-control" placeholder="Write Message Here...."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-row action">
                        <div class="wd-sl-error d-flex align-items-center">
                            <div class="upload-btn-wrapper">
                                <button class="btn"><i class="fas fa-paperclip"></i></button>
                                <input type="file" name="myfile" />
                            </div>
                            <a href="javascript:;" class="ml-2" class="close" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#temp"><span> Choose Template</span></a>
                        </div>
                        <div class="wd-sl-rights">
                            <button class="add-stock-btn"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- choose template -->
    <div class="modal fade show wd-md-myexpense-popup" id="temp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Choose Tamplate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <div class="wd-sl-choosetemps mb-3">
                        <p class="mb-1"><b>Hi ,</b></p>
                        <p>Thank you for your recent enquiry regarding the Audi A3, the vehicle is still available and you are more then welcome to view/test drive the vehicle, Our opening times are Monday to Sunday, 10am till 5pm.
                            For any further questions or to book a viewing/test drive please give us a call on “020 2222 2222” or alternatively send us an email so we may book you in.
                        </p>
                        <div class="form-row action mb-0">
                            <div class="form-row action mb-0">
                                <button class="add-stock-btn mr-2">Choose</button>
                                <button class="add-stock-btn">Edit</button>
                            </div>
                        </div>
                    </div>
                    <div class="wd-sl-choosetemps">
                        <p class="mb-1"><b>Hi ,</b></p>
                        <p>Thank you for your recent enquiry regarding the Audi A3, the vehicle is still available and you are more then welcome to view/test drive the vehicle, Our opening times are Monday to Sunday, 10am till 5pm.

                        </p>
                        <div class="form-row action mb-0">
                            <div class="form-row action mb-0">
                                <button class="add-stock-btn mr-2">Choose</button>
                                <button class="add-stock-btn">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pop-up -->
    <div class="modal fade show wd-md-myexpense-popup" id="addstock1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog wd-sl-custwidth reaply-pop" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Reply Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <label>To</label>
                            <input type="text" class="form-control" value="brooklyn@gmail.com"> </div>
                        <div class="form-row">
                            <label>Cc</label>
                            <input type="text" class="form-control" value="brooklyn@gmail.com"> </div>
                        <div class="form-row">
                            <label>Subject</label>
                            <input type="text" class="form-control" value="Feddback"> </div>
                        <div class="form-row">
                            <textarea class="form-control" placeholder="write message here...."> </textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-row action">
                        <div class="wd-sl-error d-flex align-items-center">
                            <div class="upload-btn-wrapper">
                                <button class="btn"><i class="fas fa-paperclip"></i></button>
                                <input type="file" name="myfile" />
                            </div>
                            <a href="javascript:;" class="ml-2" class="close" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#temp"><span> Choose Template</span></a>
                        </div>
                        <div class="wd-sl-rights"> <a href="javascript:;"><span><i class="fas fa-trash"></i> Delete Draft</span></a>
                            <button class="add-stock-btn"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
