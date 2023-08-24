@extends('front.layouts.app')

@section('content')
    <main id="content">
        <!-- start banner -->
        <section class="banner">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase">Units</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item"><a href="{{ route('levels.index') }}">Levels</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('semesters.index', ['level_id' => request()->level_id]) }}">Semesters</a>
                                    <span><i class="cps cp-caret-right"></i></span>
                                </li>
                                <li class="breadcrumb-item active">Units</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner./ -->

        <!-- Start Units -->
        <section id="units" class="units">
            <div class="container">
                <div class="heading my-5">
                    <h1>Our Units</h1>
                </div>
                <div class="row">
                    @foreach ($units as $unit)
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('assets/uploads') . '/' . $unit->image }}" class="card-img-top">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $unit->name }}</h4>
                                    <p class="card-text"> <strong>who am i !</strong> </p>
                                    <a href="{{ route('units.show', $unit->id) }}" class="btn btn-info">Book Here</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--End Units./-->
    </main>
@endsection
