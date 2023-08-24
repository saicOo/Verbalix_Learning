@extends('dashboard.layouts.app')

@section('content')
<main id="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 bg-transparent">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
        <!-- start heading -->
        <div class="row justify-content-between mb-3">
          <div class="col-12 ">
            <h2 class="page-heading">Welcome</h2>
            <p class="mb-0">Welcome to the online learning dashboard</p>
          </div>
        </div>
        <!-- end heading./ -->
        <div class="row">
          <div class="col-md-3">
            <div class="card border-info mx-sm-1 my-3 p-3">
              <div class="card border-info shadow text-info p-3 my-card"><span class="fas fa-school"
                  aria-hidden="true"></span></div>
              <div class="text-info text-center mt-3">
                <h4>Levels</h4>
              </div>
              <div class="text-info text-center mt-2">
                <h1>{{$levelsCount}}</h1>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-success mx-sm-1 my-3 p-3">
              <div class="card border-success shadow text-success p-3 my-card"><span class="fas fa-book-open"
                  aria-hidden="true"></span></div>
              <div class="text-success text-center mt-3">
                <h4>Units</h4>
              </div>
              <div class="text-success text-center mt-2">
                <h1>{{$unitsCount}}</h1>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-danger mx-sm-1 my-3 p-3">
              <div class="card border-danger shadow text-danger p-3 my-card"><span class="fas fa-user-graduate"
                  aria-hidden="true"></span></div>
              <div class="text-danger text-center mt-3">
                <h4>Students</h4>
              </div>
              <div class="text-danger text-center mt-2">
                <h1>{{$studentsCount}}</h1>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-warning mx-sm-1 my-3 p-3">
              <div class="card border-warning shadow text-warning p-3 my-card"><span class="fas fa-user-secret"
                  aria-hidden="true"></span></div>
              <div class="text-warning text-center mt-3">
                <h4>Admins</h4>
              </div>
              <div class="text-warning text-center mt-2">
                <h1>{{$adminsCount}}</h1>
              </div>
            </div>
          </div>
        </div><!-- row./ -->
      </div>
    </section>
  </main>
@endsection
