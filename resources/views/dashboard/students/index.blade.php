@extends('dashboard.layouts.app')

@section('content')
    <main id="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Dashboard</a> <span><i
                                    class="cps cp-caret-right"></i></span></li>
                        <li class="breadcrumb-item active">Students</li>
                    </ol>
                </nav>
                <!-- start heading -->
                <div class="row justify-content-between mb-3">
                    <div class="col-12 ">
                        <h2 class="page-heading">List Students</h2>
                        <p class="mb-0">Count Students : {{ $students->total() }}</p>
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Quizzes</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $index => $student)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>
                                                        <a href="{{ route('dashboard.students.quizzes.index', $student->id) }}">
                                                            <strong>{{ $student->quizzes->count() }}</strong>
                                                            <i class="ml-2 fas fa-external-link-alt"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('dashboard.students.update', $student->id) }}"
                                                            method="post" id="enabled-form-{{ $student->id }}">
                                                            @csrf
                                                            {{ method_field('put') }}
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="enabled"
                                                                    id="stasus-{{ $student->id }}"
                                                                    {{ $student->enabled == 1 ? 'checked' : '' }}  onclick="document.getElementById('enabled-form-{{ $student->id }}').submit();">
                                                                <label class="custom-control-label"
                                                                    for="stasus-{{ $student->id }}">{{ $student->enabled == 1 ? 'Enabled' : 'Disabled' }}</label>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
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
