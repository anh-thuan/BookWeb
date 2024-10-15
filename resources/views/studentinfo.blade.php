@extends('layouts/welcome-connect')
@section('welcome-connect')
    <!-- Header area end -->
    <div class="back-breadcrumb">
        <button onclick="history.back()" class="back-btn"><a href="{{url('')}}">back<i class="fa-light fa-angle-left"></i></a></button>
    </div>
    <!-- Body main wrapper start -->
    <main>

        <!-- about-area-start -->
        <section class="about-us-area section-space">
            <div class="container">
                <div class="row g-40 align-items-center">
                    <div class="col-lg-5">
                        <div class="about-img-wrapper">
                            <img src="{{asset($welcomeinfo->thumbnail)}}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-content">
                            <div class="product-cat-title"><a href="#">{{$welcomeinfo->class->name}}</a></div>
                            <h2 class="section_title">{{$welcomeinfo->name}}</h2>
                            <div class="about-text">
                                <h5>Content</h5>
                                <p>
                                    {{$welcomeinfo->content}}
                                </p>
                            </div>
                            <div class="about-text">
                                <h5>Coordinator
                                <p>
                                    {{$welcomeinfo->class->user->name}}
                                </p>
                            </div>
                            <div class="about-text">
                                <p><strong>Semester: </strong> {{$welcomeinfo->semester->name}}</p>
                                <p><strong>Post Date: </strong> {{$welcomeinfo->created_at}}</p>
                                <p><strong>Status: </strong> {{$welcomeinfo->status}}</p>
                                <p><strong>Comment: </strong> {{$welcomeinfo->comment}}</p>
                            </div>
                            <a href="{{url('register')}}"><button class="subscribe-btn learn_btn">Download<i class="fa-regular fa-angle-right"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- about-video-area-start -->
        {{-- <div class="about-video-area" data-background="assets/imgs/bg/about-bg2.png">
            <div class="video-btn">
                <a href="https://www.youtube.com/watch?v=-QXrbXYE4jE" class="play-btn popup-video">play</a>
            </div>
        </div> --}}
        <!-- about-video-area-end -->
    </main>
    <!-- Body main wrapper end -->

    <!-- Footer area start -->
@endsection