@extends('layouts.main')

@section('main-section')
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
   
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
    
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
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
          {{-- @can('user-list') --}}

          @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
      @endif

          @role('admin')
   
          
          <div class="row">
            
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
            <!-- Column -->
            <div class="col-md-12 col-lg-12 col-xlg-12">
              <div class="card card-hover">
                <div class="box  text-center">
                  <h1 class="font-light text-dark">
                    {{-- <i class="mdi mdi-chart-areaspline"></i> --}}
                   Welcome Admin
                 

                  </h1>
                  {{-- <h3 class="text-success">233</h3> --}}
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xlg-6">
              <div class="card card-hover">
                <div class="box  text-center">
                  <h1 class="font-light text-dark">
                    {{-- <i class="mdi mdi-chart-areaspline"></i> --}}
                    Registered Users
                  </h1>
                  <h3 class="text-success">{{ $count_user }}</h3>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xlg-6">
              <div class="card card-hover">
                <div class="box  text-center">
                  <h1 class="font-light text-dark">
                    {{-- <i class="mdi mdi-collage"></i> --}}
                    Pending Approvals

                  </h1>
                  <h3 class="text-danger">{{ $pending }}</h3>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xlg-6">
              <div class="card card-hover">
                <div class="box  text-center">
                  <h1 class="font-light text-dark">
                    {{-- <i class="mdi mdi-collage"></i> --}}
                    Accepted Approvals

                  </h1>
                  <h3 class="text-success">{{ $accept_approval }}</h3>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xlg-6">
              <div class="card card-hover">
                <div class="box  text-center">
                  <h1 class="font-light text-dark">
                    {{-- <i class="mdi mdi-collage"></i> --}}
                    Total Earnings
                  </h1>
                  <h3 class="text-success">{{ $total }}</h3>
                </div>
              </div>
            </div>
            <!-- Column -->
           
           
          </div>
         

          @else

          {{-- for user --}}

<div class="row">

