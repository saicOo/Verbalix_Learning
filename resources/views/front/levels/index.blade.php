@extends('front.layouts.app')

@section('content')
    <main id="content">
        <!-- start banner -->
        <section class="banner">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase">Levels</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item active">Levels</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner./ -->
        <!-- Start Levels -->
        <section id="levels" class="levels">
            <div class="container">
                <div class="heading my-5">
                    <h1>Our Levels</h1>
                </div>
                <div class="row">
                    @foreach ($levels as $index => $level)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 my-5">
                            <div class="card">
                                <img src="{{ asset('assets/front/image/grade'.++$index.'.jpg') }}" class="card-img-top">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $level->name }}</h4>
                                    <a href="{{ route('semesters.index', ['level_id' => $level->id]) }}"
                                        class="btn btn-info">Get Started</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--End Levels./-->
    </main>
@endsection
