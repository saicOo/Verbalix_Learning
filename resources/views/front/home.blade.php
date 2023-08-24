@extends('front.layouts.app')

@section('content')
    <main id="content">
        <!--Start Homepage Slideshow-->
        <div class="slideshow">
            <div class="overlay"></div>
            <div id="slideshow" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/front/image/banner.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Online learning offers</h5>
                            <p>Are you looking to further your education but struggling to find the time to attend
                                traditional
                                classes? Look no further than online learning! With online courses and programs, you can
                                access
                                top-quality education from anywhere with an internet connection, at a time that works for
                                you.</p>
                            <a href="{{ route('levels.index') }}" class="btn btn-outline-info mt-2">Get Started</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/front/image/19-paral.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Online learning offers</h5>
                            <p>Whether you're looking to improve your skills for your current job or embark on a new career
                                path,
                                online learning offers a flexible and convenient way to achieve your goals.</p>
                            <a href="{{ route('levels.index') }}" class="btn btn-outline-info mt-2">Get Started</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/front/image/20-paral.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Online learning offers</h5>
                            <p>Don't let a busy schedule hold you back from achieving your dreams. Enroll in an online
                                course today
                                and take the first step towards a brighter future!.</p>
                            <a href="{{ route('levels.index') }}" class="btn btn-outline-info mt-2">Get Started</a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!--End Homepage Slideshow./-->
        <!-- start section about -->
        <section id="about" class="about text-center">
            <div class="heading">
                <h1>What We Offer </h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 my-4">
                        <img src="{{ asset('assets/front/image/logo-on-learn.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-12">
                        <h5>Our website provides a Full E-learning ecosystem with a free and easy acess to
                            learn <br><strong>Connect</strong>
                            <im>a new <strong>way</strong> of learning </im>
                        </h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section about -->
        <!-- start section counter -->
        <section id="counter" class="counter">
            <div class="heading">
                <h1>ACTIVITY</h1>
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <div class="counter">
                            <i class="fas fa-user-graduate fa-2x"></i>
                            <h2 class="timer count-title count-number">5000</h2>
                            <p class="count-text ">Our Students</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="counter">
                            <i class="fas fa-smile-beam fa-2x"></i>
                            <h2 class="timer count-title count-number">4999</h2>
                            <p class="count-text ">Happy Students</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="counter">
                            <i class="fas fa-book-open fa-2x"></i>
                            <h2 class="timer count-title count-number">2000</h2>
                            <p class="count-text ">Units Complete</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="counter">
                            <i class="fas fa-chalkboard-teacher fa-2x"></i>
                            <h2 class="timer count-title count-number">500</h2>
                            <p class="count-text ">Teachers Support</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- end section counter -->

        <!-- start section gallary -->
        <section id="gallary" class="gallary">

            <div class="heading">
                <h1>Our Photo Gallery</h1>
                <div class="hr"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{ asset('assets/front/image/05-paral.jpg') }}" alt="">
                    </div>
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{ asset('assets/front/image/05-paral.jpg') }}" alt="">
                    </div>
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{ asset('assets/front/image/05-paral.jpg') }}" alt="">
                    </div>
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{ asset('assets/front/image/05-paral.jpg') }}" alt="">
                    </div>
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{ asset('assets/front/image/05-paral.jpg') }}" alt="">
                    </div>
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{ asset('assets/front/image/05-paral.jpg') }}" alt="">
                    </div>
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{ asset('assets/front/image/05-paral.jpg') }}" alt="">
                    </div>
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{ asset('assets/front/image/05-paral.jpg') }}" alt="">
                    </div>
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{ asset('assets/front/image/05-paral.jpg') }}" alt="">
                    </div>
                </div>
        </section>
        <!-- end section gallary -->
    </main>
@endsection
