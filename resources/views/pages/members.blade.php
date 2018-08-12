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
                      <th width="20%">Action</th>
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
              <center><h5 id="view-fullname"></h5></center>
            </div>
            <div class="col-md-12">
          <table class="table">
          	<tr>
          		<td class="text-primary">Sex:</td>
          		<td><div id="view-sex" class="pull-right"></div></td>
          	</tr>
          	<tr>
          		<td class="text-primary">House Number:</td>
          		<td><div id="view-housenumber" class="pull-right"></div></td>
          	</tr>
          	<tr>
          		<td class="text-primary">Street:</td>
          		<td><div id="view-street" class="pull-right"></div></td>
          	</tr>
          	<tr>
          		<td class="text-primary">Barangay:</td>
          		<td><div id="view-barangay" class="pull-right"></div></td>
          	</tr>
          	<tr>
          		<td class="text-primary">City:</td>
          		<td><div id="view-city" class="pull-right"></div></td>
          	</tr>
          	<tr>
          		<td class="text-primary">Province:</td>
          		<td><div id="view-province" class="pull-right"></div></td>
          	</tr>
          	<tr>
          		<td class="text-primary">Contact Number:</td>
          		<td><div id="view-contact" class="pull-right"></div></td>
          	</tr>
          	<tr>
          		<td class="text-primary">Email:</td>
          		<td><div id="view-email" class="pull-right"></div></td>
          	</tr>
          	<tr>
          		<td class="text-primary">Note:</td>
          		<td><div id="view-note" class="pull-right"></div></td>
          	</tr>
          </table>
            	
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
        $('#view-id').text(result.id)
        $('#view-sex').text(result.sex)
        $('#view-housenumber').text(result.house_number)
        $('#view-street').text(result.street)
        $('#view-city').text(result.city)
        $('#view-barangay').text(result.barangay)
        $('#view-province').text(result.province)
        $('#view-contact').text(result.contact)
        $('#view-email').text(result.email)
        $('#view-note').text(result.note)
        //console.log(result)
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
        //console.log(result)
      }})
  });

</script>

@endsection