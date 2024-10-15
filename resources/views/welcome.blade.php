@extends('layouts/welcome-connect')
@section('welcome-connect')
    <!-- Body main wrapper start -->
    <main class="bd-main-wrapper demo-bg-color">
        <!-- demo banner area start -->
        <div class="bd-demo-banner-area fix">
            <div class="container">
                <div class="row gy-60 align-items-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-6">
                        <div class="bd-demo-banner-content">
                            <div class="demo-banner-top-inner wow fadeInUp" data-wow-delay=".3s">
                                <div class="demo-banner-top">
                                    <div class="bd-icon">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="content">
                                        <span class="subtitle">
                                            {{$participants}}
                                        </span>
                                        Students have joined into webbook
                                    </div>
                                </div>
                                <div class="demo-banner-top">
                                    <div class="icon">
                                        <img src="{{asset('guest/imgs/award.png')}}" alt="image not found">
                                    </div>
                                    <div class="content">
                                        <span class="subtitle"><strong>{{$contributions}}</strong> Contributions from <strong>{{$participants}}</strong> students</span>
                                    </div>
                                </div>
                            </div>
                            <div class="content wow fadeInUp" data-wow-delay=".4s">
                                <h1 class="demo-banner-title mb-20">Greenwich - Book Magazine

                                </h1>
                                <p>Welcome to the "Greenwich Student Showcase," where students from diverse faculties share their work with guests worldwide. From academic projects to artistic creations, our platform celebrates the talent and diversity within our student community.

                                    Explore groundbreaking research, insightful commentary, and entrepreneurial ventures. Whether you're seeking inspiration or marveling at student ingenuity, join us on this journey of exploration and discovery. Welcome to the "Greenwich Student Showcase" – where student voices shine bright.
                                </p>
                            </div>
                            <div class="demo-banner-btn smooth mt-40 wow fadeInUp" data-wow-delay=".6s">
                                <a class="bd-btn-primary" href="{{url('register')}}">Download Now <i class="fa-regular fa-arrow-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-5 col-lg-6">
                        <div class="demo-banner-thumb-wrapper position-relative">
                            <div class="thumbnail wow fadeInRight" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                                <img src="{{asset('guest/imgs/eBook.jpg')}}" alt="Education Banner">
                            </div>
                            <div class="mobile-thumb wow fadeInUp" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                <img src="{{asset('guest/imgs/smalleBook.png')}}" alt="image not found">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area  -->

