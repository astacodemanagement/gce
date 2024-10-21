@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)

@push('css')
    <!-- Tambahkan Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Tambahkan CSS untuk memastikan slider penuh -->
    <style>
        .swiper-container {
            width: 100%;
            height: 100vh;
            /* Ini membuat slider memenuhi tinggi layar */
        }

        .swiper-slide {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .swiper-button-next,
        .swiper-button-prev {
            z-index: 10;
            /* Pastikan navigasi terlihat di atas slide */
        }

        .swiper-button-next {
            right: 10px;
            /* Atur jarak dari tepi kanan */
        }

        .swiper-button-prev {
            left: 10px;
            /* Atur jarak dari tepi kiri */
        }

        /* Atur ukuran panah, jika diperlukan */
        .swiper-button-next,
        .swiper-button-prev {
            width: 30px;
            height: 30px;
        }
    </style>
@endpush


@section('content')


    <div class="content_box" style="overflow: hidden">
        <div class="page_timg"><img class="rczp order_head_img"
                src="{{ asset('themplete/front/news') }}/indexUploads/images/20201124/b8bd61219f77b628da664f6ac02a0844.jpg" />
        </div>
        <div class="about news-detail">
            <div class="container content">
                <div class="row">
                    <div class="col-md-10">
                        <div class="col-md-3">
                            <div class="sidebar">
                                <h4>J&amp;T Express</h4>
                                <ul>
                                    <li>
                                        <a href="news.html" class="active">
                                            News </a>
                                    </li>
                                    <li>
                                        <a href="events.html" class>
                                            Events </a>
                                    </li>
                                    <li>
                                        <a href="eotm.html" class>
                                            Top Employee </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="latest-news-collapse">
                                <div class="latest-news-collapse-content">
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear in" role="tab" id="collapse-2024">
                                                <h4 class="panel-title">2024</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse"
                                                style="display: block">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">September</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsa00c.html?show=103">
                                                                            Information on Delivery Time Adjustment </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news25b4.html?show=215">
                                                                            J&T HEBOH: Cost-Effective Heavy Parcel Shipping
                                                                            from Just Rp3,000/Kg </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news6643.html?show=214">
                                                                            J&T Express for Greener Tomorrow: Sustainability
                                                                            Initiative with the Planting of 3,000 Mangrove
                                                                            Seedlings </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth in" role="tab">
                                                                <h4 class="panel-title">August</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: block">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newscd4c.html?show=213">
                                                                            J&T Express Officially Donates Grants to MSMEs
                                                                            Across Jabodetabek and Banten via Rumah BUMN
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news95e0.html?show=212">
                                                                            Official Announcement to J&T Express Customers
                                                                            in the Affected Areas Due to the KM Niki
                                                                            Sejahtera Fire </a>
                                                                    </div>
                                                                    <div class="single col_them">
                                                                        <a href="newse9ee.html?show=211">
                                                                            J&T Express Wins TOP Brand Award in Courier
                                                                            Service Category Ahead of Its 9th Anniversary
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">July</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsb9b5.html?show=210">
                                                                            J&T Express Launches Exclusive Stamps at the
                                                                            2024 Jakarta International Philatelic Exhibition
                                                                            and Competition </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">June</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsd535.html?show=209">
                                                                            Official Statement Regarding the Unauthorized
                                                                            Use of the Personal Data of J&T Express CEO </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsae1d.html?show=208">
                                                                            J&T Express Strengthens Local Business Ecosystem
                                                                            Through J&T Connect Preneur Tour </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">April</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsaeec.html?show=207">
                                                                            J&T Express Returns to Present J&T Connect Run
                                                                            2024, Tickets Sold Out in Less Than 24 Hours
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsa3e4.html?show=206">
                                                                            Adjustment of J&T Express Operational Hours
                                                                            During Joint Holidays and Eid Al-Fitr 2024 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">March</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news4960.html?show=205">
                                                                            J&T Express Wins WOW Brand 2024 Choice of Gen Z
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsf5b0.html?show=204">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">February</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news32c5.html?show=203">
                                                                            Delivery solution for book lovers, J&T Express
                                                                            is here to become the official logistics partner
                                                                            of Big Bad Wolf Books 2024 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear " role="tab" id="collapse-2023">
                                                <h4 class="panel-title">2023</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse" style="display: ">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">December</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsbc09.html?show=202">
                                                                            J&T Express' Commitment to the Indonesian
                                                                            Economy Through Empowering MSMEs </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news0991.html?show=201">
                                                                            Achieving the Best Performance in the PPI
                                                                            Sector, Ministry of Communication and
                                                                            Information Appreciates J&T Express </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">November</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsb201.html?show=200">
                                                                            J&T Express Announces 10 SMEs with Disabilities
                                                                            Recipients of Business Assistance in the Deliver
                                                                            Possibilities Program </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">October</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newscbeb.html?show=199">
                                                                            J&T Express won the 2023 Marketeers Editor's
                                                                            Choice Award for the Brand Activation of the
                                                                            Year Category </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news66aa.html?show=198">
                                                                            Encouraging Inclusive Economic Progress, J&T
                                                                            Express Together with the Ministry of
                                                                            Cooperatives and SMEs Launches a Business
                                                                            Development Program for SMEs with Disabilities
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">September</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news1a68.html?show=197">
                                                                            Improving Delivery Service Quality, J&T Express
                                                                            Wins Indonesia Original Brand Award 2023 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth in" role="tab">
                                                                <h4 class="panel-title">August</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: block">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsc6aa.html?show=196">
                                                                            Interpret of Expreѕѕion in Each Package, J&T
                                                                            Express Collaborates with Rio Motret </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">July</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news1a9b.html?show=195">
                                                                            The Disability Community Contributes to the
                                                                            Success of J&T Connect Run Activities </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news1b6e.html?show=194">
                                                                            Adjustment of J&T Express Delivery Operational
                                                                            Points in Bandung Area </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">June</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news0928.html?show=193">
                                                                            Strengthening Service Innovation and Consistent
                                                                            Bringing Positive Benefits, J&T Express Wins Top
                                                                            Brand Award 2023 </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news5732.html?show=192">
                                                                            Presenting Millennial-Style Service Innovation,
                                                                            J&T Express Again Wins Indonesia Millenials Top
                                                                            Brand Award 2023 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">May</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news7925.html?show=191">
                                                                            J&T Express Collaborates with the National
                                                                            Narcotics Agency (BNN) Trying to Overcome Drug
                                                                            Distribution Routes and Eradicate Drug
                                                                            Trafficking Through Delivery Routes in
                                                                            Indonesian Territory </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news66e0.html?show=190">
                                                                            Brand Adaptation in the Digital Era, J&T Express
                                                                            ID Wins the Indonesia Wow Brand Award 2023 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">April</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news2a02.html?show=188">
                                                                            J&T Express Appreciates the Work Enthusiasm of a
                                                                            Courier whose Motorcycle Burned While Working
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news07c1.html?show=187">
                                                                            Adjustment of J&T Express Operating Hours During
                                                                            Joint Leave and Eid al-Fitr 2023 </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news30f1.html?show=186">
                                                                            Information on Shipping Adjustments for the 2023
                                                                            Ramadan Period </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news9656.html?show=185">
                                                                            Information on shipping constraints for the
                                                                            Tanjung Pinang Route to Natuna April 4 2023 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">March</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news4f76.html?show=183">
                                                                            J&T Express Invites Communities and Customers to
                                                                            Enjoy the Fun #NontonBLACKPINKbarengJNT </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">February</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsfa15.html?show=189">
                                                                            Actively Providing Various Positive Experiences
                                                                            for customers, J&T Express Wins the Indonesia
                                                                            Customer Experience Award </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news6dca.html?show=182">
                                                                            Supporting The Creativity Of The Work In The
                                                                            Music Industry, J&T Express Presents
                                                                            Opportunities For Music Lovers
                                                                            #NontonWestlifeBarengJNT </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear " role="tab" id="collapse-2022">
                                                <h4 class="panel-title">2022</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse" style="display: ">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">December</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news0344.html?show=181">
                                                                            Tighten the Delivery Foundation, J&T Express
                                                                            Focuses on Service Development </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsb71d.html?show=179">
                                                                            Adjustment of J&T Express Operational Hours for
                                                                            the 2023 New Year Holidays </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news0678.html?show=180">
                                                                            Celebrate Nataru, J&T Express Provides Free
                                                                            Shipping Vouchers From the Official Application
                                                                            for Customers throughout Indonesia </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsabda.html?show=178">
                                                                            BEWARE OF FRAUD IN THE NAME OF J&T EXPRESS </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsa888.html?show=177">
                                                                            ADD YOURS & WIN REALME C11 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">November</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news73ea.html?show=176">
                                                                            J&T Express Officially Introduces Lionel Messi
                                                                            as Global Brand Ambassador </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">October</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsd860.html?show=175">
                                                                            Actively Implementing an Ada Campaign for You,
                                                                            J&T Express Wins Marketeers Editor's Choice
                                                                            Award 2022 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth in" role="tab">
                                                                <h4 class="panel-title">August</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: block">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsbd5a.html?show=173">
                                                                            J&T Express Improves Shipping Operations By
                                                                            Optimizing Sorting Warehouses </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news954c.html?show=172">
                                                                            Celebrate 7th Anniversary, J&T Express Gives
                                                                            100% Free Shipping All Over Indonesia for
                                                                            Customers </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">July</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsf629.html?show=171">
                                                                            Stronger Strengthening Its Brand, J&T Express
                                                                            Again Wins Top Brand Award 2022 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">June</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news7df1.html?show=170">
                                                                            J&T Express Expands in Egypt to Expand Global
                                                                            Network </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news6de6.html?show=169">
                                                                            J&T Express Collaborates with Arief Muhammad and
                                                                            Rizky Billar in Experimental Activity Mendadak
                                                                            Ngurir </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">May</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news11f1.html?show=168">
                                                                            Expand Network in Latin America, J&T Express
                                                                            Continues Expansion to Brazil </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsc23e.html?show=167">
                                                                            J&T Express Supports Efforts to Eradicate Drug
                                                                            Abuse with BNN </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">March</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news6650.html?show=165">
                                                                            Winning These Two Awards, J&T Express
                                                                            Consistently Communicates Young and Active
                                                                            Brands </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsd542.html?show=164">
                                                                            Wins Indonesia Wow Brand Award 2022 Proves J&T
                                                                            Express Increasingly Strengthens Brand Awareness
                                                                            in Endemic Times </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news2fc5.html?show=166">
                                                                            Become the Official Logistics Sponsor Mandalika
                                                                            GP Series, J&T Express Invites the Community To
                                                                            Watch the Exclusive MotoGP in Lombok </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">February</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news789a.html?show=163">
                                                                            Successful Expansion To 10 Countries, This Time
                                                                            J&T Express Presents in Latin America as the
                                                                            11th Country </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news6669.html?show=162">
                                                                            J&T Express Held Back The Shipping Discount Week
                                                                            Starting From 40% To All Regions Of Indonesia
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newse401.html?show=161">
                                                                            J&T Express Bogor Inaugurated Gateway With
                                                                            Efficient Use of Automatic Sorting Machines </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news594f.html?show=160">
                                                                            J&T Express Dirikan Kantor Pusat Regional MENA
                                                                            di Arab Saudi dan Menandatangani MoU tentang
                                                                            Smart Logistics Park Terbesar </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">January</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news01b2.html?show=159">
                                                                            Enliven Early Years Delivery, J&T Express Holds
                                                                            a Shipping Discount Week Up To 40% all over
                                                                            Indonesia </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsf34d.html?show=157">
                                                                            J&T Express Officially Launches Expansion to the
                                                                            United Arab Emirates (UAE) and Saudi Arabia </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear " role="tab" id="collapse-2021">
                                                <h4 class="panel-title">2021</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse" style="display: ">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">December</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news21c7.html?show=155">
                                                                            Wow! J&T Express Exceeds Its Highest Delivery
                                                                            Record In Harbolnas 12.12 To 25 Million Packages
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news0c7f.html?show=154">
                                                                            End of the Year, J&T Express Pampers Customers
                                                                            with a 35% Postage Discount Party </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">November</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news20f1.html?show=153">
                                                                            J&T Express Delivery Increases to 16,5 Million
                                                                            Packages at Harbolnas 11.11 </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news6e95.html?show=152">
                                                                            J&T International Standard Express Ready to
                                                                            Deliver Packages Overseas! </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">October</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news54f2.html?show=151">
                                                                            Continuing to be Developed, Now J&T Super
                                                                            Services are Present in 30 Cities </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsb540.html?show=150">
                                                                            Semi Post-Pandemic , J&T Express Shipping
                                                                            Transactions Harbolnas 10.10 Increasingly
                                                                            Speeding Up to 13.5 million Packages </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">September</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news955b.html?show=148">
                                                                            Use the J&T Express Mobile Application, Enjoy
                                                                            25% Shipping Discounts Every Day </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newscad9.html?show=149">
                                                                            Commemorating National Red Cross Day, J&T
                                                                            Express Tangerang Distributes Humanitarian Aid
                                                                            to 3 Hospitals </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news3951.html?show=147">
                                                                            Winning Top Brand Award for 4 Years in a Row,
                                                                            J&T Express Proves Improvement in Brand
                                                                            Performance </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth in" role="tab">
                                                                <h4 class="panel-title">August</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: block">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newseecc.html?show=146">
                                                                            These are the Top 3 J&T Super Sellers Who
                                                                            Received Hundreds of Million Rupiah Business
                                                                            Capital </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news54dd.html?show=145">
                                                                            J&T Cargo is Ready to Serve Large Package
                                                                            Delivery in Indonesia </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news05f7.html?show=144">
                                                                            J&T Cargo is Coming Soon to Serve Large Package
                                                                            Delivery in Indonesia </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news8697.html?show=143">
                                                                            The Peak of the #100JutaPelangganJNT
                                                                            Appreciation Program, J&T Express Holds the
                                                                            Merdeka Kirim Paket Program on the 76th
                                                                            Indonesian Independence Day </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">July</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news3dcb.html?show=142">
                                                                            Reaching 100 Million Customers, J&T Express
                                                                            Holds A Billion Rupiah Appreciation Program To
                                                                            Customers </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsb953.html?show=141">
                                                                            Nearing its 6th Anniversary, J&T Express Proves
                                                                            the Effectiveness of Brand Engagement by Winning
                                                                            Indonesia Most Engage Delivery Services Brand
                                                                            2021 Award </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newse631.html?show=140">
                                                                            J&T Express Wins Indonesia Original Brand Award
                                                                            2021 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">June</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsbeda.html?show=139">
                                                                            Supporting the Vaccination Program, J&T Express
                                                                            Employees Are Receiving Vaccination Immediately
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news16c5.html?show=138">
                                                                            J&T Express Expands J&T Super Service to These 5
                                                                            Cities </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newse8ac.html?show=137">
                                                                            J&T Express Announces TOP 10 J&T Super Sellers
                                                                            To Enter Incubation Competition Period </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">May</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsd51f.html?show=136">
                                                                            Serving Delivery during Ramadan, J&T Express
                                                                            Send 5 Million Packages Per Day </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newscb42.html?show=135">
                                                                            INFORMATION ON OPERATIONAL TIME J&T EXPRESS
                                                                            DURING JOINT LEAVES & HOLIDAYS Eid al-Fitr 1442
                                                                            HIJRIAH </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">April</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsa5c1.html?show=133">
                                                                            A place for buying and selling online
                                                                            transactions in the form of a fashion show, J&T
                                                                            Express presents J&T Fashion Week </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news6436.html?show=134">
                                                                            J&T Express Package Payment Transactions with
                                                                            ShopeePay </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">March</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news98bf.html?show=130">
                                                                            Enjoy Premium Delivery Service with J&T Super
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news38c1.html?show=129">
                                                                            Strengthening Branding and Positioning, J&T
                                                                            Express Wins Wow Brand Award 2021 Once Again
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news582f.html?show=128">
                                                                            Launching J&T Super Service, J&T Express
                                                                            Provides a Premium Delivery Guarantee </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsf90a.html?show=127">
                                                                            J&T Express Launches Air Freighter to Improve
                                                                            Package Delivery Efficiency </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news6fdc.html?show=126">
                                                                            Information on Nyepi Day Delivery Adjustments
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsbb33.html?show=125">
                                                                            Supporting Student Business Development, J&T
                                                                            Express Holds a Competition and Business
                                                                            Incubator Program with a Total Prize of 380
                                                                            Million Rupiah </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear " role="tab" id="collapse-2020">
                                                <h4 class="panel-title">2020</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse" style="display: ">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">December</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsb2b5.html?show=122">
                                                                            Shipping Customization Information </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsb57f.html?show=121">
                                                                            J&T Express Breaks the Record for Highest
                                                                            Delivery of Up to 20 Million Packages at
                                                                            Harbolnas 12.12 </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">November</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news7a08.html?show=120">
                                                                            Harbolnas 11.11, J&T Express Records a 6.5x
                                                                            Increase in Shipping Traffic </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news67a5.html?show=119">
                                                                            Optimizing Services In Its Fifth Year, J&T
                                                                            Express Receives Appreciation at the 2020 WOW
                                                                            Brand Award </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">October</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news64aa.html?show=118">
                                                                            Customers from Daeng City Use Grand Prize of 5th
                                                                            J&T Express Anniversary to Build a Place of
                                                                            Worship </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsb1c0.html?show=117">
                                                                            Maximize the Date of Twin Numbers 10.10 Amid the
                                                                            Pandemic, J&T Express Launches Delivery of Up to
                                                                            8 Million Packages </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth in" role="tab">
                                                                <h4 class="panel-title">August</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: block">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsb756.html?show=116">
                                                                            5 Years Old, J&T Express Holds a Lively Birthday
                                                                            Network </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsca0a.html?show=115">
                                                                            J&T Express Wins Top Brand Award 2020 for the
                                                                            Third Time </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">July</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news2713.html?show=114">
                                                                            Towards the 5th Anniversary, J&T Express
                                                                            Appreciates Customers by Realizing Dream Items
                                                                            Through the J&T Gapai Mimpimu Program </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsbdea.html?show=113">
                                                                            Awarded the Indonesia Millennials Top Brand
                                                                            Award 2020, J&T Express Proves Its Brand is
                                                                            Excellent Among the Young Generation </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">May</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsb15c.html?show=111">
                                                                            Serving Delivery Without Holidays, J&T Express
                                                                            Record Delivery of 3 Million Packages During
                                                                            Ramadan </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">April</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsa878.html?show=108">
                                                                            Notifice on Air Delivery Time Adjustment </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsdff7.html?show=107">
                                                                            J&T Express Campaigns for Indonesian Youth
                                                                            Productivity and Creativity With
                                                                            #JntikanPerubahan in 2020 </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsee59.html?show=106">
                                                                            Information on change of delivery address </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news031f.html?show=105">
                                                                            J&T Express Rises Service Standards Amid
                                                                            Covid-19 Pandemic in Indonesia </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">March</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news7c80.html?show=124">
                                                                            Facing the Spread of Covid 19 Virus, J&T Express
                                                                            is Ready to Take Preventive Measures As well as
                                                                            assistance to the Pusat Angkatan Darat Hospital
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news2c30.html?show=104">
                                                                            Beware of Fraud Using J&T Express‘ Name </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">February</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsb4ea.html?show=100">
                                                                            Innovating and Advancing Technology, J&T Express
                                                                            Wins Indonesia Digital Award Innovation Award
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">January</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news21f6.html?show=99">
                                                                            Good performance, J&T Express Bogor Gives Award
                                                                            to the Best Employees </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsa6b6.html?show=74">
                                                                            Winner of the J&T Express Blog Competition </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsaaa0.html?show=45">
                                                                            Immediately Helping Flood Victims, J&T Express
                                                                            Forms J&T Express Care Movement Team </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear " role="tab" id="collapse-2019">
                                                <h4 class="panel-title">2019</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse" style="display: ">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">December</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news8b62.html?show=23">
                                                                            Manifest Love On Mother's Day, J&T Express
                                                                            Invites Community Children to Give Gifts to
                                                                            Their Mothers </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news419f.html?show=24">
                                                                            Welcoming the Online Shopping Festival, J&T
                                                                            Express Maximizes 12.12 Deliveries to 10 Million
                                                                            Packages </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">November</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsf900.html?show=25">
                                                                            J&T Express Collaborates with Kompasiana in a
                                                                            Writing Competition </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news50bf.html?show=26">
                                                                            Digging Traditional Value of West Java, J&T
                                                                            Express Bandung Santuni the Dhuafa by
                                                                            Distributing Groceries </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsf266.html?show=27">
                                                                            In the Online Shopping Festival 11.11, J&T
                                                                            Express Goes Up By Reaching 6 Million Packages
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">October</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news945d.html?show=28">
                                                                            J&T Express Collaborates with Several
                                                                            Marketplaces Invites Vacation Sellers Abroad
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">September</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsc322.html?show=29">
                                                                            J&T Express Collaborates with the Tauberes
                                                                            Application </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news8c22.html?show=30">
                                                                            J&T Express Successfully Wins Indonesia Go Asean
                                                                            Champion Award </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news1618.html?show=31">
                                                                            Embrace SOS Children’s Villages, J&T Express
                                                                            Distributes more than 1,000 elementary schools
                                                                            in Indonesia </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth in" role="tab">
                                                                <h4 class="panel-title">August</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: block">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news2278.html?show=32">
                                                                            Winning the 2019 Top Brand Award, Percentage of
                                                                            J&T Express Increases from the Previous Year
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news73a6.html?show=33">
                                                                            4 Years of Growth, J&T Express Builds Innovation
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">July</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newse8d2.html?show=34">
                                                                            J&T Express Becomes Official Logistics Partner
                                                                            of EVOS Esports to Support Industry 4.0 </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsd54f.html?show=44">
                                                                            Beware of Fraud Using the Name of J&T Express
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">June</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsfe76.html?show=35">
                                                                            Facing Ramadan Delivery, J&T Express Reaches 2
                                                                            million Packages </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">May</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsc312.html?show=36">
                                                                            Building The Goodness At Ramadhan, J&T Express
                                                                            Holds Fast Breaking with Orphans Nationally </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news7ea7.html?show=37">
                                                                            J&T Express Holds Super Ramadhan Campaign in
                                                                            this Holy Month </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newscfcd.html?show=38">
                                                                            J&T Express Delivery Preparation In Ramadhan
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">April</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news9bb8.html?show=39">
                                                                            J&T Express Reaches Fifth Countries in Southeast
                                                                            Asia </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">March</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news47b0.html?show=40">
                                                                            J&T Express Apply Own Regulated Agent </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsf060.html?show=41">
                                                                            J&T Express Officially penetrates the
                                                                            Philippines Market </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">February</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news0919.html?show=42">
                                                                            Support the socialization of Dengue Fever Alert,
                                                                            J&T Express Fogging More than 1000 Houses </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news7191.html?show=43">
                                                                            Media Partner's Visit to Jakarta Gateway: J&T
                                                                            Express Introduces Sort Center With Qualified
                                                                            Facilities </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear " role="tab" id="collapse-2018">
                                                <h4 class="panel-title">2018</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse" style="display: ">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">December</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsdec4.html?show=46">
                                                                            Celebrate Christmas with the Elderly, J&T
                                                                            Express Gives Joy </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news1211.html?show=47">
                                                                            Prize Winner for the Yamaha Nmax </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsef12.html?show=48">
                                                                            J&T Express Succeeds in Enlivening Harbolnas
                                                                            2018 with Recorded Delivery Record of Up to 4.5
                                                                            Million Packages </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsf2be.html?show=49">
                                                                            Celebrate Harbolnas, J&T Express Distribute
                                                                            Prizes 2 Units of Yamaha Nmax Motorcycle </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news2276.html?show=50">
                                                                            Ahead of Harbolnas, J&T Express Inaugurates
                                                                            Operation of Automatic Sorting Machine </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsd4de.html?show=51">
                                                                            Commemorating International Disability Day, J&T
                                                                            Express Holds a Visit to Jakarta Aquarium with
                                                                            YPAC </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">September</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news0889.html?show=52">
                                                                            Understanding the Market, J&T Express Wins 2018
                                                                            Marketing Award </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth in" role="tab">
                                                                <h4 class="panel-title">August</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: block">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newse29f.html?show=53">
                                                                            J&T Express Distributes 400 Kg of Aid for Lombok
                                                                            Earthquake Victims </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsb434.html?show=54">
                                                                            Invite Orphans, J&T Express Holds Activities
                                                                            Towards the 3rd Anniversary and 2018 Asian Games
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsd5af.html?show=55">
                                                                            Third Age J&T Express Wins 3 Consumer Choice
                                                                            Awards </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">July</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news3249.html?show=56">
                                                                            Entering the Third Year, J&T Express Wins the
                                                                            2018 Top Brand Award </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news573b.html?show=57">
                                                                            Supporting the E-commerce Market in Indonesia,
                                                                            J&T Express Participates in the Indo E-commerce
                                                                            Conference </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">May</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news1a74.html?show=58">
                                                                            Free promo shipping on J&T Express with
                                                                            Bukalapak </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newse28c.html?show=59">
                                                                            Supporting the Growth of Indonesian Children's
                                                                            Reading Interest, J&T Express Donated 8000 books
                                                                            on National Book Day </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news7466.html?show=60">
                                                                            J&T Express Prepares Ripe To Anticipate High
                                                                            Shipping in Ramadan </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">April</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news504c.html?show=65">
                                                                            Announcement of Shipping Operations in Bali on
                                                                            Nyepi 2018 </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsa3d5.html?show=63">
                                                                            J&T Express Receives the Best Cargo Agent Award
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">March</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news1453.html?show=64">
                                                                            Cover Music Video Competition Let's Send Use J&T
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news60cf.html?show=66">
                                                                            Realize Professional Standards, More Than 5000
                                                                            Sprinter Passed National Training </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news1972.html?show=67">
                                                                            Announcement of Changes to J&T Express Hotline
                                                                            Numbers </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">February</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsbdc4.html?show=72">
                                                                            Express Your Online Business Talkshow; Online
                                                                            Seller Education for Creative Business </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news6115.html?show=73">
                                                                            Announcement of the Mascot Design Competition
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">January</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsb869.html?show=76">
                                                                            J&T Express Gives Appreciation to Outstanding
                                                                            Employees </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news34e8.html?show=77">
                                                                            Beware of Fraud Mode in the Name of PT. Global
                                                                            Jet Express </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news0805.html?show=75">
                                                                            J&T Express Invites Loyal Customers on an
                                                                            Ecommerce Study Trip to Hangzhou </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear " role="tab"
                                                id="collapse-2017">
                                                <h4 class="panel-title">2017</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse"
                                                style="display: ">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">December</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news1300.html?show=78">
                                                                            Replace Santa Claus, Sprinters Deliver Christmas
                                                                            Gifts for the Orphans' Children's Dreams </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">November</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news87fd.html?show=79">
                                                                            Distribution of Masks for Victims of the Impact
                                                                            of Mount Agung Volcanic Ash </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsb508.html?show=80">
                                                                            J&T Express Receives First Award in Indonesia
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">October</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news5ad7.html?show=81">
                                                                            Statement </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">July</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsdd91.html?show=82">
                                                                            Clarification News Job Vacancies J&T Express
                                                                            Duren Sawit </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news78ed.html?show=83">
                                                                            J&T Express Prepares Funds More Than US $ 100
                                                                            Million to Expand Networks in Indonesia </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">May</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news2ea0.html?show=84">
                                                                            Official Launching J&T Alibaba </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news15f6.html?show=61">
                                                                            Tokopedia Free Shipping Promo </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="newsa5e5.html?show=85">
                                                                            Notification of Change in Price of J&T Express
                                                                            Service </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">April</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsdd11.html?show=62">
                                                                            J&T Express Update Visuals and Mobile
                                                                            Application Features to Make Delivery Easier
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">March</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news3601.html?show=86">
                                                                            Inaugurates New Office, Now J&T Express Occupies
                                                                            Its Own Home </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">January</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news69a2.html?show=87">
                                                                            Synergy of J&T Express and Tokopedia, Easing
                                                                            E-commerce Services in Indonesia </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear " role="tab"
                                                id="collapse-2016">
                                                <h4 class="panel-title">2016</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse"
                                                style="display: ">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">December</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news5404.html?show=88">
                                                                            Celebrate Harbolnas 12-12-2016, Regional Manager
                                                                            of J&T Express Deliver Packages Directly to
                                                                            Customers </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">October</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news6637.html?show=89">
                                                                            New Style Send Package </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth in" role="tab">
                                                                <h4 class="panel-title">August</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: block">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newsa0b1.html?show=90">
                                                                            One Year Serving Indonesia </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">June</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news7278.html?show=91">
                                                                            Go Back To Hometown Easily, No Need To Bear It
                                                                        </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news642e.html?show=92">
                                                                            Convenience in One Grip </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">May</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news5f65.html?show=93">
                                                                            Application as a mainstay </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">April</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="newse984.html?show=96">
                                                                            J&T Express sends Packages to the entire
                                                                            archipelago </a>
                                                                    </div>
                                                                    <div class="single ">
                                                                        <a href="news0992.html?show=94">
                                                                            Send Express Packages Without Worries </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-group collapse-year" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapseYear " role="tab"
                                                id="collapse-2015">
                                                <h4 class="panel-title">2015</h4>
                                            </div>
                                            <div class="panel-collapse collapse-year-content collapse"
                                                style="display: ">
                                                <div class="panel-body">
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth " role="tab">
                                                                <h4 class="panel-title">December</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: ">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news3eb4.html?show=97">
                                                                            J&T Express Family's First Christmas </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-group collapse-month" id="accordion"
                                                        role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading collapseMonth in" role="tab">
                                                                <h4 class="panel-title">August</h4>
                                                            </div>
                                                            <div class="panel-collapse collapse-month-content collapse"
                                                                style="display: block">
                                                                <div class="panel-body">
                                                                    <div class="single ">
                                                                        <a href="news1c40.html?show=98">
                                                                            The Official Launch Of J&T Express </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 detail-box pos_r">
                            <h3>J&T Express Wins TOP Brand Award in Courier Service Category Ahead of Its 9th Anniversary
                            </h3>
                            <div class="mx_img_box pos_r" style="margin-bottom: 25px;padding: 0 20px;">
                                <div class="mx_img_big flex xqimg xqimg" style="padding">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide"><img
                                                src="{{ asset('themplete/front/news') }}/indexUploads/images/20240813/7efa02b73a4fcb1a2564f836ea589226.jpg"
                                                style="width: 100%;" /></div>
                                        <div class="swiper-slide"><img
                                                src="{{ asset('themplete/front/news') }}/indexUploads/images/20240813/14cf5211cb9c1c021725e01cebd02db5.jpg"
                                                style="width: 100%;" /></div>
                                    </div>
                                </div>

                                <div class="swiper-button-prev news-mx-pn"
                                    style="left: 0;background-image: url('{{ asset('themplete/front/news') }}/static/images/xw_left.png')">
                                </div>
                                <div class="swiper-button-next news-mx-pn"
                                    style="right: 0;background-image: url('{{ asset('themplete/front/news') }}/static/images/xw_right.png')">
                                </div>
                            </div>
                            <div>
                                <p><span style="text-wrap: nowrap;">On April 7, 2024, J&amp;T Express officially received
                                        the prestigious TOP Brand Award at Ayana Resort, Jimbaran, Bali. The award was
                                        accepted by Herline Septia, Brand Manager of J&amp;T Express.</span></p>
                                <p><span style="text-wrap: nowrap;"><br /></span></p>
                                <p><span style="text-wrap: nowrap;">The TOP Brand Award, initiated by Marketing Magazine
                                        and Frontier Group—one of Indonesia’s leading independent survey agencies—is a
                                        highly coveted recognition in the Indonesian branding industry. This award serves as
                                        a testament to a brand&#39;s quality and standing in the Indonesian market.</span>
                                </p>
                                <p><span style="text-wrap: nowrap;"><br /></span></p>
                                <p><span style="text-wrap: nowrap;">2024 marks the sixth consecutive year that J&amp;T
                                        Express has maintained its position as a TOP Brand Award winner. Over the past five
                                        years, J&amp;T Express has consistently ranked in the top three since first being
                                        nominated. This year, J&amp;T Express claimed the top spot in the Courier Service
                                        Category with a Top Brand Index of 50.90%, significantly outpacing its
                                        competitors.</span></p>
                                <p><span style="text-wrap: nowrap;"><br /></span></p>
                                <p><span style="text-wrap: nowrap;">The brands that win this award are determined through
                                        surveys conducted by Frontier Group, covering 15 cities across Indonesia, including
                                        Greater Jakarta, Bandung, Semarang, Yogyakarta, Surabaya, Malang, Banjarmasin,
                                        Manado, Medan, Makassar, Pekanbaru, Balikpapan, Palembang, Samarinda, and
                                        Denpasar.</span></p>
                                <p><br /></p>
                            </div>
                            <div class="footer flex">
                                <div class="publish-date col-md-12 col-xs-12 text-right">
                                    <span>Release time：2024-08-13</span>
                                </div>
                            </div>
                            <a class="news_prev" href="news95e0.html?show=212">Prev</a>
                            <span></span>
                            <a class="news_next" href="newsb9b5.html?show=210">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img class="gotop" style="display: none" onclick="if (!window.__cfRLUnblockHandlers) return false; goTop()"
        src="{{ asset('themplete/front/news') }}/static/images/backtop-bolck.png"
        data-cf-modified-e5520a29f0537b9d756f2474- />
    <div class="index4_footer" style="position: relative;margin-top: 40px;">














    @endsection


    @push('scripts')
        <!-- Tambahkan Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



        <script>
            // Slider Pertama
            var swiper = new Swiper('.swiper-container', {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                slidesPerView: 1,
            });

            // Slider Mitra
            var swiperPartners = new Swiper('.swiper-container-partners', {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next-partners',
                    prevEl: '.swiper-button-prev-partners',
                },
                slidesPerView: 6,
                spaceBetween: 10,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                    640: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                    1024: {
                        slidesPerView: 6,
                        spaceBetween: 10,
                    }
                }
            });

            // Slider Layanan
            var swiperFeatures = new Swiper('.swiper-container-features', {
                loop: true, // Aktifkan looping
                slidesPerView: 5,
                spaceBetween: 10, // Jarak antar slide
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    360: {
                        slidesPerView: 2, // 1 slide pada layar kecil
                        spaceBetween: 10,
                        loop: true
                    },
                    640: {
                        slidesPerView: 2, // 2 slide pada layar sedang
                        spaceBetween: 20,
                        loop: true
                    },
                    768: { // Penyesuaian untuk ukuran tablet
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 5, // 5 slide pada layar besar
                        spaceBetween: 30,
                    }
                }
            });
        </script>
    @endpush
