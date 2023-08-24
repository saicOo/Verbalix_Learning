@extends('front.layouts.app')

@section('content')
    <main id="content">
        <!-- start banner -->
        <section class="banner">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase">Show Grades</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item"><a href="{{route('grades.index')}}">Grades</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item active">Show Grades</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner./ -->
        <!-- Start Show Grades -->
        <section id="showGrades" class="showGrades">
            <div class="container">
                <div class="heading my-5">
                    <h1>Show Grades</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">Subject Name: Unit 1</h5>
                            <div class="card-body">
                                <h6>Result Quiz: {{ $quiz->questions->sum('marks') }} Of {{ $quiz->questions->sum('pivot.marks') }}</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Question Title</th>
                                            <th>Your Answar</th>
                                            <th>Mark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quiz->questions as $question)
                                        <tr>
                                            <td>{{ $question->title }}</td>
                                            <td>{{ $question->pivot->answer }}</td>
                                            <td class="{{ $question->pivot->marks == 0 ? 'text-danger' : 'text-success' }}">{{ $question->pivot->marks }} mark</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- col./ -->
                </div><!-- row./ -->
            </div>
        </section>
        <!--End Show Grades./-->
    </main>
@endsection
