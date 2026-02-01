@extends('template.template')

@section('pagecontent')



        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="{{asset('frontend/img/about-1.jpg')}}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="{{asset('frontend/img/about-2.jpg')}}" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="{{asset('frontend/img/about-3.jpg')}}" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="{{asset('frontend/img/about-4.jpg')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                        <p class="mb-4">Jobify is an online job portal that helps people find jobs easily and allows companies to hire suitable candidates. We aim to make the hiring process simple and efficient.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Easy job search and application process</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Verified employers and genuine job listings</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Smart matching between jobs and candidates</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

@endsection
