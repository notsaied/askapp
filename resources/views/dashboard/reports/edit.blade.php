@extends('dashboard.layouts.app')

@section('page_name') Edit Ad @stop

@section('header_tags')
@stop

@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Ad</h3>
              </div>

              <div class="card-body">

              @if($ad->image !== null)

                  <div class="text-center mb-5">
                      <img src="{{ $ad->image }}" width="250" alt="{{ $ad->title }}" />
                  </div>

              @endif

              <form action="{{ route('question.edit') }}" method="POST">

              <div class="input-group mb-3">
                  <ul>
                      <li><b>Created By :</b></li>
                      <li><b>Last Updated :</b> {{ $ad->updated_at->diffForHumans() }}</li>
                      <li><b>Time :</b> {{ $ad->created_at->diffForHumans() }}</li>
                  </ul>
                    <input type="hidden" name="id" value="{{ $ad->id }}" >
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-edit"></i></span>
                </div>
                <input type="text" class="form-control" name="title" placeholder="title" value="{{ $ad->title }}">
                </div>

                <div class="input-group mb-3">
                    <textarea class="form-control" rows="6" name="description">{{ $ad->description }}</textarea>
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