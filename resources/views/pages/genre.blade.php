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
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-outline-primary pull-right" data-toggle="modal" data-target="#addModal"><i class="nc-icon nc-simple-add"></i></button>
          <h4 class="card-title">List of {{$title}}</h4>
        </div>
        <div class="card-body">
          <div class="table">
            <table class="table table-bordered table-striped" id="genre-table">
                <thead>
                  <tr>
                      <th width="10%">Id</th>
                      <th>Name</th>
                      <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($genres as $genre)
                    <tr>
                      <td>{{$genre->id}}</td>
                      <td>{{$genre->genre_name}}</td>
                      <td>
                        <center>
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
              {!! Form::open(['action' => 'GenreController@store', 'method' => 'POST']) !!}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <small class="text-success">Genre Name</small>
                      {{Form::text('genre', '', ['class' => 'form-control', 'placeholder' => 'Genre Name'])}}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    {{Form::submit('Submit', ['class' => 'btn btn-primary btn-round'])}}
                  </div>
                </div>
              {!! Form::close() !!}
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
              {!! Form::open(['action' => ['GenreController@update', null], 'method' => 'PUT']) !!}
                <div class="row">
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
                      <small class="text-success">Genre Name</small>
                      {{Form::text('genre', '', [
                        'id' => 'edit-name',
                        'class' => 'form-control', 
                        'placeholder' => 'Genre Name'
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

  $('#genre-table').DataTable({"pageLength": 25});
  $('#genre-table').on('click', '.btn-edit', function () {
    var id = $(this).closest('tr').children('td:first').text();
    var name = $(this).closest('tr').children('td:nth-child(2)').text();
    $('#edit-id').val(id);
    $('#edit-name').val(name);
  });
  $('#genre-table').on('click', '.btn-delete', function () {
    var id = $(this).closest('tr').children('td:first').text();
    $('.btn-confirm').attr("href", "/genres/"+id+"/destroy");
    console.log(id);
  });

</script>

@endsection