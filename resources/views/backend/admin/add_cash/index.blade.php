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

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>User List</h2>
                </div>
                <div class="pull-right">
                    {{-- @can('withdraw-method-create') --}}
                    {{-- <a class="btn btn-success" href="{{ route('withdraw.form') }}"> Create New withdraw method</a> --}}
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
                <th>Username</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Balance</th>

                <th>Action</th>
            </tr>
            @foreach ($user as $key=>$users)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->username }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->phone }}</td>
                <td>{{ $users->balance }}</td>

                {{-- <td>{{ $users->name }}</td> --}}

              

                <td>
                    <form action="{{ route('user.list.delete',$users->id) }}" method="POST">
                        {{-- @can('plan-edit') --}}
                        <a class="text-success" href="{{ route('user.cash.form',$users->id) }}"><i class="fa fa-check"></i></a>
                        {{-- @endcan --}}
    
    
    
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
    
    
        {!! $user->links() !!}

            {{-- end --}}





      </div>

    </div>

@endsection