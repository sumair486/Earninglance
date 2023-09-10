@extends('layouts.main')


@section('main-section')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Payment Method</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Payment Method
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
                    <h2>Edit Payment Method</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('paymentmethods.index') }}"> Back</a>
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
    
    
        <form action="{{ route('paymentmethods.update',$paymentmethod->id) }}" method="POST">
          @csrf
          @method('PUT')
  
  
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$paymentmethod->name}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Account Name:</strong>
                    <input type="text" name="account_name" value="{{$paymentmethod->account_name}}" class="form-control" placeholder="Account Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Account Number:</strong>
                    <input type="number" name="account_number" value="{{$paymentmethod->account_number}}" class="form-control" placeholder="Account Number">
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