@extends('dashboard.layouts.app')

@section('content')
<main id="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 bg-transparent">
            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Dashboard</a> <span><i
                  class="cps cp-caret-right"></i></span></li>
            <li class="breadcrumb-item active">Levels</li>
          </ol>
        </nav>
        <!-- start heading -->
        <div class="row justify-content-between mb-3">
          <div class="col-12 ">
            <h2 class="page-heading">List Levels</h2>
            <p class="mb-0">Count Levels : {{ $levels->count() }}</p>
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
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $index =>$level)
                        <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$level->name}}</td>
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