@foreach ($combinedData as $user)
  
          <div class="col-md-6 col-lg-6 col-xlg-6">
            <div class="card card-hover">
              <div class="box  text-center">
                <h1 class="font-light text-dark">
                  {{-- <i class="mdi mdi-collage"></i> --}}
                  Welcome {{ Auth()->user()->username }}
                  {{-- {{ Auth()->user()->balance }} --}}

                </h1>

                
             
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-xlg-6">
            <div class="card card-hover">
              <div class="box  text-center">
                <h1 class="font-light text-dark">
                  {{-- <i class="mdi mdi-collage"></i> --}}
                
                 Balance

                </h1>
                <h3 class="text-success"> 
                  @if (Auth()->user()->balance >0)
                  {{ Auth()->user()->balance }}<br>
                  <a style="font-size: 12px;border-radius: 15px 15px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    WithDraw
                  </a>

                
                  @else
                    0
                    @endif
                </h3>   
              </div>
            </div>
          </div>

           {{-- withdraw modal --}}

          <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
        
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Enter Information</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
        
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="POST" action="{{ route('withdraw.save') }}">
                          @csrf
                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" class="form-control" id="amount" name="amount">
                            </div>
                            <div class="form-group">
                                <label for="method_id">Withdarw Method:</label>
                                <select class="form-control" id="method_id" name="method_id">
                                  @foreach ($withdraw_method as $withdraw_methods)
                                  <option value="{{ $withdraw_methods->name }}">{{ $withdraw_methods->name }}</option>
                                    
                                  @endforeach
                                </select>
                               
                           
                              </div>
                            <div class="form-group">
                                <label for="account_no">Account Number:</label>
                                <input type="number" class="form-control" id="account_no" name="account_no">
                            </div>
                            <div class="form-group">
                                <label for="account_title">Account Title:</label>
                                <input type="text" class="form-control" id="account_title" name="account_title">
                            </div>
                    </div>
        
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Submit" class="btn btn-primary" id="saveButton"/>
                    </div>
                  </form>

                </div>
            </div>
        </div>

              {{-- end modal --}}


          




          <div class="col-md-6 col-lg-6 col-xlg-6">
            <div class="card card-hover">
              <div class="box  text-center">
                <h1 class="font-light text-dark">
                  {{-- <i class="mdi mdi-collage"></i> --}}
                  Plan
                </h1>
                <h3 class="text-success">{{ $user->name }}</h3>
              </div>
            </div>
          </div>

          
          <div class="col-md-6 col-lg-6 col-xlg-6">
            <div class="card card-hover">
              <div class="box  text-center">
                <h1 class="font-light text-dark">
                  {{-- <i class="mdi mdi-collage"></i> --}}
                  Total Earnings
                </h1>
                <h3 class="text-success">{{ $user->total_amount }}</h3>
              </div>
            </div>
          </div>

          
          <div class="col-md-6 col-lg-6 col-xlg-6">
            <div class="card card-hover">
              <div class="box  text-center">
                <h1 class="font-light text-dark">
                  {{-- <i class="mdi mdi-collage"></i> --}}
                  Direct Commission
                </h1>
                <h3 class="text-success">{{ $user->direct }}</h3>
              </div>
            </div>
          </div>


          
          <div class="col-md-6 col-lg-6 col-xlg-6">
            <div class="card card-hover">
              <div class="box  text-center">
                <h1 class="font-light text-dark">
                  {{-- <i class="mdi mdi-collage"></i> --}}
                  Indirect Commission
                </h1>
                <h3 class="text-success">{{ $user->indirect}}</h3>
              </div>
            </div>
          </div>

          
          

          @endforeach

         
        </div>
            


              {{-- start package --}}
             
         
              <div id="plans" class="our-portfolio section">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                      <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2 class="text-center">Choose <span>Your Plans</span></h2>
                      </div>
                    </div>
                  </div>
                  <div class="row">
              
                    <div   class="card-group text-center text-white plan_data">
                     
            @foreach ($plan as $plans)
                     
                      <div style="background: linear-gradient(105deg, #fb730d 0%, #ff461e 100%);border-radius: 25px 25px;margin: 20px;height: 350px;" class="card">
                        <h3>{{ $plans->name }}</h3>
                        <div class="card-body text-white">
                          <h5 style="color: #f6f6f6" class="card-title">Level : {{ $plans->level }}</h5>
                          <h3 class="mt-3">Commissions</h3>
                          <p style="color: #f6f6f6" class="card-text">Charges : {{ $plans->charges }}</p>
                          <p style="color: #f6f6f6" class="card-text">Direct : {{ $plans->direct }}</p>
                          <p style="color: #f6f6f6" class="card-text">Indirect : {{ $plans->indirect }}</p>
                          <p style="color: #f6f6f6" class="card-text">Bonus : {{ $plans->bonus }}</p>
                          <p style="color: #f6f6f6" class="card-text">Features : {{ $plans->features }}</p>
                        </div>
                        <div   class="card-footer">
                          <a href="{{ route('package.create',$plans->id) }}"  style="border:none;border-radius: 25px 25px;background: linear-gradient(105deg, #fd8122 0%, #fd8122 100%);"  class="addPlan btn btn-primary">Select This Plan</a>
                     
                          
                        </div>
                      </div>
            @endforeach
                      
                    </div>
                    </div>
            
                    
                  </div>
                </div>
              </div>
            <br><br><br>

              {{-- emd package --}}

       

  


          @endrole
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
         
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
        
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
         

        </div>




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
     
        
        <script>
          $(document).ready(function () {
              // Get the user's balance
              var userBalance = parseFloat('{{ Auth()->user()->balance }}');
      
              // When the "Save" button is clicked
              $('#saveButton').click(function () {
                  // Get the entered amount from the form
                  var enteredAmount = parseFloat($('#amount').val());
      
                  // Check if the entered amount is greater than the user's balance
                  if (isNaN(enteredAmount) || enteredAmount > userBalance) {
                      alert('Amount should be equal to or less than your balance.');
                  } else {
                      // Perform your save action here if the validation passes
                      null;
                  }
              });
          });
      </script>
     
        @endsection