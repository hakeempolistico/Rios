@extends('layouts.layout')
@section('content')
  
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-book-bookmark text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"> No of Books</p>
                      <p class="card-title">{{$bookCount}}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-space-shuttle"></i> <a href="/books">Go to books</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-box text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Issued Books</p>
                      <p class="card-title">{{$issuedCount}}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-space-shuttle"></i> <a href="/issues">Go to Book Issues</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-ruler-pencil text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Authors</p>
                      <p class="card-title">{{$authorCount}}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-space-shuttle"></i> <a href="/authors">Go to Authors</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-badge text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Members</p>
                      <p class="card-title">{{$memberCount}}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-space-shuttle"></i> <a href="/members">Go to Members</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Users Behavior</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">
                <canvas id=chartHours width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="row">
          {{-- <div class="col-md-6">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Email Statistics</h5>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-body ">
                <canvas id="chartEmail"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <i class="fa fa-circle text-primary"></i> Opened
                  <i class="fa fa-circle text-warning"></i> Read
                  <i class="fa fa-circle text-danger"></i> Deleted
                  <i class="fa fa-circle text-gray"></i> Unopened
                </div>
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar"></i> Number of emails sent
                </div>
              </div>
            </div>
          </div> --}}

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats bg-warning">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-book-bookmark text-primary text-white"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category text-white">New Books</p>
                      <p class="card-title text-white">{{$booksWeeklyReport}}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats text-white">
                  <i class="fa fa-refresh text-white"></i> Weekly Report
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats bg-warning">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-box text-primary text-white"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category text-white">New Issued</p>
                      <p class="card-title text-white">{{$issuedWeeklyReport}}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats  text-white">
                  <i class="fa fa-refresh text-white"></i> Weekly Report
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats bg-warning">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-share-66 text-primary text-white"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category text-white">Returned</p>
                      <p class="card-title text-white">{{$returnedWeeklyReport}}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats  text-white">
                  <i class="fa fa-refresh text-white"></i> Weekly Report
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats bg-warning">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-badge text-primary text-white"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category text-white">New Members</p>
                      <p class="card-title text-white">{{$membersWeeklyReport}}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats  text-white">
                  <i class="fa fa-refresh text-white"></i> Weekly Report
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">NASDAQ: AAPL</h5>
                <p class="card-category">Line Chart with Points</p>
              </div>
              <div class="card-body">
                <canvas id="speedChart" width="400" height="100"></canvas>
              </div>
              <div class="card-footer">
                <div class="chart-legend">
                  <i class="fa fa-circle text-info"></i> Tesla Model S
                  <i class="fa fa-circle text-warning"></i> BMW 5 Series
                </div>
                <hr/>
                <div class="card-stats">
                  <i class="fa fa-check"></i> Data information certified
                </div>
              </div>
            </div>
          </div> --}}
        </div>

        <div class="row">
          <div class="col-lg-3">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Section Statistics</h5>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-body ">
                <canvas id="chartEmail"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend text-10">
                  <i class="fa fa-circle text-primary"></i> Periodical 
                  <i class="fa fa-circle text-warning"></i> General Reference
                  <i class="fa fa-circle text-danger"></i> Children's Section
                  <i class="fa fa-circle text-gray"></i> Circulation
                  <i class="fa fa-circle" style="color: #52B3D9"></i> Fiction
                </div>
                <hr>
                <div class="stats text-10">
                  <i class="fa fa-calendar"></i> Percent of books per section
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-3 bg-primary">
              <div class="card-header">
                <h6 class="card-title text-white">Section Statistics</h6>
              </div>
              <div class="card-body pt-0">
                <table class="table table-borderless text-white text-10">
                  <tr>
                    <td><b>CIRCULATION</b></td>
                    <td class="pull-right">1</td>
                  </tr>
                  <tr>
                    <td><b>PERIODICAL</b></td>
                    <td class="pull-right">1</td>
                  </tr>
                  <tr>
                    <td><b>GENERAL REFERENCE</b></td>
                    <td class="pull-right">1</td>
                  </tr>
                  <tr>
                    <td><b>CHILDREN'S SECTION</b></td>
                    <td class="pull-right">1</td>
                  </tr>
                  <tr>
                    <td><b>FICTION</b></td>
                    <td class="pull-right">1</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-3 bg-success">
              <div class="card-header">
                <h6 class="card-title text-white">Last Added Books</h6>
              </div>
              <div class="card-body pt-0">
                <table class="table table-borderless text-white text-10">
                  @foreach($lastBooks as $book)
                  <tr>
                    <td><b>{{$book->title}}</b></td>
                    <td class="pull-right">{{$book->author}}</td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-3 bg-danger">
              <div class="card-header">
                <h6 class="card-title text-white">Last Added Members</h6>
              </div>
              <div class="card-body pt-0">
                <table class="table table-borderless text-white text-10">
                  @foreach($lastMembers as $member)
                  <tr>
                    <td><b>{{$member->firstname}} {{$member->lastname}}</b></td>
                    <td class="pull-right">{{$member->contact}}</td>
                  </tr>
                  @endforeach
                </table>
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
  <!-- Chart JS -->
  <script src="/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="/demo/demo.js"></script>
  <script>

    var circulationCount = {{$circulationCount}}
    var periodicalCount = {{$periodicalCount}}
    var generalCount = {{$generalCount}}
    var childrenCount = {{$childrenCount}}
    var fictionCount = {{$fictionCount}}

    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages()
    });
  </script>

@endsection