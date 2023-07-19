@extends('layouts.web.dashboard.app')

@section('header_css')
    <style>
        .wd-sl-calender #calendar {
            height: 400px;
        }

        #container {
            /*width: 400px;*/
            /* height: 100%;*/
        }

        .to-do-success-span {
            background-color: #28a745;
        }

        .to-do-danger-span {
            background-color: #dc3545;
        }

        .to-do-danger-warning {
            background-color: #FFBF00;
        }

        #calendar span {
            font-size: 14px;
        }

        .fc-popover.fc-more-popover.card.card-primary {
            background: #fff;
        }

        .fc-axis {
            width: 70px !important;
            text-align: center !important;
            vertical-align: middle !important;
        }

        #today-reminder-modal .sub-to-do-list-bg {
            padding: 15px;
            border-radius: 15px;
            margin: 10px 0;
        }
    </style>
@endsection

@section('content')
    <div class="wd-md-rightbar">
        <div class="wd-md-topbar d-flex align-items-center justify-content-between">
            <h2>{{$title}}</h2>
            <div class="wd-date">
                <div class="form-group">
                    <label for="startDate">Date Range :</label>
                    <br>
                    <input type="text" class="form-control re_draw_table" name="date_range"
                           value="{{$date_range}}"
                           id="date_range"
                           placeholder="Date Range"/>
                </div>
                <form id="frmRangeFilter" name="frmRangeFilter" class="form-inline" method="get"
                      action="{{route('front.home')}}">
                    <input type="hidden" name="start_date" id="start_date" value="">
                    <input type="hidden" name="end_date" id="end_date" value="">
                </form>
            </div>
        </div>
        <div class="wd-sl-dashfeatures">
            <h4>This Months Statistics</h4>
            <div class="row wd-sl-gridftrs">
                <div class="col-md-2">
                    <a href="{{route('front.sales-record.index')}}"
                       class="wd-sl-ftrcount kt-iconbox--brand kt-iconbox--animate-slower">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                         fill="none">
                                        <path
                                            d="M12.0311 20.7311V20.24C12.0311 20.1244 11.9449 20.0089 11.83 19.98C11.198 19.8644 10.6809 19.6333 10.25 19.2289C9.96276 18.94 9.76167 18.5644 9.64676 18.1311C9.53186 17.6689 9.87658 17.2356 10.3362 17.2356H10.3649C10.7097 17.2356 10.9969 17.4667 11.0544 17.7844C11.1118 18.0733 11.2267 18.2756 11.4278 18.4489C11.7151 18.7089 12.0598 18.8244 12.4907 18.8244C12.9503 18.8244 13.2951 18.7089 13.5249 18.5067C13.7834 18.3044 13.8983 17.9867 13.8983 17.6111C13.8983 17.2644 13.7834 16.9756 13.5536 16.7444C13.3238 16.5133 12.9503 16.3111 12.4333 16.1378C11.5715 15.8489 10.9395 15.5022 10.5086 15.0978C10.0777 14.6933 9.87658 14.1156 9.87658 13.4222C9.87658 12.7578 10.0777 12.2089 10.4798 11.7756C10.8533 11.4 11.3416 11.14 11.9449 11.0244C12.0598 10.9956 12.146 10.9089 12.146 10.7644V10.1289C12.146 9.86889 12.3471 9.63778 12.6343 9.63778H12.6631C12.9216 9.63778 13.1514 9.84 13.1514 10.1289V10.7933C13.1514 10.9089 13.2376 11.0244 13.3525 11.0244C13.9558 11.14 14.4154 11.4289 14.7889 11.8622C15.0187 12.1511 15.191 12.5267 15.2772 12.9311C15.3634 13.3644 15.0187 13.7978 14.559 13.7978H14.5016C14.1569 13.7978 13.8696 13.5667 13.7834 13.22C13.726 12.96 13.6398 12.7578 13.4962 12.5844C13.2663 12.2956 12.9503 12.1222 12.5769 12.1222C12.1747 12.1222 11.8587 12.2378 11.6576 12.44C11.4566 12.6711 11.3416 12.96 11.3416 13.3356C11.3416 13.6822 11.4566 13.9711 11.6576 14.1733C11.8875 14.4044 12.2609 14.6067 12.8354 14.8089C13.6972 15.1267 14.3292 15.4733 14.7314 15.8778C15.1623 16.2822 15.3634 16.8311 15.3634 17.5533C15.3634 18.2756 15.1623 18.8244 14.7314 19.2289C14.358 19.6044 13.8409 19.8356 13.2089 19.9511C13.094 19.98 13.0078 20.0667 13.0078 20.2111V20.7022C13.0078 20.9622 12.8067 21.1933 12.5194 21.1933C12.2322 21.2222 12.0311 21.02 12.0311 20.7311ZM26.9116 5.18889C26.653 4.75556 25.8199 3.74444 25.0156 2.87778C23.2633 1 22.7749 1 22.5451 1C22.3153 1 21.8269 1 20.0746 2.84889C19.2702 3.71556 18.4372 4.72667 18.1786 5.16C18.0063 5.42 18.0924 5.79556 18.3797 5.94C18.667 6.08444 19.0117 6.02667 19.1553 5.73778C19.5288 5.13111 21.0226 3.39778 21.9706 2.56V15.82C21.9706 17.1489 21.712 18.42 21.2237 19.6333C20.7353 20.8467 19.9884 21.9444 19.0692 22.8689C17.2019 24.8044 14.7027 25.8444 12.0598 25.8444C6.60172 25.8444 2.14907 21.3667 2.14907 15.8778C2.14907 10.3889 6.60172 5.91111 12.0598 5.91111H14.7889C15.1049 5.91111 15.3634 5.65111 15.3634 5.33333C15.3634 5.01556 15.1049 4.75556 14.7889 4.75556H12.0598C5.96973 4.75556 1 9.75333 1 15.8778C1 22.0022 5.96973 27 12.0598 27C15.0187 27 17.8052 25.8444 19.8735 23.7356C20.9077 22.6956 21.712 21.4822 22.2866 20.1244C22.8324 18.7956 23.1196 17.3511 23.1196 15.8778V2.61778C24.0389 3.45556 25.5614 5.16 25.9349 5.79556C26.0498 5.96889 26.2221 6.08444 26.4232 6.08444C26.5381 6.08444 26.6243 6.05556 26.7105 5.99778C26.9977 5.79556 27.0839 5.44889 26.9116 5.18889Z"
                                            fill="#0aacdd" stroke="#0aacdd" stroke-width="0.5"></path>
                                    </svg>
                                </span>
                        <div class="wd-sl-textcounter">
                            <h3>{{$counts['sales_records']}}</h3>
                            <h6>Sales Record</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="{{route('front.expense.index')}}"
                       class="wd-sl-ftrcount kt-iconbox--success kt-iconbox--animate-slower">
                                <span>
                                    <svg width="30" height="24" viewBox="0 0 30 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M28.4705 9.445C28.2239 9.19805 27.9308 9.00231 27.6083 8.86903C27.2857 8.73576 26.9399 8.66759 26.5909 8.66845H7.4595C6.75738 8.66845 6.08402 8.94736 5.58755 9.44384C5.09108 9.94031 4.81216 10.6137 4.81216 11.3158V14.4308H3.64734C3.32904 14.4308 3.02379 14.3044 2.79872 14.0793C2.57365 13.8542 2.44721 13.549 2.44721 13.2307V3.64734C2.44721 3.32904 2.57365 3.02379 2.79872 2.79872C3.02379 2.57365 3.32904 2.44721 3.64734 2.44721H22.7787C23.0909 2.45639 23.3871 2.58688 23.6046 2.81096C23.8221 3.03504 23.9437 3.33506 23.9436 3.64734V6.51528C23.9436 6.60973 23.9622 6.70325 23.9983 6.79051C24.0345 6.87776 24.0874 6.95705 24.1542 7.02383C24.221 7.09061 24.3003 7.14359 24.3875 7.17973C24.4748 7.21587 24.5683 7.23448 24.6628 7.23448C24.7572 7.23448 24.8507 7.21587 24.938 7.17973C25.0252 7.14359 25.1045 7.09061 25.1713 7.02383C25.2381 6.95705 25.2911 6.87776 25.3272 6.79051C25.3634 6.70325 25.382 6.60973 25.382 6.51528V3.64734C25.382 2.94522 25.103 2.27186 24.6066 1.77539C24.1101 1.27891 23.4367 1 22.7346 1H3.64734C2.94522 1 2.27186 1.27891 1.77539 1.77539C1.27891 2.27186 1 2.94522 1 3.64734L1 13.213C1 13.9152 1.27891 14.5885 1.77539 15.085C2.27186 15.5815 2.94522 15.8604 3.64734 15.8604H5.54459C5.64289 15.8653 5.74114 15.8498 5.83318 15.815C5.92523 15.7801 6.00909 15.7266 6.0795 15.6579C6.14992 15.5891 6.20538 15.5066 6.2424 15.4154C6.27943 15.3242 6.29722 15.2263 6.29467 15.1279V11.307C6.29467 10.9887 6.42111 10.6834 6.64618 10.4583C6.87125 10.2333 7.1765 10.1068 7.4948 10.1068H26.5909C26.9092 10.1068 27.2145 10.2333 27.4395 10.4583C27.6646 10.6834 27.791 10.9887 27.791 11.307V20.8727C27.791 21.191 27.6646 21.4962 27.4395 21.7213C27.2145 21.9463 26.9092 22.0728 26.5909 22.0728H7.4595C7.14736 22.0636 6.8511 21.9331 6.63361 21.709C6.41612 21.485 6.29454 21.1849 6.29467 20.8727V18.9578C6.29467 18.767 6.2189 18.5841 6.08402 18.4492C5.94915 18.3143 5.76622 18.2386 5.57548 18.2386C5.38474 18.2386 5.20181 18.3143 5.06693 18.4492C4.93206 18.5841 4.85629 18.767 4.85629 18.9578V20.8727C4.85629 21.5748 5.1352 22.2481 5.63167 22.7446C6.12814 23.2411 6.8015 23.52 7.50362 23.52H26.5909C27.293 23.52 27.9664 23.2411 28.4629 22.7446C28.9593 22.2481 29.2382 21.5748 29.2382 20.8727V11.307C29.2376 10.6094 28.9617 9.94027 28.4705 9.445V9.445Z"
                                            fill="#78d12a" stroke="#78d12a" stroke-width="0.5"></path>
                                        <path
                                            d="M25.6467 19.6814H23.7318C23.541 19.6814 23.3581 19.6056 23.2232 19.4707C23.0883 19.3359 23.0126 19.1529 23.0126 18.9622C23.0126 18.7715 23.0883 18.5885 23.2232 18.4537C23.3581 18.3188 23.541 18.243 23.7318 18.243H25.6467C25.8374 18.243 26.0203 18.3188 26.1552 18.4537C26.2901 18.5885 26.3659 18.7715 26.3659 18.9622C26.3659 19.1529 26.2901 19.3359 26.1552 19.4707C26.0203 19.6056 25.8374 19.6814 25.6467 19.6814V19.6814ZM17.034 19.6814C16.3237 19.6814 15.6293 19.4708 15.0386 19.0761C14.448 18.6815 13.9877 18.1205 13.7158 17.4643C13.444 16.808 13.3729 16.0859 13.5115 15.3892C13.65 14.6925 13.9921 14.0525 14.4944 13.5502C14.9967 13.0479 15.6366 12.7059 16.3333 12.5673C17.03 12.4287 17.7522 12.4998 18.4084 12.7717C19.0647 13.0435 19.6256 13.5039 20.0203 14.0945C20.4149 14.6851 20.6256 15.3795 20.6256 16.0898C20.6256 17.0424 20.2472 17.9559 19.5736 18.6295C18.9001 19.303 17.9865 19.6814 17.034 19.6814V19.6814ZM17.034 13.9367C16.6081 13.9367 16.1919 14.063 15.8378 14.2996C15.4837 14.5361 15.2077 14.8724 15.0447 15.2659C14.8818 15.6593 14.8391 16.0922 14.9222 16.5099C15.0053 16.9276 15.2104 17.3112 15.5115 17.6124C15.8126 17.9135 16.1963 18.1186 16.6139 18.2016C17.0316 18.2847 17.4645 18.2421 17.858 18.0791C18.2514 17.9161 18.5877 17.6402 18.8243 17.2861C19.0609 16.932 19.1872 16.5157 19.1872 16.0898C19.1872 15.5188 18.9603 14.9711 18.5565 14.5673C18.1527 14.1635 17.6051 13.9367 17.034 13.9367V13.9367ZM10.3362 13.9367H8.42134C8.2306 13.9367 8.04767 13.8609 7.9128 13.726C7.77792 13.5912 7.70215 13.4082 7.70215 13.2175C7.70215 13.0267 7.77792 12.8438 7.9128 12.7089C8.04767 12.5741 8.2306 12.4983 8.42134 12.4983H10.3362C10.527 12.4983 10.7099 12.5741 10.8448 12.7089C10.9797 12.8438 11.0554 13.0267 11.0554 13.2175C11.0554 13.4082 10.9797 13.5912 10.8448 13.726C10.7099 13.8609 10.527 13.9367 10.3362 13.9367V13.9367Z"
                                            fill="white"></path>
                                    </svg>
                                </span>
                        <div class="wd-sl-textcounter">
                            <h3>{{place_currency($counts['expense_record'])}}</h3>
                            <h6>Expense Spend</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="{{route('front.stock-list.index')}}"
                       class="wd-sl-ftrcount kt-iconbox--warning kt-iconbox--animate-slower">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="29" viewBox="0 0 26 29"
                                         fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M17.8744 1.78101C17.8744 1.78101 7.31848 1.78651 7.30198 1.78651C3.50698 1.80988 1.1571 4.30688 1.1571 8.11563V20.7601C1.1571 24.5881 3.52485 27.0948 7.35286 27.0948C7.35286 27.0948 17.9074 27.0906 17.9252 27.0906C21.7202 27.0673 24.0715 24.5689 24.0715 20.7601V8.11563C24.0715 4.28763 21.7024 1.78101 17.8744 1.78101Z"
                                              stroke="#f76014" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                        <path d="M17.6098 20.3073H7.68231" stroke="#f76014" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M17.6098 14.5508H7.68231" stroke="#f76014" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M11.4706 8.80762H7.68243" stroke="#f76014" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                        <div class="wd-sl-textcounter">
                            <h3>{{$counts['stock_list']}}</h3>
                            <h6>Stock List</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="{{route('front.complaint_management.index')}}"
                       class="wd-sl-ftrcount kt-iconbox--secondry kt-iconbox--animate-slower">
                                <span>
                                    <svg width="30" height="24" viewBox="0 0 30 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.4705 9.445C28.2239 9.19805 27.9308 9.00231 27.6083 8.86903C27.2857 8.73576 26.9399 8.66759 26.5909 8.66845H7.4595C6.75738 8.66845 6.08402 8.94736 5.58755 9.44384C5.09108 9.94031 4.81216 10.6137 4.81216 11.3158V14.4308H3.64734C3.32904 14.4308 3.02379 14.3044 2.79872 14.0793C2.57365 13.8542 2.44721 13.549 2.44721 13.2307V3.64734C2.44721 3.32904 2.57365 3.02379 2.79872 2.79872C3.02379 2.57365 3.32904 2.44721 3.64734 2.44721H22.7787C23.0909 2.45639 23.3871 2.58688 23.6046 2.81096C23.8221 3.03504 23.9437 3.33506 23.9436 3.64734V6.51528C23.9436 6.60973 23.9622 6.70325 23.9983 6.79051C24.0345 6.87776 24.0874 6.95705 24.1542 7.02383C24.221 7.09061 24.3003 7.14359 24.3875 7.17973C24.4748 7.21587 24.5683 7.23448 24.6628 7.23448C24.7572 7.23448 24.8507 7.21587 24.938 7.17973C25.0252 7.14359 25.1045 7.09061 25.1713 7.02383C25.2381 6.95705 25.2911 6.87776 25.3272 6.79051C25.3634 6.70325 25.382 6.60973 25.382 6.51528V3.64734C25.382 2.94522 25.103 2.27186 24.6066 1.77539C24.1101 1.27891 23.4367 1 22.7346 1H3.64734C2.94522 1 2.27186 1.27891 1.77539 1.77539C1.27891 2.27186 1 2.94522 1 3.64734L1 13.213C1 13.9152 1.27891 14.5885 1.77539 15.085C2.27186 15.5815 2.94522 15.8604 3.64734 15.8604H5.54459C5.64289 15.8653 5.74114 15.8498 5.83318 15.815C5.92523 15.7801 6.00909 15.7266 6.0795 15.6579C6.14992 15.5891 6.20538 15.5066 6.2424 15.4154C6.27943 15.3242 6.29722 15.2263 6.29467 15.1279V11.307C6.29467 10.9887 6.42111 10.6834 6.64618 10.4583C6.87125 10.2333 7.1765 10.1068 7.4948 10.1068H26.5909C26.9092 10.1068 27.2145 10.2333 27.4395 10.4583C27.6646 10.6834 27.791 10.9887 27.791 11.307V20.8727C27.791 21.191 27.6646 21.4962 27.4395 21.7213C27.2145 21.9463 26.9092 22.0728 26.5909 22.0728H7.4595C7.14736 22.0636 6.8511 21.9331 6.63361 21.709C6.41612 21.485 6.29454 21.1849 6.29467 20.8727V18.9578C6.29467 18.767 6.2189 18.5841 6.08402 18.4492C5.94915 18.3143 5.76622 18.2386 5.57548 18.2386C5.38474 18.2386 5.20181 18.3143 5.06693 18.4492C4.93206 18.5841 4.85629 18.767 4.85629 18.9578V20.8727C4.85629 21.5748 5.1352 22.2481 5.63167 22.7446C6.12814 23.2411 6.8015 23.52 7.50362 23.52H26.5909C27.293 23.52 27.9664 23.2411 28.4629 22.7446C28.9593 22.2481 29.2382 21.5748 29.2382 20.8727V11.307C29.2376 10.6094 28.9617 9.94027 28.4705 9.445V9.445Z"
                                        fill="#ffc107" stroke="#ffc107" stroke-width="0.5"></path>
                                    <path
                                        d="M25.6467 19.6814H23.7318C23.541 19.6814 23.3581 19.6056 23.2232 19.4707C23.0883 19.3359 23.0126 19.1529 23.0126 18.9622C23.0126 18.7715 23.0883 18.5885 23.2232 18.4537C23.3581 18.3188 23.541 18.243 23.7318 18.243H25.6467C25.8374 18.243 26.0203 18.3188 26.1552 18.4537C26.2901 18.5885 26.3659 18.7715 26.3659 18.9622C26.3659 19.1529 26.2901 19.3359 26.1552 19.4707C26.0203 19.6056 25.8374 19.6814 25.6467 19.6814V19.6814ZM17.034 19.6814C16.3237 19.6814 15.6293 19.4708 15.0386 19.0761C14.448 18.6815 13.9877 18.1205 13.7158 17.4643C13.444 16.808 13.3729 16.0859 13.5115 15.3892C13.65 14.6925 13.9921 14.0525 14.4944 13.5502C14.9967 13.0479 15.6366 12.7059 16.3333 12.5673C17.03 12.4287 17.7522 12.4998 18.4084 12.7717C19.0647 13.0435 19.6256 13.5039 20.0203 14.0945C20.4149 14.6851 20.6256 15.3795 20.6256 16.0898C20.6256 17.0424 20.2472 17.9559 19.5736 18.6295C18.9001 19.303 17.9865 19.6814 17.034 19.6814V19.6814ZM17.034 13.9367C16.6081 13.9367 16.1919 14.063 15.8378 14.2996C15.4837 14.5361 15.2077 14.8724 15.0447 15.2659C14.8818 15.6593 14.8391 16.0922 14.9222 16.5099C15.0053 16.9276 15.2104 17.3112 15.5115 17.6124C15.8126 17.9135 16.1963 18.1186 16.6139 18.2016C17.0316 18.2847 17.4645 18.2421 17.858 18.0791C18.2514 17.9161 18.5877 17.6402 18.8243 17.2861C19.0609 16.932 19.1872 16.5157 19.1872 16.0898C19.1872 15.5188 18.9603 14.9711 18.5565 14.5673C18.1527 14.1635 17.6051 13.9367 17.034 13.9367V13.9367ZM10.3362 13.9367H8.42134C8.2306 13.9367 8.04767 13.8609 7.9128 13.726C7.77792 13.5912 7.70215 13.4082 7.70215 13.2175C7.70215 13.0267 7.77792 12.8438 7.9128 12.7089C8.04767 12.5741 8.2306 12.4983 8.42134 12.4983H10.3362C10.527 12.4983 10.7099 12.5741 10.8448 12.7089C10.9797 12.8438 11.0554 13.0267 11.0554 13.2175C11.0554 13.4082 10.9797 13.5912 10.8448 13.726C10.7099 13.8609 10.527 13.9367 10.3362 13.9367V13.9367Z"
                                        fill="#ffc107"></path>
                                </svg>
                                </span>
                        <div class="wd-sl-textcounter">
                            <h3>{{$counts['complaints']}}</h3>
                            <h6>Complaints</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="{{route('front.to_do.index')}}"
                       class="wd-sl-ftrcount kt-iconbox--brand kt-iconbox--animate-slower">
                                <span>
                                    <svg width="33" height="34" viewBox="0 0 33 34" fill="#0aacdd"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M22.2388 4.16016C22.2388 4.16016 10.7222 4.16559 10.7042 4.16559C6.56376 4.18867 4 6.65472 4 10.4163V22.904C4 26.6846 6.58326 29.1602 10.7597 29.1602C10.7597 29.1602 22.2748 29.1561 22.2943 29.1561C26.4347 29.133 29 26.6656 29 22.904V10.4163C29 6.63571 26.4152 4.16016 22.2388 4.16016Z"
                                              stroke="white" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                        <rect x="15" y="10.1602" width="10" height="1.5" rx="0.75" fill="white"></rect>
                                        <rect x="15" y="16.1602" width="10" height="1.5" rx="0.75" fill="white"></rect>
                                        <rect x="15" y="22.1602" width="10" height="1.5" rx="0.75" fill="white"></rect>
                                        <path
                                            d="M9.21688 12.4745C9.26882 12.5265 9.3307 12.5674 9.39883 12.5949C9.46695 12.6224 9.53991 12.6359 9.61336 12.6345C9.6868 12.6331 9.75922 12.617 9.82628 12.587C9.89333 12.557 9.95366 12.5138 10.0036 12.46L10.0039 12.4603L10.0109 12.4516L12.1166 9.81814C12.21 9.71421 12.26 9.57837 12.2563 9.43856C12.2526 9.29692 12.194 9.16228 12.0928 9.06304C11.9917 8.9638 11.856 8.90773 11.7143 8.90666C11.5726 8.90558 11.436 8.95959 11.3334 9.05729L11.3334 9.05728L9.32296 12.3685M9.21688 12.4745L9.32296 12.3685M9.21688 12.4745L9.21689 12.4746L9.32296 12.3685M9.21688 12.4745L7.82027 11.0779M9.32296 12.3685L7.92461 10.9701M7.82027 11.0779C7.82096 11.0786 7.82166 11.0792 7.82235 11.0799L7.92461 10.9701M7.82027 11.0779C7.76756 11.0283 7.72523 10.9687 7.69576 10.9025C7.6659 10.8355 7.64984 10.7632 7.64855 10.6898C7.64725 10.6164 7.66075 10.5436 7.68823 10.4755C7.71571 10.4075 7.75661 10.3457 7.80849 10.2938C7.86037 10.242 7.92217 10.2011 7.9902 10.1736C8.05823 10.1461 8.1311 10.1326 8.20446 10.1339C8.27782 10.1352 8.35016 10.1512 8.41718 10.1811C8.48333 10.2106 8.54294 10.2529 8.59257 10.3056M7.82027 11.0779L7.81855 11.0762L7.92461 10.9701M7.92461 10.9701L8.59257 10.3056M8.59257 10.3056C8.59323 10.3063 8.59388 10.307 8.59454 10.3077L8.4848 10.41L8.59084 10.3039L8.59257 10.3056ZM9.48457 11.4093L9.59142 11.5161L9.6847 11.3972L9.57784 11.2904L9.48457 11.4093Z"
                                            fill="white" stroke="white" stroke-width="0.3"></path>
                                        <path
                                            d="M9.41842 18.5781C9.47036 18.63 9.53224 18.6709 9.60036 18.6984C9.66849 18.7259 9.74145 18.7394 9.8149 18.738C9.88834 18.7367 9.96076 18.7205 10.0278 18.6905C10.0949 18.6605 10.1552 18.6173 10.2052 18.5635L10.2055 18.5638L10.2124 18.5551L12.3181 15.9217C12.4115 15.8177 12.4616 15.6819 12.4579 15.5421C12.4541 15.4004 12.3955 15.2658 12.2944 15.1666C12.1932 15.0673 12.0575 15.0112 11.9158 15.0102C11.7741 15.0091 11.6376 15.0631 11.535 15.1608L11.535 15.1608L9.5245 18.472M9.41842 18.5781L9.5245 18.472M9.41842 18.5781L9.41843 18.5781L9.5245 18.472M9.41842 18.5781L8.02181 17.1814M9.5245 18.472L8.12615 17.0737M8.02181 17.1814C8.0225 17.1821 8.0232 17.1828 8.02389 17.1834L8.12615 17.0737M8.02181 17.1814C7.9691 17.1318 7.92677 17.0722 7.8973 17.006C7.86744 16.939 7.85138 16.8667 7.85009 16.7933C7.84879 16.72 7.86229 16.6471 7.88976 16.5791C7.91724 16.511 7.95814 16.4492 8.01002 16.3973C8.06191 16.3455 8.1237 16.3046 8.19174 16.2771C8.25977 16.2496 8.33263 16.2361 8.40599 16.2374C8.47935 16.2387 8.5517 16.2548 8.61872 16.2846C8.68486 16.3141 8.74448 16.3564 8.79411 16.4091M8.02181 17.1814L8.02009 17.1797L8.12615 17.0737M8.12615 17.0737L8.79411 16.4091M8.79411 16.4091C8.79477 16.4098 8.79542 16.4105 8.79608 16.4112L8.68633 16.5135L8.79238 16.4074L8.79411 16.4091ZM9.6861 17.5128L9.79296 17.6196L9.88624 17.5007L9.77938 17.3939L9.6861 17.5128Z"
                                            fill="white" stroke="white" stroke-width="0.3"></path>
                                        <circle cx="10.0225" cy="22.8145" r="1.48402" stroke="white"
                                                stroke-width="1.2"></circle>
                                    </svg>
                                </span>
                        <div class="wd-sl-textcounter">
                            <h3>{{$counts['todos']}}</h3>
                            <h6>Out Standing</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="{{route('front.sales-record.index')}}"
                       class="wd-sl-ftrcount kt-iconbox--warning kt-iconbox--animate-slower">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="29" viewBox="0 0 26 29"
                                         fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M17.8744 1.78101C17.8744 1.78101 7.31848 1.78651 7.30198 1.78651C3.50698 1.80988 1.1571 4.30688 1.1571 8.11563V20.7601C1.1571 24.5881 3.52485 27.0948 7.35286 27.0948C7.35286 27.0948 17.9074 27.0906 17.9252 27.0906C21.7202 27.0673 24.0715 24.5689 24.0715 20.7601V8.11563C24.0715 4.28763 21.7024 1.78101 17.8744 1.78101Z"
                                              stroke="#f76014" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                        <path d="M17.6098 20.3073H7.68231" stroke="#f76014" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M17.6098 14.5508H7.68231" stroke="#f76014" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M11.4706 8.80762H7.68243" stroke="#f76014" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                        <div class="wd-sl-textcounter">
                            <h3>{{$counts['no_cost_vehicle']}}</h3>
                            <h6>No Cost Vehicle</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row wd-sl-dashseprate">
            <div class="col-md-12 wd-sl-height">
                <div class="wd-ds-box">
                    <div id="container"></div>
                </div>
            </div>
            <div class="col-md-12 wd-sl-height">
                <div class="wd-ds-box">

                    <div class="wd-sl-calender p-0">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row wd-sl-dashseprate">
            <div class="col-md-12 wd-sl-height">
                <h4>Tasks outstanding</h4>
                <table class="table table-striped dataTable no-footer" id="myTaskTable">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Assign Staff</th>
                        <th>Priority</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($task))
                        @foreach($task as $key=>$value)
                            <tr>
                                <td>{{!empty($value->date)?get_date_format($value->date.' '.$value->time,'d/m/Y H:i'):'N/A'}}</td>
                                <td>{{str_limit($value->title,50)}}</td>
                                <td>{{str_limit($value->description,50)}}</td>
                                <td>{{$value->assign_staff}}</td>
                                <td><span
                                        class="btn {{$value->priority=='low'?'to-do-success-span':($value->priority=='high'?'to-do-danger-span':'to-do-danger-warning')}}"> {{ucfirst($value->priority)}}</span>
                                </td>
                                <td><label> @if($value->status != 'complete')
                                            <input type="checkbox" onclick="mark_as_complete({{$value->id}},this)"> Mark
                                            as
                                            complete
                                        @else
                                            Completed
                                        @endif
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="today-reminder-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Today Reminder</h4>
                        <button type="button" class="close" onclick="reminderClose()" id="popup-close"
                                data-dismiss="modal">&times;
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        @foreach($todo_today as $todo)
                            <div class="sub-to-do-list-bg d-flex align-items-center flex-wrap">
                                <div class="sub-to-do-caln-box d-flex align-items-center">
                                    <div class="sub-to-do-cald-date">
                                        <span>{{date('d', strtotime($todo->date))}}</span>
                                    </div>
                                    <div class="sub-to-do-cald-text">
                                        <h6>{{$todo->title}}</h6>
                                        <p>{{$todo->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach($event_today as $event)
                            <div class="sub-to-do-list-bg d-flex align-items-center flex-wrap">
                                <div class="sub-to-do-caln-box d-flex align-items-center">
                                    <div class="sub-to-do-cald-date">
                                        <span>{{date('d', strtotime($event->start))}}</span>
                                    </div>
                                    <div class="sub-to-do-cald-text">
                                        <h6>{{$event->title}}</h6>
                                        <p>{{$event->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('footer_script')
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/modules/series-label.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/calendar.css')}}">
            <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
            <script>
                let full_event = $('#calendar').fullCalendar({
                    themeSystem: 'bootstrap4',
                    businessHours: false,
                    height: "parent",
                    header: {
                        left: 'title',
                        center: 'agendaFiveDay',
                        right: 'today'
                    },
                    views: {
                        agendaFiveDay: {
                            type: 'agenda',
                            duration: {days: 5},
                            buttonText: '5 day'
                        }
                    },
                    defaultView: 'agendaFiveDay',
                    editable: true,

                    events: [
                            @foreach($events as $event)
                        {
                            title: '{{$event->title .' ('.date('h:i', strtotime($event->time)).')'}}',
                            description: '{{$event->description}}',
                            start: '{{$event->start}}',
                            end: '{{$event->start}}',
                            className: 'fc-bg-default',
                            icon: "circle"
                        },
                        @endforeach
                    ],
                    eventLimit: 1,
                    eventRender: function (event, element) {
                        if (event.icon) {
                            element.find(".fc-title").prepend("<i class='fa fa-" + event.icon + "'></i>");
                        }
                    },
                    dayClick: function (date, jsEvent, view) {
                        get_event_data(date);
                    },
                });


                let myTaskTable = $("#myTaskTable").DataTable({
                    "order": [],
                    "scrollX": true,
                    "bLengthChange": false,
                    "language": {
                        "paginate": {
                            "previous": "<",
                            "next": ">"
                        },
                        "search": '',
                        "searchPlaceholder": 'Search Here',
                    },
                    "fnInfoCallback": function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
                        return "Showing <span>" + iStart + " - " + iEnd + "</span> from <span>" + iMax + "</span>";
                    },
                });
                $(document).ready(function () {
                    $('input[name="date_range"]').daterangepicker({
                        opens: 'left'
                    }, function (start, end, label) {
                        $("#start_date").val(start.format('YYYY-MM-DD'));
                        $("#end_date").val(end.format('YYYY-MM-DD'));
                        $("#frmRangeFilter").submit();
                    })
                });

                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Expenses & Sales'
                    },

                    subtitle: {
                        text: ''
                    },

                    xAxis: {
                        categories: [
                            'Jan',
                            'Feb',
                            'Mar',
                            'Apr',
                            'May',
                            'Jun',
                            'Jul',
                            'Aug',
                            'Sep',
                            'Oct',
                            'Nov',
                            'Dec'
                        ]
                    },
                    yAxis: {
                        title: {
                            text: 'Expenses & Sales'
                        },
                        labels: {
                            formatter: function () {
                                return '£ ' + this.value;
                            }
                        }
                    },
                    legend: {
                        enabled: false
                    },


                    tooltip: {
                        shared: true,
                        crosshairs: true
                    },

                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },

                    series: [{
                        name: 'Expenses',
                        data:{{json_encode($chartData['expenses'])}}
                    }, {
                        name: 'Sales',
                        data:{{json_encode($chartData['sales'])}}
                    }]
                });

                function mark_as_complete(id, that) {
                    $.ajax({
                        type: 'get',
                        data: {'id': id},
                        url: "{{route('front.to_do.mark_as_complete')}}",
                        beforeSend: addOverlay,
                        success: function (r) {
                            removeOverlay();
                            if (r.status == 200) {
                                toastr['success'](r.message, "success");
                                $(that).parent('label').html('Completed');
                            } else {
                                toastr['error'](r.message, "error");
                            }

                        }
                    })
                }
            </script>
            <script type="text/javascript">
                @if($reminder_flag && (count($event_today) > 0 || count($todo_today) > 0))
                $(window).on('load', function () {
                    $('#today-reminder-modal').modal('show');
                });

                @endif
                function reminderClose() {
                    $.ajax({
                        type: 'get',
                        url: "{{route('front.reminder.close')}}",
                        beforeSend: addOverlay,
                        success: function (r) {
                            removeOverlay();
                        }
                    })
                }
            </script>
@endsection
