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
    .select2-container{
      width: 100% !important;
    }
    .select2-container--default .select2-selection--single{
      padding: 6px;
      border: 1px solid lightgray !important;
      height: calc(2.25rem + 2px) !important;
    }
    .select2-selection__arrow{
      height: 100% !important;
    }
</style>

<div class="content">

  @include('includes.messages')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-outline-primary pull-right" data-toggle="modal" data-target="#addModal"><i class="nc-icon nc-simple-add"></i></button>
          <h4 class="card-title">List of Issued Books</h4>
        </div>
        <div class="card-body">

          <div class="table">
            <h6><a href="/returned" class="text-danger">VIEW RETURNED BOOKS</a></h6>  
            <table class="table table-bordered table-striped" id="table">
                <thead>
                  <tr>
                      <th width="10%">Id</th>
                      <th>Book</th>
                      <th>Member</th>
                      <th>Date Issued</th>
                      <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($issues as $issue)
                    <tr>
                      <td>{{$issue->id}}</td>
                      <td>{{$issue->book_title}}</td>
                      <td>{{$issue->firstname}} {{$issue->lastname}}</td>
                      <td>{{date('M d, Y - h:ia', strtotime($issue->created_at))}}</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-sm btn-primary btn-edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-undo"></i></button>
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
              <h5 class="card-title" style="margin: 0px;">ISSUE BOOK</h5>
            </div>
            <div class="card-body">
              {!! Form::open(['action' => 'IssueController@store', 'method' => 'POST']) !!}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <small class="text-success">Book Title</small>
                      <select name="book_title" class="select2 form-control" data-placeholder="Select Book Title">
                        <option></option>
                        @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->book_title }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <small class="text-success">Registered Member</small>
                      <select name="member" class="select2 form-control" data-placeholder="Select Member">
                        <option></option>
                        @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->firstname }} {{ $member->lastname }}</option>
                        @endforeach
                      </select>
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
              <h5 class="card-title" style="margin: 0px;">RETURN BOOK</h5>
            </div>
            <div class="card-body">
              {!! Form::open(['action' => ['IssueController@update', null], 'method' => 'PUT']) !!}
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
                      <small class="text-success">Book Title</small>
                      {{Form::text('book_title', '', [
                        'id' => 'edit-booktitle',
                        'class' => 'form-control', 
                        'readonly'
                        ])}}
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <small class="text-success">Member Name</small>
                      {{Form::text('member_name', '', [
                        'id' => 'edit-member',
                        'class' => 'form-control', 
                        'readonly'
                        ])}}
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <small class="text-success">Date Issued</small>
                      {{Form::text('date_issued', '', [
                        'id' => 'edit-dateissued',
                        'class' => 'form-control',
                        'readonly'
                        ])}}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    {{Form::submit('Return', ['class' => 'btn btn-primary btn-round'])}}
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
<!-- Select2! -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
  //SELECT2
  $('.select2').select2();

  $('#table').DataTable({"pageLength": 25});
  $('#table').on('click', '.btn-edit', function () {
    var id = $(this).closest('tr').children('td:first').text();
    var bookTitle = $(this).closest('tr').children('td:nth-child(2)').text();
    var member = $(this).closest('tr').children('td:nth-child(3)').text();
    var date = $(this).closest('tr').children('td:nth-child(4)').text();
    $('#edit-id').val(id);
    $('#edit-booktitle').val(bookTitle);
    $('#edit-member').val(member);
    $('#edit-dateissued').val(date);
  });
</script>

@endsection