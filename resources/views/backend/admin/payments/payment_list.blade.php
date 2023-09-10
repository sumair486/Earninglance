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

        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>User Name</th>
                    <th>Plan</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>view</th>
                    {{-- <th>Status</th> --}}
                    <th width="280px">Approve/Delete</th>
                </tr>
                @foreach ($payment as $key=>$payments)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $payments->user->username }}</td>
                    <td>{{ $payments->plan->name }}</td>
                    <td>{{ $payments->method->name }}</td>
                    <td>{{ $payments->amount }}</td>
                   
                    <td>
                        <form action="{{ route('payment.delete',$payments->id) }}" method="POST">
                            <a  data-bs-toggle="modal" data-bs-target="#imageModal{{ $payments->id }}" class="text-info" href=""><i class="fa fa-eye"></i></a>
                           {{-- image --}}
<!-- Modal -->
<div class="modal fade" id="imageModal{{ $payments->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageModalLabel">Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Image to display -->
          <img width="100%" src="payment/{{$payments->image}}" alt="Image">
        </div>
      </div>
    </div>
  </div>
  
                           {{-- image --}}
        
        
                           
                        {{-- </form> --}}
                    </td>


                    <td>
                      @if($payments->status==0)
                      <a href="{{ route('payment.approved',$payments->id) }}"><i class="fa fa-check text-success"></i></a>
                      @endif

                      @csrf
                      @method('DELETE')
                      @can('user-delete')
                      <button type="submit" style="border: none"><i class="fa fa-trash text-danger"></i></button>

                      @endcan

                    </form>

                    </td>

                    {{-- @endif --}}
                    
                </tr>
                @endforeach
            </table>
            </div>

         {{-- end --}}





</div>

</div>

@endsection