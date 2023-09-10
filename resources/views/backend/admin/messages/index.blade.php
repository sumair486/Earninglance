@extends('layouts.main')


@section('main-section')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Messages</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                Messages
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

        <div class="table-responsive">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
            <table class="table table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Subject</th>
                    <th>Account No</th>
                    <th>Account Title</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Action</th>
                    
                    
                </tr>
                @foreach ($message as $key=>$messages)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $messages->name}}</td>
                    <td>{{ $messages->username}}</td>
                    <td><a href="mailto:{{$messages->email}}">{{$messages->email}}</a></td>
                    <td>{{ $messages->phone}}</td>
                    <td>{{ $messages->subject}}</td>
                    <td>{{ $messages->account_no}}</td>
                    <td>{{ $messages->account_title }}</td>
                    <td>{{ $messages->method }}</td>
                    <td>{{ $messages->amount }}</td>
                   
                    <td>
                        <form action="{{ route('messages.delete',$messages->id) }}" method="POST">

                    


{{--                     
                      @if($withdraw_requests->status==0)
                      <a href="{{ route('withdraw.request.approved',$withdraw_requests->id) }}"><i class="fa fa-check text-success"></i></a>
                      @endif --}}

                      @csrf
                      @method('DELETE')
                      {{-- @can('user-delete') --}}
                      <button type="submit" style="border: none"><i class="fa fa-trash text-danger"></i></button>

                      {{-- @endcan --}}

                    </form>

                    </td>

                    {{-- @endif --}}
                    
                </tr>
                @endforeach
            </table>
            </div>

         {{-- end --}}

         {!! $message->links() !!}



</div>

</div>

@endsection