@extends('layouts.main')


@section('main-section')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Roles</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Roles
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
                    <h2>Role Management</h2>
                </div>
                <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
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
             <th width="280px">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a style="margin-right: 5px" class="text-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                    @can('role-edit')
                        <a class="text-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('role-delete')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'text-danger', 'style' => 'border:none;']) !!}
                    {!! Form::close() !!}
                @endcan
                
                </td>
            </tr>
            @endforeach
        </table>
        </div>
        
        
        {!! $roles->render() !!}
        
        

              {{-- end --}}





      </div>

    </div>

@endsection