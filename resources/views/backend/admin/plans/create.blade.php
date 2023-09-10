@extends('layouts.main')


@section('main-section')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Plans</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Plans
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- Sales Cards  -->
      <!-- ============================================================== -->
      <div class="row">

        {{-- start --}}

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Plans</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('plans.index') }}"> Back</a>
                </div>
            </div>
        </div>
    
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
    
        <form action="{{ route('plans.store') }}" method="POST">
            @csrf
    
    
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <strong>Name:</strong>
                      <input type="text" name="name" class="form-control" placeholder="Name">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <strong>Level:</strong>
                      <input type="text" name="level" class="form-control" placeholder="Level">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <strong>Charges:</strong>
                      <input type="text" name="charges" class="form-control" placeholder="Charges">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <strong>Direct:</strong>
                      <input type="text" name="direct" class="form-control" placeholder="Direct">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <strong>Indirect:</strong>
                      <input type="text" name="indirect" class="form-control" placeholder="Indirect">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <strong>Bonus:</strong>
                      <input type="text" name="bonus" class="form-control" placeholder="Bonus">
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <strong>Features:</strong>
                      <textarea class="form-control" style="height:150px" name="features" placeholder="Features"></textarea>
                  </div>
              </div>
              <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
    
    
        </form>
    

           {{-- end --}}





      </div>

    </div>

@endsection