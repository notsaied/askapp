@extends('dashboard.layouts.app')

@section('page_name') Questions @stop

@section('header_tags')
@stop

@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Questions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Questions</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Display all questions</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="sorting"  aria-label="Browser: activate to sort column ascending">Description</th>
                                        <th class="sorting"  aria-label="all users phones">Comments</th>
                                        <th class="sorting"  aria-label="actions">Actions</th>
                                        <th class="sorting"  aria-label="times">Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($questions as $question)
                                            <tr id="u_{{ $question->id }}">
                                                <td>{{ $question->description }}</td>
                                                <td><a href="comments/{{$question->id}}">{{ $question->comments_count }}</a></td>
                                                <td>

                                                    <a class="btn btn-app" href="{{ URL('/sz-admin/questions/' . $question->id ) }}" style="height: auto;min-width: auto;padding:10px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a class="btn btn-app bg-danger" onclick="question_delete({{ $question->id }});" style="height: auto;min-width: auto;padding:10px;">
                                                        <i class="fas fa-inbox"></i>
                                                    </a>

                                                </td>
                                                <td>{{ $question->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @empty
                                            <td>There are no questions</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                </div>
                                </div>
                               </div>
                          </div> <!-- /.card-body -->
                        </div>  <!-- /.card -->
                        <!-- /.card -->

                        <div class="d-flex">
                             <div class="mx-auto">
                                {{ $questions->links("pagination::bootstrap-4") }}
                            </div>
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop
@section('footer_tags')
<script>
    function question_delete(id) {

        if(confirm("Are you sure ?")) {
            $.ajax({
               type:'POST',
               url:"{{ route('question.delete') }}",
               data:{
                   'id' : id
               },
               success:function(data){
                    $('#u_'+id).remove();
                    toastr.success('Question deleted successfully !');
               },
               error: function (request, status, error) {
                   toastr.error(request.responseText);
              }

            }); //end ajax function

        } //end if confirm

    } //end question delete function

</script>
@stop