<!--Articles PAGE-->
        <!-- Start inner page Showcases area  -->
        <div class="inner-page-presentation-area section-space">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section-head text-center mb-45">
                            <div class="product-cat-title">Articles</div>
                            <h2 class="section-title-2 mb-15">Most Popular Article</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="demo-wrapper inner-pages-wrapper">
                            <div class="row inner-pages-animation">
                                <!-- Start Solo Demo  -->
                                @foreach($popularstudent as $guest)
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <div class="demo-item">
                                        <div class="solo-demo">
                                            <a class="solo-demo-link" target="_blank" href="{{ route('welcome/info', $guest->id) }}">
                                                <div class="thumbnail">
                                                    <img src="{{ asset($guest->thumbnail) }}" alt="Home Image">
                                                </div>
                                                <div class="content text-center">
                                                    <h3 class="title">{{$guest->name}}</h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <!-- End Solo Demo  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End inner page Showcases area  -->

        <!-- blog-list-area-start -->
        <section class="blog-list-area section-space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="recent-news-wrapper">
                            @foreach ($student as $list)
                            <div class="recent-news-box">
                                <div class="post-added-content">
                                    <div class="product-cat-title"><a href="{{route('welcome/info',$list->id)}}">{{$list->class->name}}</a></div>
                                    <h5 class="card-blog-post-title"><a href="{{route('welcome/info',$list->id)}}">{{$list->name}}</a></h5>
                                    {{-- <p>{{$list->content}}</p> --}}
                                    <div class="blog-post-meta">
                                        <a href="#"><img src="assets/imgs/avater/avater10.png" alt=""></a>
                                        <ul>
                                            <li>
                                                <div class="godiece">By <a href="#" tabindex="0">{{$list->user->name}}</a></div>
                                            </li>
                                            <li>
                                                <div class="godiece">Submitted <a href="#" tabindex="0">{{$list->created_at}}</a></div>
                                            </li>
                                            <li>
                                                <div class="godiece">Semester <a href="#" tabindex="0">{{$list->semester->name}}</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="added-cart-img">
                                    <a href="{{route('welcome/info',$list->id)}}">
                                        <img src="{{asset($list->thumbnail)}}" style="width: 100%; height: auto; max-width: 200px; max-height: 200px; object-fit: cover;" alt="img">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{$student->links()}}
                    </div>
                </div>
            </div>
        </section>
        
        <!-- blog-list-area-end -->

        <!-- Review area start -->
        {{-- <div class="bd-customer-review-area section-space-top">
            <div class="container">
                <div class="customer-review-title mb-45">
                    <div class="section-head text-center mb-45">
                        <div class="product-cat-title">Customers review</div>
                        <h2 class="section-title mb-10">Our Satisfied Customers</h2>
                        <p class="description">Join the ranks of our satisfied customers who have transformed their
                            educational platforms with our powerful and intuitive HTML them</p>
                    </div>
                </div>
                <div class="customer-review-wrapper">
                    <div class="customer-review-wrap">
                        <div class="customer-review-style-1">
                            <div class="content">
                                <div class="rating-icon">
                                    <img src="{{asset('guest/imgs/landing-page/icon-star.svg')}}" alt="image not found">
                                </div>
                                <p class="content-title">for <span>Customer Support</span></p>
                                <p class="text">Nice product. This developer takes his work seriously and humble to give
                                    a support even if your support package expired!</p>
                                <div class="info">
                                    <h5 class="title"> <span>by</span> Fjameel</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="customer-review-wrap">
                        <div class="customer-review-style-1">
                            <div class="content">
                                <div class="rating-icon">
                                    <img src="{{asset('guest/imgs/landing-page/icon-star.svg')}}" alt="image not found">
                                </div>
                                <p class="content-title">for <span> Design Quality</span></p>
                                <p class="text">Just Wow, I like the design and their incredible support. I had some
                                    queries and the support team replied within just an hour. Thanks for quick reply.
                                </p>
                                <div class="info">
                                    <h5 class="title"> <span>by</span> Amaterasu1</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="customer-review-wrap">
                        <div class="customer-review-style-1">
                            <div class="content">
                                <div class="rating-icon">
                                    <img src="{{asset('guest/imgs/landing-page/icon-star.svg')}}" alt="image not found">
                                </div>
                                <p class="content-title">for <span> Customizability</span></p>
                                <p class="text">Great template! Beautiful design. Everything works great. The template
                                    is Beautiful, Customizable & Fantastic User Experience. Support is amazing: fast and
                                    very helpful.</p>
                                <div class="info">
                                    <h5 class="title"> <span>by</span> Lenal10</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="customer-review-wrap">
                        <div class="customer-review-style-1">
                            <div class="content">
                                <div class="rating-icon">
                                    <img src="{{asset('guest/imgs/landing-page/icon-star.svg')}}" alt="image not found">
                                </div>
                                <p class="content-title">for <span> Customer Support</span></p>
                                <p class="text">Not only the design is GREAT, but the support is magnificent.</p>
                                <div class="info">
                                    <h5 class="title"> <span>by</span> TedColbione</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Review area end -->

        <!-- Start Faq Area  -->
        <div class="faq-area section-space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-head text-center mb-45">
                            <div class="product-cat-title mb-5">ANY QUESTION</div>
                            <h2 class="section-title-2 mb-10">Do you have any Question</h2>
                            <p class="description">Check out our FAQ section to see if we can help</p>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-7 col-sm-12 col-12">
                        <div class="bd-accordion-style bd-accordion-01 accordion">
                            <div class="accordion" id="accordionExampleb2">
                                <div class="accordion-item card p--30">
                                    <h2 class="accordion-header card-header" id="headingTwo1">
                                        <button class="accordion-button bd-border-bottom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo1">
                                            Q1. What is Greenwich Bookweb? how does it work?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo1" class="accordion-collapse collapse show" aria-labelledby="headingTwo1" data-bs-parent="#accordionExampleb2">
                                        <div class="accordion-body card-body has-border-top">
                                            <div class="inner">
                                                <p class="description">
                                                    Welcome to Newgin HTML, A news Magazine template is a
                                                    pre-designed layout that provides a structure for creating and
                                                    organizing online news content
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item card p--30">
                                    <h2 class="accordion-header card-header" id="headingTwo2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                            Q2. Can I get free support ?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2" data-bs-parent="#accordionExampleb2">
                                        <div class="accordion-body card-body has-border-top">
                                            <div class="inner">
                                                <p class="description">
                                                    We aim to build trust and strong relationships with our customers.
                                                    Offering free support is a way to show that we stand by our products
                                                    and are here to support you throughout your journey with us
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item card p--30">
                                    <h2 class="accordion-header card-header" id="headingTwo3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo3">
                                            Q3. Can I change any Elements as I like?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo3" class="accordion-collapse collapse" aria-labelledby="headingTwo3" data-bs-parent="#accordionExampleb2">
                                        <div class="accordion-body card-body has-border-top">
                                            <div class="inner">
                                                <p class="description">
                                                    it's important to note that while all elements are customizable,
                                                    there may be certain limitations or dependencies in place to
                                                    maintain the functionality and integrity of the product or service.
                                                    However, our aim is to give you the freedom to adapt it to your
                                                    needs as much as possible
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item card p--30">
                                    <h2 class="accordion-header card-header" id="headingTwo4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4">
                                            Q4. Do you have an online documentation?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo4" class="accordion-collapse collapse" aria-labelledby="headingTwo4" data-bs-parent="#accordionExampleb2">
                                        <div class="accordion-body card-body has-border-top">
                                            <div class="inner">
                                                <p class="description">
                                                    You can access our online documentation by visiting our website and
                                                    navigating to the "Documentation" or "Help Center" section. It's
                                                    designed to be user-friendly and organized, making it easy for you
                                                    to find the information you need. Whether you're looking for setup
                                                    instructions, tutorials, troubleshooting guides, or any other type
                                                    of information, our online documentation is a great place to start.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-12">
                        <div class="row g-5">
                            <div class="col-lg-12 col-md-6">
                                <div class="bd-landing-service">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <img src="{{asset('guest/imgs/landing-page/services/doc.svg')}}" alt="services">
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Online Documentation</h4>
                                            <a class="bd-btn-primary" href="{{url('register')}}" target="_blank">Documentation<span><i class="fa-regular fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Faq Area  -->

    </main>
    <!-- Body main wrapper end -->
@endsection