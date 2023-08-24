@extends('front.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/front/css/chat-popup.css') }}">
@endpush
@section('content')
    <main id="content">
        <!-- start banner -->
        <section class="banner">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase">{{ $unit->name }}</h1>
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
                                <li class="breadcrumb-item active">{{ $unit->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner./ -->

        <!-- Start subjects -->
        <section id="subjects" class="subjects">
            <div class="container">
                <div class="heading my-5">
                    <h1>{{ $unit->name }}</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <video width="100%" controls>
                            <source src="{{ asset('assets/uploads') . '/' . $unit->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-12 my-3">
                        <div class="card">
                            <div class="card-header">
                                Unit Details
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="float-left font-weight-bold">Name: </span><span
                                        class="float-right">{{ $unit->name }}</span></li>
                                <li class="list-group-item"><span class="float-left font-weight-bold">Description:
                                    </span><span class="float-right">{{ $unit->description }}</span></li>
                                <li class="list-group-item"><span class="float-left font-weight-bold">PDF:
                                    </span><span class="float-right">
                                        <a href="{{ route('units.download', $unit->id) }}"
                                            class="btn btn-warning">Download</a>
                                        <button type="button" class="btn btn-info" id="show-pdf">Show</button>
                                    </span>
                                    <div class="clearfix"></div>
                                    {{-- <br> --}}
                                    <div id="obj-pdf" class="mt-2 w-100" style="display: none">
                                        <object data="{{ asset('assets/uploads') . '/' . $unit->attached }}"
                                            type="application/pdf" width="100%" height="500px">
                                            <p>Unable to display PDF file. <a
                                                    href="{{ asset('assets/uploads') . '/' . $unit->attached }}">Download</a>
                                                instead.</p>
                                        </object>
                                    </div>
                                </li>
                                <li class="list-group-item"><span class="float-left font-weight-bold">Quiz: </span><span
                                        class="float-right"><a href="{{ route('units.quizzes.index', $unit->id) }}"
                                            class="btn btn-primary {{ $unit->active_quiz == 0 ? 'disabled' : '' }}">Start
                                            Quiz</a></span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- start comment area -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Comments
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        @foreach ($unit->comments->whereNull('comment_id') as $comment)
                                            <!-- card comment -->
                                            <div class="card  my-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="{{ asset('assets/front/image/user.jpg') }}"
                                                                class="img img-rounded img-fluid" />
                                                            <p class="text-secondary text-center">
                                                                {{ $comment->created_at }}</p>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <p>
                                                                <a class="float-left" href="#">
                                                                    @if ($comment->user)
                                                                        <strong>{{ $comment->user->name }}</strong>
                                                                        <small>{{ $comment->user->role }}</small>
                                                                    @endif
                                                                </a>
                                                            </p>
                                                            <div class="clearfix"></div>
                                                            <p>{{ $comment->body }}</p>
                                                            <p>
                                                                @if (auth()->user()->id == $comment->user_id)
                                                                    <form
                                                                        action="{{ route('comments.destroy', $comment->id) }}"
                                                                        method="POST"
                                                                        id="commentDelete{{ $comment->id }}"
                                                                        style="display: none">@csrf
                                                                        {{ method_field('delete') }}</form>
                                                                    <button class="float-right btn btn-outline-danger ml-2"
                                                                        form="commentDelete{{ $comment->id }}"> <i
                                                                            class="fa fa-trash"></i></button>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    @foreach ($comment->comments as $sub_comment)
                                                        <!-- card sub comment -->
                                                        <div class="card card-inner my-2">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <img src="{{ asset('assets/front/image/user.jpg') }}"
                                                                            class="img img-rounded img-fluid" />
                                                                        <p class="text-secondary text-center">
                                                                            {{ $sub_comment->created_at }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <p>
                                                                            <a class="float-left" href="#">
                                                                                @if ($sub_comment->user)
                                                                                    <strong>{{ $sub_comment->user->name }}</strong>
                                                                                    <small>{{ $sub_comment->user->role }}</small>
                                                                                @else
                                                                                    <strong>{{ $sub_comment->admin->name }}</strong>
                                                                                    <small>{{ $sub_comment->admin->role }}</small>
                                                                                @endif
                                                                            </a>
                                                                        </p>
                                                                        <div class="clearfix"></div>
                                                                        <p>{{ $sub_comment->body }}</p>
                                                                        <p>
                                                                            @if (auth()->user()->id == $sub_comment->user_id)
                                                                                <form
                                                                                    action="{{ route('comments.destroy', $sub_comment->id) }}"
                                                                                    method="POST"
                                                                                    id="commentDelete{{ $sub_comment->id }}"
                                                                                    style="display: none">
                                                                                    @csrf
                                                                                    {{ method_field('delete') }}</form>
                                                                                <button
                                                                                    class="float-right btn btn-outline-danger ml-2"
                                                                                    form="commentDelete{{ $sub_comment->id }}">
                                                                                    <i class="fa fa-trash"></i></button>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- card sub comment./ -->
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- card comment./ -->
                                        @endforeach
                                    </div>
                                </div>
                                <br>
                                <form action="{{ route('units.comments.store', $unit->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="comment">Send Comment</label>
                                        <textarea class="form-control" id="comment" rows="3" name="body"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End subjects./-->
    </main>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#show-pdf").click(function() {
                $("#obj-pdf").toggle(500);
            });
        });
    </script>
@endpush
