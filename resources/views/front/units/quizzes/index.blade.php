@extends('front.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/front/css/manage-audio.css') }}">
@endpush
@section('content')
    <main id="content">
        <!-- start banner -->
        <section class="banner">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase">quizzes</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item"><a href="{{ route('levels.index') }}">Levels</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('semesters.index', ['level_id' => $unit->level->id]) }}">Semesters</a>
                                    <span><i class="cps cp-caret-right"></i></span>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('units.index', ['level_id' => $unit->level->id, 'semester' => $unit->semester]) }}">Units</a>
                                    <span><i class="cps cp-caret-right"></i></span>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('units.show', $unit->id) }}">{{ $unit->name }}</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item active">quizzes</li>
                            </ol>
                        </nav>
                    </div><!-- col./ -->
                </div><!-- row./ -->
            </div><!-- container./ -->
        </section>
        <!-- end banner./ -->

        <!-- Start quizzes -->
        <section id="quizzes" class="quizzes">
            <div class="container">
                <div class="heading my-5">
                    <h1>quizzes</h1>
                </div>
                <form action="{{ route('units.quizzes.store', $unit->id) }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card my-3">
                                <div class="card-header">{{ $unit->name }}</div>
                                <div class="card-body">
                                    @foreach ($unit->questions as $question)
                                            <h5 class="card-title text-center">{{ $question->title }}</h5>
                                            <div class="options-box">
                                                @foreach ($question->options as $option)
                                                    <div class="form-check">
                                                        <label class="options" for="option{{ $option->id }}">
                                                            {{ $option->title }}
                                                            <input class="form-check-input" type="radio"
                                                                name="option[{{ $question->id }}]val[]"
                                                                id="option{{ $option->id }}"
                                                                value="{{ $option->id }}">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                    @endforeach
                                </div>
                            </div><!-- card./ -->
                        </div><!-- col./ -->
                    </div><!-- row./ -->
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div><!-- col./ -->
                    </div><!-- row./ -->
                </form>
            </div>
        </section>
        <!--End quizzes./-->
    </main>
@endsection
