@extends('layouts.main')


@section('main-section')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Payment</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                Payment
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

        <div class="container mt-5">
            <div class="row justify-content-center">
                <h1 class="text-center">Complete the Payment</h1>
                <h2 class="text-center">Please pay {{ $item->charges }} Rs</h2>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('package.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $item->id }}">
                        <input type="hidden" name="amount" value="{{ $item->charges }}">

                        <div class="form-group">
                            <label for="selectOption">Select Account</label>
                            <select name="method_id" class="form-control" id="selectOption">
                                @foreach ($payment_method as $payment_methods)
                                <option value="{{ $payment_methods->id }}">{{ $payment_methods->name }}</option>
                                    
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="imageUpload">Upload Image</label>
                            <input type="file" name="file" class="form-control-file" id="imageUpload">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

           {{-- end --}}





</div>

</div>

@endsection