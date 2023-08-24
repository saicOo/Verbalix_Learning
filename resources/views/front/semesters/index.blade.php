@extends('front.layouts.app')

@section('content')
    <main id="content">
        <!-- start banner -->
        <section class="banner">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase">Semesters</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item"><a href="{{ route('levels.index') }}">Levels</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item active">Semesters</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner./ -->
        <!-- Start Semesters -->
        <section id="semesters" class="semesters text-center my-5">
            <div class="container">
                <div class="heading my-5">
                    <h1>Our Semesters</h1>
                </div>
                <div class="row ">
                    <div class="col-md-6 ">
                        <div class="card-semester">
                            <h3>Semester 1</h3>
                            <a href="{{ route('units.index', ['level_id' => $level_id, 'semester' => 'Semester 1']) }}"><img
                                    src="{{ asset('assets/front/image/Graphic.png') }}"></a>
                            <a href="{{ route('units.index', ['level_id' => $level_id, 'semester' => 'Semester 1']) }}"
                                class="btn btn-info">Go To Contents</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-semester">
                            <h3>Semester 2</h3>
                            <a href="{{ route('units.index', ['level_id' => $level_id, 'semester' => 'Semester 2']) }}"><img
                                    src="{{ asset('assets/front/image/OBJECTS.png') }}"></a>
                            <a href="{{ route('units.index', ['level_id' => $level_id, 'semester' => 'Semester 2']) }}"
                                class="btn btn-info">Go To Contents</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Semesters./-->
    </main>
@endsection
