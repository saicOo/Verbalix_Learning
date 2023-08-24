@extends('dashboard.layouts.app')

@section('content')
    <main id="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Dashboard</a> <span><i
                                    class="cps cp-caret-right"></i></span></li>
                        <li class="breadcrumb-item"><a href="{{route('dashboard.units.index')}}">Units</a> <span><i
                                    class="cps cp-caret-right"></i></span></li>
                        <li class="breadcrumb-item active">Comment</li>
                    </ol>
                </nav>
                <!-- start heading -->
                <div class="row justify-content-between mb-3">
                    <div class="col-12 ">
                        <h2 class="page-heading">List Comment</h2>
                        <p class="mb-0">Count Comment : {{ $unit->comments->count() }}</p>
                    </div>
                </div>
                <!-- end heading -->
                <div class="row">
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
                                                                    @else
                                                                        <strong>{{ $comment->admin->name }}</strong>
                                                                        <small>{{ $comment->admin->role }}</small>
                                                                    @endif
                                                                </a>
                                                            </p>
                                                            <div class="clearfix"></div>
                                                            <p>{{ $comment->body }}</p>
                                                            <p>
                                                                @if (auth()->user()->id == $comment->admin_id)
                                                                    <form
                                                                        action="{{ route('dashboard.comments.destroy', $comment->id) }}"
                                                                        method="POST" id="commentDelete{{ $comment->id }}"
                                                                        style="display: none">{{ csrf_field() }}
                                                                        {{ method_field('delete') }}</form>
                                                                    <button class="float-right btn btn-outline-danger ml-2"
                                                                        form="commentDelete{{ $comment->id }}"> <i
                                                                            class="fa fa-trash"></i></button>
                                                                @endif
                                                                <a class="float-right btn btn-outline-primary ml-2 replay-comment"
                                                                    data-replay="{{ $comment->id }}"> <i
                                                                        class="fa fa-reply"></i> Reply</a>
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
                                                                            @if (auth()->user()->id == $sub_comment->admin_id)
                                                                                <form
                                                                                    action="{{ route('dashboard.comments.destroy', $sub_comment->id) }}"
                                                                                    method="POST"
                                                                                    id="commentDelete{{ $sub_comment->id }}"
                                                                                    style="display: none">{{ csrf_field() }}
                                                                                    {{ method_field('delete') }}</form>
                                                                                <button class="float-right btn btn-outline-danger ml-2"
                                                                                    form="commentDelete{{ $sub_comment->id }}"> <i
                                                                                        class="fa fa-trash"></i></button>
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
                                <form action="{{ route('dashboard.units.comments.store', $unit->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="comment_id" value="" id="input-replay">
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
                    </div><!-- col./ -->
                </div><!-- row./ -->
            </div>
        </section>
    </main>
@endsection
@push('js')
    <script src="{{ asset('js/comment.js') }}"></script>
@endpush
