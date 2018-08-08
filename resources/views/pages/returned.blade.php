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
          <h4 class="card-title">List of Returned Books</h4>
        </div>
        <div class="card-body">

          <div class="table">
            <h6><a href="/issues" class="text-success">VIEW ISSUED BOOKS</a></h6> 
            <table class="table table-bordered table-striped" id="table">
                <thead>
                  <tr>
                      <th>Book</th>
                      <th>Member</th>
                      <th>Date Issued</th>
                      <th>Date Returned</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($issues as $issue)
                    <tr>
                      <td>{{$issue->book_title}}</td>
                      <td>{{$issue->firstname}} {{$issue->lastname}}</td>
                      <td>{{date('M d, Y - h:ia', strtotime($issue->created_at))}}</td>
                      <td>{{date('M d, Y - h:ia', strtotime($issue->updated_at))}}</td>
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
<!-- Select2! -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
  //SELECT2
  $('.select2').select2();

  $('#table').DataTable({"pageLength": 25});

  $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });
</script>

@endsection