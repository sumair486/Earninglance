@extends('layouts.main')


@section('main-section')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Withdraw Method List</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Withdraw Method List
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
                    <h2>Withdraw Method List</h2>
                </div>
                <div class="pull-right">
                    {{-- @can('withdraw-method-create') --}}
                    <a class="btn btn-success" href="{{ route('withdraw.form') }}"> Create New withdraw method</a>
                    {{-- @endcan --}}
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
                <th>Action</th>
            </tr>
            @foreach ($withdraw_method as $key=>$withdraw_methods)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $withdraw_methods->name }}</td>
              

                <td>
                    <form action="{{ route('withdraw.delete',$withdraw_methods->id) }}" method="POST">
                        {{-- <a class="btn btn-info" href="{{ route('plans.show',$plan->id) }}">Show</a> --}}
                       
    
    
                        @csrf
                        @method('DELETE')
                        {{-- @can('withdraw-method-delete') --}}
                        <button type="submit" style="border: none"><i class="fa fa-trash text-danger"></i></button>

                        {{-- @endcan --}}
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    
    
        <p>{!! $withdraw_method->links() !!}</p>

            {{-- end --}}





      </div>

    </div>

@endsection