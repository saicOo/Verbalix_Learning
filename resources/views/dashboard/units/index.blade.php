@extends('dashboard.layouts.app')

@section('content')
    <main id="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a> <span><i
                                    class="cps cp-caret-right"></i></span></li>
                        <li class="breadcrumb-item active">Units</li>
                    </ol>
                </nav>
                <!-- start heading -->
                <div class="row justify-content-between mb-3">
                    <div class="col-12 ">
                        <h2 class="page-heading">List Units</h2>
                        <p class="mb-0">Count Units : {{ $units->total() }}</p>
                    </div>
                </div>
                <!-- end heading -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#createModal">Create</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Level</th>
                                                <th scope="col">Semester</th>
                                                <th scope="col">Comments</th>
                                                <th scope="col">Questions</th>
                                                <th scope="col">Active Quiz</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($units as $index => $unit)
                                                    <tr>
                                                        <th scope="row">{{ $index + 1 }}</th>
                                                        <td>{{ $unit->name }}</td>
                                                        <td>{{ $unit->level->name }}</td>
                                                        <td>{{ $unit->semester }}</td>
                                                        <td>
                                                            <a
                                                                href="{{ route('dashboard.units.comments.index', $unit->id) }}">
                                                                <i class="ml-2 fas fa-external-link-alt"></i>
                                                                @if ($unit->comments->sum('read') != 0)
                                                                    <span class="badge badge-pill badge-success mr-2">New
                                                                        {{ $unit->comments->sum('read') }}</span>
                                                                @endif
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('dashboard.units.questions.index', $unit->id) }}">
                                                                <i class="ml-2 fas fa-external-link-alt"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('dashboard.units.update', $unit->id) }}"
                                                                method="post" id="active-form-{{ $unit->id }}">
                                                                @csrf
                                                                {{ method_field('put') }}
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        name="active_quiz" id="stasus-{{ $unit->id }}"
                                                                        {{ $unit->active_quiz == 1 ? 'checked' : '' }}
                                                                        onclick="document.getElementById('active-form-{{ $unit->id }}').submit();">
                                                                    <label class="custom-control-label"
                                                                        for="stasus-{{ $unit->id }}">{{ $unit->active_quiz == 1 ? 'Active' : 'Inactive' }}</label>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void()"
                                                                onclick="event.preventDefault();
                            document.getElementById('delete-form-{{ $unit->id }}').submit();"
                                                                class="text-danger"><i class="fas fa-trash"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('dashboard.units.destroy', $unit->id) }}"
                                                                id="delete-form-{{ $unit->id }}" method="post"
                                                                style="display: inline-block">
                                                                @csrf
                                                                {{ method_field('delete') }}
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
@push('modal')
    <!-- start modal create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.units.store') }}" method="post" id="create-form" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="level">Level select</label>
                            <select class="form-control" id="level" name="level_id">
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester select</label>
                            <select class="form-control" id="semester" name="semester">
                                <option value="Semester 1">Semester 1</option>
                                <option value="Semester 2">Semester 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Select Unit Name</label>
                            <select class="form-control" id="name" name="name">
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ 'Unit ' . $i }}">Unit {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="imageUpload">Image Upload</label>
                            <input type="file" class="form-control-file" id="imageUpload" name="image"
                                accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="pdfUpload">PDF Upload</label>
                            <input type="file" class="form-control-file" id="pdfUpload" name="attached"
                                accept="application/pdf">
                        </div>
                        <div class="form-group">
                            <label for="videoUpload">Video Upload</label>
                            <input type="file" class="form-control-file" id="videoUpload" name="video"
                                accept="video/mp4,video/x-m4v,video/*">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="event.preventDefault();
      document.getElementById('create-form').submit();">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal create -->
@endpush
