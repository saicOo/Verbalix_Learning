@extends('front.layouts.app')
@section('content')
    <main id="content">
        <!-- start banner -->
        <section class="banner">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase">Grades</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item active">Grades</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner./ -->
        <!-- Start Grades -->
        <section id="grades" class="grades">
            <div class="container">
                <div class="heading my-5">
                    <h1>Grades</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Grades</h5>
                            </div>
                            <div class="card-body">
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Level</th>
                                                <th scope="col">Unit</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Right Grade</th>
                                                <th scope="col">Total Grade</th>
                                                <th scope="col">Show Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (auth()->user()->quizzes as $index => $quiz)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ $quiz->unit->level->name }}</td>
                                                    <td>{{ $quiz->unit->name }}</td>
                                                    <td>{{ $quiz->status }}</td>
                                                    <td>{{ $quiz->questions->sum('pivot.marks') }} Mark</td>
                                                    <td>{{ $quiz->questions->sum('marks') }} Mark</td>
                                                    <td>
                                                        <a href="{{ route('grades.show', $quiz->id) }}">
                                                            <i class="ml-2 fas fa-external-link-alt"></i>
                                                        </a>
                                                    </td>
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
        <!--End Grades./-->
    </main>
@endsection
@push('js')
    @if (session('done_quiz'))
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.26/sweetalert2.min.css" integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.26/sweetalert2.min.js" integrity="sha512-BIHdMyxdl8bg4QOZYwJUivf6MTa97s/cfN7miqW4DLBIhIDgQ6TFjmWXvtvtBFu/Qrt1LIdGcQ2XqM56Vj1RIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            Swal.fire({
                title: 'Congratulations, you have completed the quiz.',
                width: 600,
                padding: '3em',
                color: '#716add',
                background: '#fff',
                backdrop: `
    rgba(0,0,123,0.4)
    url("https://www.icegif.com/wp-content/uploads/2022/10/icegif-308.gif")
    center top
    no-repeat
  `
            })
        </script>
    @endif
@endpush
