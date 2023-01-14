    @extends('dashboard.layouts.app')

    @section('page_name') Home @stop

    @section('header_tags')
    @stop

    @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totals['users'] }}</h3>

                <p>All Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totals['ads'] }}</h3>

                <p>All ADS</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="ads" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totals['comments'] }}</h3>

                <p>Comments</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="comments" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totals['reports'] }}</h3>

                <p>Reports</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="reports" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">

       <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Last Users</h3>
                <div class="card-tools">
                  <a href="users" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Time</th>
                  </tr>
                  </thead>
                  <tbody>
                      @forelse($lastUsers as $user)
                          <tr>
                            <td>
                               <!-- <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">   -->
                              {{ $user->name }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                          </tr>
                      @empty
                        <i>There are no users</i>
                      @endforelse
                  </tbody>
                </table>
              </div>
            </div>



                   <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Last Reports</h3>
                <div class="card-tools">
                  <a href="reports" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Time</th>
                  </tr>
                  </thead>
                  <tbody>
                      @forelse($lastReports as $report)
                          <tr>
                            <td>
                               <!-- <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">   -->
                              {{ $report->user->name }}
                            </td>
                            <td>{{ $report->type }}</td>
                            <td>{{ $report->description }}</td>
                            <td>{{ $report->created_at->diffForHumans() }}</td>
                          </tr>
                      @empty
                        <i>There are no reports</i>
                      @endforelse
                  </tbody>
                </table>
              </div>
            </div>

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
              <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Last Questions</h3>
                <div class="card-tools">
                  <a href="questions" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Question</th>
                    <th>From</th>
                    <th>Comments Count</th>
                    <th>Time</th>
                  </tr>
                  </thead>

                  <tbody>
                      @forelse($lastQuestions as $question)
                        <tr>
                            <td>{{ $question->title }}</td>

                            <td>{{ $question->user->name }}</td>

                            <td>{{ $question->comments_count }}</td>

                            <td>{{ $question->created_at->diffForHumans() }}</td>
                        </tr>
                      @empty
                      <i>There are you questions right now...</i>
                      @endforelse

                  </tbody>  <!-- End Table body -->

                </table>
              </div>
            </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    @stop

    @section('footer_tags')
    @stop