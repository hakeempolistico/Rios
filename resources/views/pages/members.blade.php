@extends('layouts.app')
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
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
      background-color: #F8F8F8 !important;
    }
</style>

<div class="content">

  @include('includes.messages')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-outline-primary pull-right" data-toggle="modal" data-target="#addModal"><i class="nc-icon nc-simple-add"></i></button>
          <h4 class="card-title">List of {{$title}}</h4>
        </div>
        <div class="card-body">
          <div class="table">
            <table class="table table-bordered table-striped" id="table">
                <thead>
                  <tr>
                      <th width="10%">Id</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Contact Number</th>
                      <th>Email</th>
                      <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($members as $member)
                    <tr>
                      <td>{{$member->id}}</td>
                      <td>{{$member->firstname}}</td>
                      <td>{{$member->lastname}}</td>
                      <td>{{$member->contact}}</td>
                      <td>{{$member->email}}</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-sm btn-info btn-view" data-toggle="modal" data-target="#viewModal"><i class="fa fa-eye"></i></button>
                          <button type="button" class="btn btn-sm btn-primary btn-edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></button>
                          <button type="button" class="btn btn-sm btn-danger btn-delete" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-remove"></i></button>
                        </center>
                      </td>

                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Add Modal -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="card-title" style="margin: 0px;">ADD</h5>
      </div>
      <div class="card-body">
        {!! Form::open(['action' => ['MemberController@store', null], 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">First Name*</small>
                {{Form::text('firstname', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'First Name'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Last Name*</small>
                {{Form::text('lastname', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'Last Name'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Sex*</small>
                {{Form::select('sex',  array('male' => 'Male', 'female' => 'Female'), '', [
                  'class' => 'form-control', 
                  'placeholder' => 'Last Name'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Contact Number*</small>
                {{Form::text('contact', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'Contact Number'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">House Number</small>
                {{Form::text('house_number', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'House Number'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Street</small>
                {{Form::text('street', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'Street'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Barangay</small>
                {{Form::text('barangay', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'Barangay'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">City</small>
                {{Form::text('city', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'City'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Province</small>
                {{Form::text('province', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'Province'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Email</small>
                {{Form::text('email', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'Email'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Note</small>
                {{Form::textarea('note', '', [
                  'class' => 'form-control', 
                  'placeholder' => 'Note'
                  ])}}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              {{Form::submit('Submit', ['class' => 'btn btn-primary btn-round'])}}
            </div>
          </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="card-title" style="margin: 0px;">View</h5>
      </div>
      <div class="card-body">
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 10px">
              <center><img class="avatar border-gray rounded-circle" src="/img/user.png" width="30%"></center>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px">
              <center><h5 id="view-fullname" class="text-primary">Hakeem Joshua Polistico</h5></center>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">ID</small>
                {{Form::text('id', '25', [
                  'id' => 'view-id',
                  'class' => 'form-control',
                  'readonly'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Sex</small>
                {{Form::select('sex',  array('male' => 'Male', 'female' => 'Female'), '', [
                  'id' => 'view-sex',
                  'class' => 'form-control',
                  'disabled'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">House Number</small>
                {{Form::text('name', '', [
                  'id' => 'view-housenumber',
                  'class' => 'form-control',
                  'readonly'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Street</small>
                {{Form::text('name', '', [
                  'id' => 'view-street',
                  'class' => 'form-control',
                  'readonly'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Barangay</small>
                {{Form::text('name', '', [
                  'id' => 'view-barangay',
                  'class' => 'form-control',
                  'readonly'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">City</small>
                {{Form::text('name', '', [
                  'id' => 'view-city',
                  'class' => 'form-control',
                  'readonly'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Province</small>
                {{Form::text('name', '', [
                  'id' => 'view-province',
                  'class' => 'form-control',
                  'readonly'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Contact Number</small>
                {{Form::text('name', '', [
                  'id' => 'view-contact',
                  'class' => 'form-control',
                  'readonly'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Email</small>
                {{Form::text('name', '', [
                  'id' => 'view-email',
                  'class' => 'form-control',
                  'readonly'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Note</small>
                {{Form::textarea('name', '', [
                  'id' => 'view-note',
                  'class' => 'form-control',
                  'readonly'
                  ])}}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              {{Form::submit('Close', ['class' => 'btn btn-primary btn-round', 'data-dismiss' => 'modal'])}}
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="card-title" style="margin: 0px;">EDIT</h5>
      </div>
      <div class="card-body">
        {!! Form::open(['action' => ['MemberController@update', null], 'method' => 'PUT']) !!}
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 10px">
              <center><img class="avatar border-gray rounded-circle" src="/img/user.png" width="30%"></center>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">ID</small>
                {{Form::text('id', '', [
                  'id' => 'edit-id',
                  'class' => 'form-control', 
                  'placeholder' => 'ID',
                  'readonly'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">First Name</small>
                {{Form::text('firstname', '', [
                  'id' => 'edit-firstname',
                  'class' => 'form-control', 
                  'placeholder' => 'First Name'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Last Name</small>
                {{Form::text('lastname', '', [
                  'id' => 'edit-lastname',
                  'class' => 'form-control', 
                  'placeholder' => 'Last Name'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Sex</small>
                {{Form::select('sex',  array('male' => 'Male', 'female' => 'Female'), '', [
                  'id' => 'edit-sex',
                  'class' => 'form-control', 
                  'placeholder' => 'Last Name'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">House Number</small>
                {{Form::text('house_number', '', [
                  'id' => 'edit-housenumber',
                  'class' => 'form-control', 
                  'placeholder' => 'House Number'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Street</small>
                {{Form::text('street', '', [
                  'id' => 'edit-street',
                  'class' => 'form-control', 
                  'placeholder' => 'Street'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Barangay</small>
                {{Form::text('barangay', '', [
                  'id' => 'edit-barangay',
                  'class' => 'form-control', 
                  'placeholder' => 'Barangay'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">City</small>
                {{Form::text('city', '', [
                  'id' => 'edit-city',
                  'class' => 'form-control', 
                  'placeholder' => 'City'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Province</small>
                {{Form::text('province', '', [
                  'id' => 'edit-province',
                  'class' => 'form-control', 
                  'placeholder' => 'Province'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Contact Number</small>
                {{Form::text('contact', '', [
                  'id' => 'edit-contact',
                  'class' => 'form-control', 
                  'placeholder' => 'Contact Number'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Email</small>
                {{Form::text('email', '', [
                  'id' => 'edit-email',
                  'class' => 'form-control', 
                  'placeholder' => 'Email'
                  ])}}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <small class="text-success">Note</small>
                {{Form::textarea('note', '', [
                  'id' => 'edit-note',
                  'class' => 'form-control', 
                  'placeholder' => 'Note'
                  ])}}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              {{Form::submit('Update', ['class' => 'btn btn-primary btn-round'])}}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
            <div class="modal-header">
              <h5 class="card-title" style="margin: 0px;">DELETE</h5>
            </div>
            <div class="card-body">
                <div class="row">
                  <h6 style="margin: 10px;">Are you sure you want to delete record?</h6>
                </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">       
                    <a href="#" class="btn btn-danger btn-round btn-confirm"> DELETE </a>
                  </div>
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

  $('#table').DataTable({"pageLength": 25});
  $('#table').on('click', '.btn-delete', function () {
    var id = $(this).closest('tr').children('td:first').text();
    $('.btn-confirm').attr("href", "/members/"+id+"/destroy");
    console.log(id);
  });
  $('#table').on('click', '.btn-view', function (e) {
    var id = $(this).closest('tr').children('td:first').text()
    e.preventDefault()
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
      }
    });
    jQuery.ajax({
      url: "{{ url('/members/getInfo') }}",
      method: 'post',
      data: {
        id: id,
      },
      success: function(result){
        $('#view-fullname').text(result.firstname+' '+result.lastname)
        $('#view-id').val(result.id)
        $('#view-sex').val(result.sex)
        $('#view-housenumber').val(result.house_number)
        $('#view-street').val(result.street)
        $('#view-city').val(result.city)
        $('#view-barangay').val(result.barangay)
        $('#view-province').val(result.province)
        $('#view-contact').val(result.contact)
        $('#view-email').val(result.email)
        $('#view-note').val(result.note)
        console.log(result)
      }})
  });
  $('#table').on('click', '.btn-edit', function (e) {
    var id = $(this).closest('tr').children('td:first').text()
    e.preventDefault()
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
      }
    });
    jQuery.ajax({
      url: "{{ url('/members/getInfo') }}",
      method: 'post',
      data: {
        id: id,
      },
      success: function(result){
        $('#edit-firstname').val(result.firstname)
        $('#edit-lastname').val(result.lastname)
        $('#edit-id').val(result.id)
        $('#edit-sex').val(result.sex)
        $('#edit-housenumber').val(result.house_number)
        $('#edit-street').val(result.street)
        $('#edit-city').val(result.city)
        $('#edit-barangay').val(result.barangay)
        $('#edit-province').val(result.province)
        $('#edit-contact').val(result.contact)
        $('#edit-email').val(result.email)
        $('#edit-note').val(result.note)
        console.log(result)
      }})
  });

  $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages()
  });

</script>

@endsection