<!-- all stylesheet -->
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Greenwich - Book Magazine</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('guest/imgs/greenwich-small.jpg')}}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('guest/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/css/vendor/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/css/plugins/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('guest/css/vendor/fontawesome-pro.css')}}">
    <link rel="stylesheet" href="{{asset('guest/css/vendor/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('guest/css/main.css')}}">
</head>
<style>
    .thumbnail {
    width: 100%;
    height: 300px; /* Adjust the height as needed */
    overflow: hidden;
    }

    .thumbnail img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
</style>


<body>

    <!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

    <!-- Preloader start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!-- Preloader start -->

    <!-- Backtotop start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Backtotop end -->

    <!-- ofcanvas-area-start -->
    <div class="offcanvas-info">
        <div class="row">
            <div class="col-12">
                <div class="offcanvas-top mb-40">
                    <div class="offcanvas-logo"><a href="{{url('register')}}">
                            <img class="offcanvas-logo-white" src="{{asset('guest/imgs/greenwich(dark).png')}}" alt="img">
                            <img class="offcanvas-logo-dark" src="{{asset('guest/imgs/greenwich(dark).png')}}" alt="img">
                        </a></div>
                    <div class="offcanvas-icon">
                        <button>
                            <i class="fal fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="wrapper">
                    <form action="#">
                        <div class="offcanvas-input mb-25">
                            <input type="text" placeholder="What are you searching for?" name="keyword" value="{{request()->input('keyword')}}">
                            <button type="submit" class="offcanvas-search">
                                <i class="fa-regular fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="mobile-menu"></div>
            </div>
            <div class="col-12">
                <div class="offcanvas-contact">
                    <h4>Contact Info</h4>
                    <div class="offcanvas-link mb-10">
                        <ul>
                            <li>
                                <div class="ofcanvas-link-icon">
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                                <div class="offcanvas-link-text">
                                    <a href="mailto:info@newgin.com">info@newgin.com</a>
                                </div>
                            </li>
                            <li>
                                <div class="ofcanvas-link-icon">
                                    <i class="fa-regular fa-phone"></i>
                                </div>
                                <div class="offcanvas-link-text">
                                    <a href="tel:+77788899900">+777 888 999 00</a>
                                </div>
                            </li>
                            <li>
                                <div class="ofcanvas-link-icon">
                                    <i class="fa-light fa-location-dot"></i>
                                </div>
                                <div class="offcanvas-link-text">
                                    <a href="https://www.google.com/maps/place/Orville+St,+La+Presa,+CA+91977,+USA/@32.7092048,-117.0082772,17z/data=!3m1!4b1!4m5!3m4!1s0x80d9508a9aec8cd1:0x72d1ac1c9527b705!8m2!3d32.7092003!4d-117.0060885">12/A,
                                        New Booson, NYC</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3 class="follow-link">follow us</h3>
                    <div class="footer-social-icon offcanvas-social">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ofcanvas-area-end -->

    <!-- subscription-area-start -->
    <div class="subscribtion-modal-area">
        <div class="subscription-border">
            <div class="container">
                <div class="subscription-top">
                    <div class="header-top-logo">
                        <h2 class="back-title d-none d-lg-block">magazine</h2>
                        <a href="index.html"><img src="{{asset('guest/imgs/logo/logo-dark.svg')}}" alt="img"></a>
                    </div>
                    <div class="offcanvas-icon">
                        <button>
                            <i class="fal fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="subscription-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <div class="subscription-iteam">
                            <div class="subscription-brand-wrap">
                                <h2 class="subs_title"><a href="#">subscription</a></h2>
                                <div class="subscribe_logo"><a href="index.html"><img src="{{asset('guest/imgs/logo/logo-dark.svg')}}" alt="img"></a></div>
                                <h4 class="subcription_dolour">$700/ <span>3 Month</span></h4>
                                <button class="subscribe-btn" type="submit">Subscribe<i class="fa-regular fa-angle-right"></i></button>
                            </div>
                            <div class="subscription-brand-wrap">
                                <h2 class="subs_title"><a href="#">subscription</a></h2>
                                <div class="subscribe_logo"><a href="index.html"><img src="{{asset('guest/imgs/logo/logo-dark.svg')}}" alt="img"></a></div>
                                <h4 class="subcription_dolour">$1800/ <span>6 Month</span></h4>
                                <button class="subscribe-btn" type="submit">Subscribe<i class="fa-regular fa-angle-right"></i></button>
                            </div>
                            <div class="subscription-brand-wrap">
                                <h2 class="subs_title"><a href="#">subscription</a></h2>
                                <div class="subscribe_logo"><a href="index.html"><img src="{{asset('guest/imgs/logo/logo-dark.svg')}}" alt="img"></a></div>
                                <h4 class="subcription_dolour">$2500/ <span>9 Month</span></h4>
                                <button class="subscribe-btn" type="submit">Subscribe<i class="fa-regular fa-angle-right"></i></button>
                            </div>
                            <div class="subscription-brand-wrap">
                                <h2 class="subs_title"><a href="#">subscription</a></h2>
                                <div class="subscribe_logo"><a href="index.html"><img src="{{asset('guest/imgs/logo/logo-dark.svg')}}" alt="img"></a></div>
                                <h4 class="subcription_dolour">$7200/ <span>1Year Month</span></h4>
                                <button class="subscribe-btn" type="submit">Subscribe<i class="fa-regular fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-8">
                        <div class="followus-wrapper">
                            <div class="sidebar-widget">
                                <h6 class="sidebar-widget-title">Search Here</h6>
                                <div class="sidebar-input-field">
                                    <input type="text" placeholder="Keywords">
                                    <button type="submit" class="input-search-btn"><i
                                 class="fa-regular fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                            <div class="offcanvas-contact">
                                <h4>Contact Info</h4>
                                <div class="offcanvas-link mb-10">
                                    <ul>
                                        <li>
                                            <div class="ofcanvas-link-icon">
                                                <i class="fa-regular fa-envelope"></i>
                                            </div>
                                            <div class="offcanvas-link-text">
                                                <a href="mailto:info@newgin.com">info@newgin.com</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ofcanvas-link-icon">
                                                <i class="fa-regular fa-phone"></i>
                                            </div>
                                            <div class="offcanvas-link-text">
                                                <a href="tel:+77788899900">+777 888 999 00</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ofcanvas-link-icon">
                                                <i class="fa-light fa-location-dot"></i>
                                            </div>
                                            <div class="offcanvas-link-text">
                                                <a href="https://www.google.com/maps/place/Orville+St,+La+Presa,+CA+91977,+USA/@32.7092048,-117.0082772,17z/data=!3m1!4b1!4m5!3m4!1s0x80d9508a9aec8cd1:0x72d1ac1c9527b705!8m2!3d32.7092003!4d-117.0060885">12/A,
                                                    New Booson, NYC</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="follow-link">follow us</h3>
                                <div class="footer-social-icon offcanvas-social">
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscription-area-end -->

    <!-- ofcanvas-overlay -->
    <div class="offcanvas_overlay"></div>
    <!-- ofcanvas-overlay -->

    <!-- Modal -->
    <div class="modal-wrap">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fal fa-times"></i></button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="modal-img text-center mb-15"><img src="{{asset('guest/imgs/bg/modal.png')}}" alt="img">
                        </div>
                        <div class="modal-text">
                            <h4>Subscribe</h4>
                            <p>For all thing design,delivered to your inbox</p>
                            <input type="text" placeholder="Enter email address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bd-contanct-btn">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header area start -->
    <header>
        <div id="header-sticky" class="header__area demo__header">
            <div class="container">
                <div class="mega__menu-wrapper p-relative">
                    <div class="header__main">
                        <div class="header__left">
                            <div class="header__logo">
                                <a href="{{url('register')}}">
                                    <img class="logo__white" src="{{asset('guest/imgs/greenwich.jpg')}}" style="width:300px;height:auto;" alt="logo not found">
                                </a>
                            </div>
                        </div>
                        <div class="header__middle">
                            <div class="mean__menu-wrapper d-none d-lg-block">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="has-dropdown has-mega-menu">
                                                <a href="javascript:void(0)">Book List</a>
                                                <ul class="mega-menu">
                                                    <li>
                                                        <div class="home__menu-grid">
                                                            <div class="home__menu-item">
                                                                <div class="home__menu-thumb">
                                                                    <img src="{{asset('guest/imgs/menu/menu-home-1.jpg')}}" alt="thumb not found">
                                                                    <div class="home__menu__buttons">
                                                                        <a class="bd-demo-btn" href="index-home.html">Home One</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-dropdown has-mega-menu">
                                                <a href="javascript:void(0)">Pages</a>
                                                <ul class="mega-menu mega-menu-grid-4">
                                                    <li>
                                                        <a href="javasript:void(0);" class="mega-menu-title">Category</a>
                                                        <ul>
                                                            <li><a href="politics.html">Politics</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javasript:void(0);" class="mega-menu-title">Pages</a>
                                                        <ul>
                                                            <li><a href="about.html">about</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <div class="bd-megamenu-thumb">
                                                            <img src="{{asset('guest/imgs/blog-page/menu-img.jpg')}}" alt="img">
                                                            <div class="mega-menu-thumb-content">
                                                                <div class="mega-menu-thumb-btn">
                                                                    <a class="bd-demo-btn" href="blog-details.html">View More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            {{-- <li class="element_mega_menu">
                                                <a href="javascript:void(0)">elements</a>
                                                <ul class="sub-menu element_sub_menu">
                                                    <li><a href="elements-blog.html">Blog</a></li>
                                                </ul>
                                            </li> --}}
                                            <li>
                                                <a href="contact.html">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="header__right">
                            <div class="header__action d-flex align-items-center">
                                <div class="header__btn-wrap d-none d-sm-inline-flex">
                                    <a class="bd-btn-primary" href="{{url('register')}}" target="_blank">Download Now<span><i class="fa-regular fa-arrow-right"></i></span></a>
                                </div>
                                <div class="header__hamburger ml-20 d-lg-none">
                                    <div class="sidebar__toggle">
                                        <div class="bars_icon">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- for wp -->
                                <div class="header__hamburger ml-20 d-none">
                                    <button type="button" class="hamburger-btn offcanvas-open-btn">
                                        <span>01</span>
                                        <span>01</span>
                                        <span>01</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header area end -->

    <div id="wp-content">
        @yield('welcome-connect')
    </div>


    <!-- Footer area start -->
    <footer class="landing-footer">
        <div class="landing-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-inner text-center">
                            <h2 class="title">Contribute this web with your Post Right Now</h2>
                            <p class="description">Providing more post to make the book website become more various and popular !!!</p>
                            <a class="purchase-btn2" href="{{url('register')}}" target="_blank"> Join Now<i class="fa-regular fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-landing">
            <div class="inner text-center">
                <p class="description">2024 <a href="#">Greenwich</a> BookWeb</p>
            </div>
        </div>
    </footer>
    <!-- Footer area end -->

    <!-- JS here -->
    <script src="{{asset('guest/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('guest/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('guest/js/plugins/meanmenu.min.js')}}"></script>
    <script src="{{asset('guest/js/plugins/swiper.min.js')}}"></script>
    <script src="{{asset('guest/js/plugins/wow.js')}}"></script>
    <script src="{{asset('guest/js/vendor/magnific-popup.min.js')}}"></script>
    <script src="{{asset('guest/js/vendor/ajax-form.js')}}"></script>
    <script src="{{asset('guest/js/main.js')}}"></script>

</body>
</html>



