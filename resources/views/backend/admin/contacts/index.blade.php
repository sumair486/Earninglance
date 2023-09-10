@extends('layouts.main')


@section('main-section')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Contact</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                Contact
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
                    <h2>Contact Us</h2>
                </div>
                {{-- <div class="pull-right">
                    @can('paymentmethod-create')
                    <a class="btn btn-success" href="{{ route('paymentmethods.create') }}"> Create New Payment Method</a>
                    @endcan
                </div> --}}
            </div>
        </div>
    
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        {{-- <input type="text" name="item_id" value="{{ $itemId->id }}">
        <input type="text" name="price"> --}}
    
        <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Message</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->surname}}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>

              

                <td>
                    <form action="{{ route('contact.destroy',$contact->id) }}" method="POST">
                        {{-- <a class="btn btn-info" href="{{ route('plans.show',$plan->id) }}">Show</a> --}}
                        {{-- @can('paymentmethod-edit')
                        <a class="btn btn-primary" href="{{ route('paymentmethods.edit',$paymentmethod->id) }}">Edit</a>
                        @endcan --}}
    
    
                        @csrf
                        @method('DELETE')
                        @can('contact-delete')
                        <button type="submit" style="border: none"><i class="fa fa-trash text-danger"></i></button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    
    
        {!! $contacts->links() !!}

            {{-- end --}}





      </div>

    </div>

@endsection