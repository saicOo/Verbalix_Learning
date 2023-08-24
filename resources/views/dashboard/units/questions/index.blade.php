@extends('dashboard.layouts.app')

@section('content')
    <main id="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a> <span><i
                                    class="cps cp-caret-right"></i></span></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.units.index') }}">Units</a> <span><i
                                    class="cps cp-caret-right"></i></span></li>
                        <li class="breadcrumb-item active">Questions</li>
                    </ol>
                </nav>
                <!-- start heading -->
                <div class="row justify-content-between mb-3">
                    <div class="col-12 ">
                        <h2 class="page-heading">List Questions</h2>
                        <p class="mb-0">Count Questions : {{ $unit->questions->count() }}</p>
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
                                                <th scope="col">Question Title</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Options</th>
                                                <th scope="col">Answer</th>
                                                <th scope="col">Marks</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($unit->questions as $index => $question)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ $question->title }}</td>
                                                    <td>{{ $question->type_question }}</td>
                                                    <td>
                                                        @forelse ($question->options as $option)
                                                            {{ $option->title }} ,
                                                        @empty
                                                            Null
                                                        @endforelse
                                                    </td>
                                                    <td>
                                                        @if ($question->answer_option)
                                                            {{ $question->options[$question->answer_option - 1]->title }}
                                                        @else
                                                            Null
                                                        @endif
                                                    </td>
                                                    <td>{{ $question->marks }} Mark</td>
                                                    <td>
                                                        <a href="javascript:void()"
                                                            onclick="event.preventDefault();
                                document.getElementById('delete-form-{{ $question->id }}').submit();"
                                                            class="text-danger"><i class="fas fa-trash"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('dashboard.questions.destroy', $question->id) }}"
                                                            id="delete-form-{{ $question->id }}" method="post"
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
                    <h5 class="modal-title" id="createModalLabel">Create Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.units.questions.store', $unit->id) }}" method="post"
                        id="create-form" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="title">Question Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="marks">Add Marks</label>
                            <input type="number" class="form-control" name="marks" id="marks">
                        </div>
                        <div class="form-group">
                            <label for="questionType">Question Type</label>
                            <select class="form-control" id="questionType" name="type">
                                <option selected disabled>Selecet Question Type</option>
                                <option value="1">True & False</option>
                                <option value="2">Multiple Choice</option>
                            </select>
                        </div>
                        <div id="options-box">

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
@push('js')
    <script>
        $(document).on("change", "#questionType", function() {
            console.log($(this).val());
            selector = $(this).val();
            switch (selector) {
                case '1': // if select true & false
                    $('#options-box').html(`<div class="form-group">
                                <label for="answer">Select Answer</label>
                                <select name="answer_option" class="form-control" id="answer">
                                    <option value="1">option true</option>
                                    <option value="2">option false</option>
                                </select>
                                <input type="hidden" name="options[]" value="True">
                                <input type="hidden" name="options[]" value="False">
                            </div>`)
                    break;
                case '2':
                    $('#options-box').html(`<div class="form-group">
                                <label for="answer">Select Option</label>
                                <select name="answer_option" class="form-control" id="answer">
                                    <option value="1">option 1</option>
                                    <option value="2">option 2</option>
                                    <option value="3">option 3</option>
                                    <option value="4">option 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="option1">option 1</label>
                                <input type="text" class="form-control" id="option1" name="options[]">
                            </div>
                            <div class="form-group">
                                <label for="option2">option 2</label>
                                <input type="text" class="form-control" id="option2" name="options[]">
                            </div>
                            <div class="form-group">
                                <label for="option3">option 3</label>
                                <input type="text" class="form-control" id="option3" name="options[]">
                            </div>
                            <div class="form-group">
                                <label for="option4">option 4</label>
                                <input type="text" class="form-control" id="option4" name="options[]">
                            </div>`)
                    break;

                default:
                    $('#options-box').html('')
                    break;
            }

        });
    </script>
@endpush
