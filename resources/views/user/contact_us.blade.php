@extends('user.layouts.master')
@section('content')

    <section class="parent-call">

        <!-- start section nazarat   -->
        <section class="call-col1">
            <div class="background-col1-call">
                <div class="title-call"><b> ارسال نظرات</b></div>
                <div class="parent-form">
                    <form class="form-nazarat-call" action="#">
                        <input type="text" name="name" placeholder="نام و نام خانوادگی"
                            onkeypress="return /[a-z -'']/i.test(event.key)" class="tinp">
                        <input type="" name="email" placeholder=" ایمبل  " class="tinp">
                        <textarea name="text" placeholder="شرح درخواست" class="tinp"></textarea>
                        <input type="file" placeholder="بارگذاری فایل" class="tinp">
                        <div class="btn-call">
                            <button> ثبت</button>
                        </div>
                    </form>

                </div>
            </div>

        </section>
        <!-- end section nazarat   -->

        <!-- start section address -->
        <section class="call-col2">
            <div class="title-call">
                <h2>تماس با ما</h2>
            </div>

            <div class="parent-address-phone">
                <div class="address-call">
                    <i class="fa fa-map-marker"></i>


                    <p> اسیهسهیعاسیا هسهیعهای سیزربیرمساایاعاینیدتنی تیدتنیستسی ستیدنتسیتس عتیاتسعایسیز اعیعتاسعتیا
                        عیاسعهاغعل دلغلغ غه</p>
                </div>
                <div class="phone-call">
                    <i class=" fa fa-phone"></i>
                    <p>071123456</p>
                    <i class="fa fa-mobile-alt"></i>
                    <p>0917123456</p>
                </div>
            </div>
            <nav>
                <ul class="ul-social-media">
                    <li><a href="#"> <i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="#"> <i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"> <i class="fas fa-envelope"></i></a></li>
                    <li><a href="#"> <i class="fab fa-instagram-square"></i></a></li>
                </ul>
            </nav>
            <div class="map-call call-col2-map">
                <iframe title="map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.068057571592!2d51.352869399999996!3d35.699942799999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e00a46eff293b%3A0x304edf15c1803db2!2sShabih%20Sazan%20Sharif%20Company!5e0!3m2!1sen!2s!4v1636583588549!5m2!1sen!2s"
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>
        <!-- end section address -->

    </section>
@endsection
