@extends('dashboard.layouts.app')

@section('page_name') Edit Question @stop

@section('header_tags')
@stop

@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Question</h3>
              </div>

              <div class="card-body">

              @if($question->image !== null)

                  <div class="text-center mb-5">
                      <img src="{{ $question->image }}" width="250" alt="{{ $question->title }}" />
                  </div>

              @endif

              <form action="{{ route('question.edit') }}" method="POST">

              <div class="input-group mb-3">
                  <ul>
                      <li><b>Created By :</b> <a href="{{ URL('/sz-admin/users').'/'.$question->user->id }}">{{ $question->user->name }}</a></li>
                      <li><b>Last Updated :</b> {{ $question->updated_at->diffForHumans() }}</li>
                      <li><b>Time :</b> {{ $question->created_at->diffForHumans() }}</li>
                  </ul>
                    <input type="hidden" name="id" value="{{ $question->id }}" >
                </div>

                <div class="input-group mb-3">
                    <textarea class="form-control" rows="6" name="description">{{ $question->description }}</textarea>
                </div>

                @CSRF

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@stop
@section('footer_tags')
    @if($errors->any())
        <script>
            @foreach($errors->all() as $err)
                toastr.error('{{$err}}');
            @endforeach
        </script>
    @endif
    @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
@stop