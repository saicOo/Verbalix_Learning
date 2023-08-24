@extends('dashboard.layouts.app')

@section('content')
    <main id="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a> <span><i
                                    class="cps cp-caret-right"></i></span></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.students.index') }}">Students</a> <span><i
                                    class="cps cp-caret-right"></i></span></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('dashboard.students.quizzes.index', $quiz->user_id) }}">Quizzes</a> <span><i
                                    class="cps cp-caret-right"></i></span></li>
                        <li class="breadcrumb-item active">Revision</li>
                    </ol>
                </nav>
                <!-- start heading -->
                <div class="row justify-content-between mb-3">
                    <div class="col-12 ">
                        <h2 class="page-heading">Revision</h2>
                    </div>
                </div>
                <!-- end heading -->
                <div class="row table-responsive">
                    <div class="col-lg-12">
                        <div class="card" style="min-width: 700px">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-2">
                                        <h5>Question Title</h5>
                                    </div><!-- col./ -->
                                    <div class="col-2">
                                        <h5>Type</h5>
                                    </div><!-- col./ -->
                                    <div class="col-2">
                                        <h5>Answer</h5>
                                    </div><!-- col./ -->
                                    <div class="col-2">
                                        <h5>Max Marks</h5>
                                    </div><!-- col./ -->
                                    <div class="col-2">
                                        <h5>Marks</h5>
                                    </div><!-- col./ -->
                                    <div class="col-2">
                                        <h5></h5>
                                    </div><!-- col./ -->
                                </div><!-- row./ -->
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        @foreach ($quiz->questions as $question)
                                            <div class="col-2">
                                                <p>{{ $question->title }}</p>
                                            </div><!-- col./ -->
                                            <div class="col-2">
                                                <p>{{ $question->type_question }}</p>
                                            </div><!-- col./ -->
                                            <div class="col-2">
                                                <p>{{ $question->pivot->answer }}
                                                </p>
                                            </div><!-- col./ -->
                                            <div class="col-2">
                                                <p>{{ $question->marks }}</p>
                                            </div><!-- col./ -->
                                            <div class="col-2">
                                                <p>{{ $question->pivot->marks }}</p>
                                            </div><!-- col./ -->
                                            <div class="col-2">
                                                <p></p>
                                            </div><!-- col./ -->
                                        @endforeach
                                    </div><!-- row./ -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Status : {{$quiz->done == 0 ? 'Wait' : 'Pass'}}</h5>

                                        </div>
                                    </div>
                            </div>
                        </div><!-- card./ -->
                    </div><!-- col./ -->
                </div><!-- row./ -->
            </div>
        </section>
    </main>
@endsection
