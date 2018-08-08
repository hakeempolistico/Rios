@extends('layouts.layout')
@section('content')

<style>
    [type=search]{
      border: 1px solid lightgray;
      font-size: 15px;
    }
    select{
      border: 1px solid lightgray;
      font-size: 15px;
    }
    table.dataTable{
      border-collapse: collapse;
    }
</style>

<div class="content">

  @include('includes.messages')

  <div class="row">
      <div class="col-md-12">      
      <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Change Password</h5>
                <p class="card-category">Input Credentials</p>
              </div>
              <div class="card-body ">
                <form id="form-change-password" role="form" method="POST" action="{{ url('/changepass/credentials') }}" novalidate class="form-horizontal">    
                  <label for="current-password" class="col-sm-4 control-label">Current Password</label>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                      <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
                    </div>
                  </div>
                  <label for="password" class="col-sm-4 control-label">New Password</label>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                  </div>
                  <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
              </form>
              </div>
              <div class="card-footer ">
              </div>
            </div>   
      </div>
  </div>
</div>

@include('layouts.footer')      

<!--   Core JS Files   -->
<script src="/js/core/jquery.min.js"></script>
<script src="/js/core/popper.min.js"></script>
<script src="/js/core/bootstrap.min.js"></script>
<script src="/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Chart JS -->
<script src="/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="/demo/demo.js"></script>
<script>

  $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });
</script>

@endsection