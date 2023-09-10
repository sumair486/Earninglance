@extends('layouts.main')


@section('main-section')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Plan</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                Plan
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
                {{-- <input type="hidden" value="{{ $plans->id }}" class="plan_id">
                <input type="hidden" value="{{ $plans->charges }}" class="amount_plan"> --}}
      
                    
                  </div>
                </div>
      @endforeach
                
              </div>
              </div>
      
              
            </div>
          </div>
        </div>
      <br><br><br>


        {{-- end --}}





</div>

</div>

@endsection