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
                    <h2>Plans</h2>
                </div>
                <div class="pull-right">
                    @can('plan-create')
                    <a class="btn btn-success" href="{{ route('plans.create') }}"> Create New Plans</a>
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
                <th>Level</th>
                <th>Charges</th>
                <th>Direct</th>
                <th>Indirect</th>
                <th>Bonus</th>
                <th>Features</th>
                

                <th width="280px">Action</th>
            </tr>
            @foreach ($plans as $plan)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $plan->name }}</td>
                <td>{{ $plan->level }}</td>
                <td>{{ $plan->charges }}</td>
                <td>{{ $plan->direct }}</td>
                <td>{{ $plan->indirect }}</td>
                <td>{{ $plan->bonus }}</td>
                <td>{{ $plan->features }}</td>

                <td>
                    <form action="{{ route('plans.destroy',$plan->id) }}" method="POST">
                        {{-- <a class="btn btn-info" href="{{ route('plans.show',$plan->id) }}">Show</a> --}}
                        @can('plan-edit')
                        <a class="text-primary" href="{{ route('plans.edit',$plan->id) }}"><i class="fa fa-edit"></i></a>
                        @endcan
    
    
                        @csrf
                        @method('DELETE')
                        @can('plan-delete')
                        <button type="submit" style="border: none"><i class="fa fa-trash text-danger"></i></button>

                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    
    
        {!! $plans->links() !!}

            {{-- end --}}





      </div>

    </div>

@endsection