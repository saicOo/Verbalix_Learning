@extends('front.layouts.app')

@section('content')
    <main id="content">
        <!-- start banner -->
        <section class="banner">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase">Profile</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> <span><i
                                            class="cps cp-caret-right"></i></span></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner./ -->
        <!-- Start Profile -->
        <section id="profile" class="profile">
            <div class="container">
                <div class="heading my-5">
                    <h1>Profile</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="image-profile text-center">
                                    <img src="{{ asset('assets/front/image/user.jpg') }}" alt=""
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                </div>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>ID: </th>
                                        <td>{{ auth()->user()->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name: </th>
                                        <td>{{ auth()->user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email: </th>
                                        <td>{{ auth()->user()->email }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div><!-- col./ -->
                </div><!-- row./ -->
            </div>
        </section>
        <!--End Profile./-->
    </main>
@endsection
