@extends('layouts.main')


@section('main-section')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Add Cash</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Add Cash
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
                
                <div class="col-md-6">
                    <form method="POST" action="{{ route('user.cash.save',['user' => $user]) }}">
                        @csrf
                      
                        <div class="form-group">
                            <label for="selectOption">Add Cash</label>
                            <input type="number" placeholder="Add Cash" name="balance" class="form-control">
                    
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