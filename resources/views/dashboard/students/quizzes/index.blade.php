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
                        <li class="breadcrumb-item active">Quizzes</li>
                    </ol>
                </nav>
                <!-- start heading -->
                <div class="row justify-content-between mb-3">
                    <div class="col-12 ">
                        <h2 class="page-heading">List Quizzes</h2>
                        <p class="mb-0">Count Quizzes : {{ $student->quizzes->count() }}</p>
                    </div>
                </div>
                <!-- end heading -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Level</th>
                                                <th scope="col">Unit</th>
                                                <th scope="col">Right Grade</th>
                                                <th scope="col">Total Grade</th>
                                                <th scope="col">Revision</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student->quizzes as $index => $quiz)
                                                @if (auth()->user()->level_id === $quiz->unit->level->id)
                                                    <tr>
                                                        <th scope="row">{{ $index + 1 }}</th>
                                                        <td>{{ $quiz->unit->level->name }}</td>
                                                        <td>{{ $quiz->unit->name }}</td>
                                                        <td>{{ $quiz->questions->sum('pivot.marks') }} Mark</td>
                                                        <td>{{ $quiz->questions->sum('marks') }} Mark</td>
                                                        <td>
                                                            <a href="{{ route('dashboard.quizzes.show', $quiz->id) }}">
                                                                <i class="ml-2 fas fa-external-link-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table><!-- table./ -->
                                </div>
                            </div>
                        </div><!-- card./ -->
                    </div><!-- col./ -->
                </div><!-- row./ -->
            </div>
        </section>
    </main>
@endsection
