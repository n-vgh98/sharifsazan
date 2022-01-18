@extends('user.layouts.master')
@section('content')

    <section class="parent-call">

        <!-- start section nazarat   -->
        <section class="call-col1">
            <div class="background-col1-call">
                <div class="title-call"><b> {{ __('translation.your-message') }}</b></div>
                <div class="parent-form">
                    <form class="form-nazarat-call" action="{{ route('contactus.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" required placeholder="{{ __('translation.name') }}"
                            onkeypress="return /[a-z -'']/i.test(event.key)" class="tinp">
                        <input type="" name="email" required placeholder=" {{ __('translation.email') }}  "
                            class="tinp">
                        <textarea name="text" required placeholder="{{ __('translation.your-message') }}"
                            class="tinp"></textarea>
                        <input name="file" type="file" placeholder="{{ __('translation.file') }}" class="tinp">
                        <div class="btn-call">
                            <button type="submit"> {{ __('translation.send') }}</button>
                        </div>
                    </form>

                </div>
            </div>

        </section>
        <!-- end section nazarat   -->

        <!-- start section address -->
        <section class="call-col2">
            <div class="title-call">
                <h2>{{ __('translation.contact-us') }}</h2>
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
