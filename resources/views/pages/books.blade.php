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
          <h4 class="card-title">List of {{$title}}</h4>
        </div>
        <div class="card-body">
          <div class="table">
            <table class="table table-bordered table-striped" id="table">
                <thead>
                  <tr>
                      <th width="10%">Id</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Genre</th>
                      <th>Section</th>
                      <th>Copies</th>
                      <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($books as $book)
                    <tr>
                      <td>{{$book->id}}</td>
                      <td>{{$book->book_title}}</td>
                      <td>{{$book->author_name}}</td>
                      <td>{{$book->genre_name}}</td>
                      <td>{{$book->section_name}}</td>
                      <td>{{$book->copies}}</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-sm btn-info btn-add-copy" data-toggle="modal" data-target="#addCopyModal"><i class="fa fa-plus"></i></button>
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
          {!! Form::open(['action' => 'BookController@store', 'method' => 'POST']) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <small class="text-success">Book Title</small>
                  {{Form::text('book_title', '', ['class' => 'form-control', 'placeholder' => 'Book Title'])}}
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <small class="pull-right"><a href="/authors">add author</a></small>
                  <small class="text-success">Book Author</small>
                  <select name="author" class="select2 form-control" data-placeholder="Select Author">
                    <option></option>
                    @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <small class="pull-right"><a href="/genres">add genre</a></small>
                  <small class="text-success">Book Genre</small>
                  <select name="genre" class="select2 form-control" data-placeholder="Select Genre">
                    <option></option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <small class="pull-right"><a href="/sections">add section</a></small>
                  <small class="text-success">Book Library Section</small>
                  <select name="section" class="select2 form-control" data-placeholder="Select Library Section">
                    <option></option>
                    @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <small class="text-success">Book Copies</small>
                  {{Form::number('copies', '', ['class' => 'form-control', 'placeholder' => 'Book Copies'])}}
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

<!-- Add Copies Modal -->
<div class="modal fade" id="addCopyModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="card-title" style="margin: 0px;">ADD COPIES</h5>
        </div>
        <div class="card-body">
          {!! Form::open(['action' => 'BookController@addCopies', 'method' => 'PUT']) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <small class="text-success">ID</small>
                  {{Form::text('id', '', [
                    'id' => 'add-copies-id',
                    'class' => 'form-control', 
                    'placeholder' => 'ID',
                    'readonly'
                    ])}}
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <small class="text-success">Copies</small>
                  {{Form::number('copies', '', ['id' => 'add-copies-val', 'class' => 'form-control'])}}
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
          {!! Form::open(['action' => ['BookController@update', null], 'method' => 'PUT']) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <small class="text-success">Book ID</small>
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
                  {{Form::text('book_title', '', ['id' => 'edit-title','class' => 'form-control', 'placeholder' => 'Book Title'])}}
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <small class="pull-right"><a href="/authors">add author</a></small>
                  <small class="text-success">Book Author</small>
                  <select id="edit-author" name="author" class="select2 form-control" data-placeholder="Select Author">
                    <option></option>
                    @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <small class="pull-right"><a href="/genres">add genre</a></small>
                  <small class="text-success">Book Genre</small>
                  <select id="edit-genre" name="genre" class="select2 form-control" data-placeholder="Select Genre">
                    <option></option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <small class="pull-right"><a href="/sections">add section</a></small>
                  <small class="text-success">Book Library Section</small>
                  <select id="edit-section" name="section" class="select2 form-control" data-placeholder="Select Library Section">
                    <option></option>
                    @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
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
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
  //SELECT2
  $('.select2').select2();

  //DATATABLE
  $('#table').DataTable({"pageLength": 25})
  $('#table').on('click', '.btn-edit', function () {
    var id = $(this).closest('tr').children('td:first').text()
    var title = $(this).closest('tr').children('td:nth-child(2)').text()
    var author = $(this).closest('tr').children('td:nth-child(3)').text()
    var genre = $(this).closest('tr').children('td:nth-child(4)').text()
    var section = $(this).closest('tr').children('td:nth-child(5)').text()

    $('#edit-id').val(id)
    $('#edit-title').val(title)
    $("#edit-author").select2("val", $("#edit-author option:contains('"+author+"')").val())
    $("#edit-genre").select2("val", $("#edit-genre option:contains('"+genre+"')").val())
    $("#edit-section").select2("val", $("#edit-section option:contains('"+section+"')").val())
  })

  $('#table').on('click', '.btn-delete', function () {
    var id = $(this).closest('tr').children('td:first').text()
    $('.btn-confirm').attr("href", "/books/"+id+"/destroy")
  });

  $('#table').on('click', '.btn-add-copy', function () {
    var id = $(this).closest('tr').children('td:first').text()
    $('#add-copies-id').val(id)
  });

  $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages()
  });

</script>

@endsection