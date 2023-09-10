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
                    <h2>Payment Method</h2>
                </div>
                <div class="pull-right">
                    @can('paymentmethod-create')
                    <a class="btn btn-success" href="{{ route('paymentmethods.create') }}"> Create New Payment Method</a>
                    @endcan
                </div>
            </div>
        </div>
    
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    
        <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Account Name</th>
                <th>Account Numer</th>
               
                

                <th width="280px">Action</th>
            </tr>
            @foreach ($paymentmethods as $paymentmethod)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $paymentmethod->name }}</td>
                <td>{{ $paymentmethod->account_name }}</td>
                <td>{{ $paymentmethod->account_number }}</td>
              

                <td>
                    <form action="{{ route('paymentmethods.destroy',$paymentmethod->id) }}" method="POST">
                        {{-- <a class="btn btn-info" href="{{ route('plans.show',$plan->id) }}">Show</a> --}}
                        @can('paymentmethod-edit')
                        <a class="text-primary" href="{{ route('paymentmethods.edit',$paymentmethod->id) }}"><i  class="fa fa-edit"></i></a>
                        @endcan
    
    
                        @csrf
                        @method('DELETE')
                        @can('paymentmethod-delete')
                        <button type="submit" style="border: none"><i class="fa fa-trash text-danger"></i></button>

                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    
    
        {!! $paymentmethods->links() !!}

            {{-- end --}}





      </div>

    </div>

@endsection