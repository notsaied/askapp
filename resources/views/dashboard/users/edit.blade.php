@extends('dashboard.layouts.app')

@section('page_name') {{ $user->name }}'s Profile @stop

@section('header_tags')
@stop

@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit {{ $user->name }}'s Profile</h3>
              </div>

              <div class="card-body">

              <div class="text-center mb-5">
                  <img src="{{ $user->image }}" style="border-radius:50%;" width="150" alt="{{ $user->name }}'s picture" />
              </div>

              <form action="{{ route('user.edit') }}" method="POST">

                <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">

                <select name="gender">
                        <option value="0" @if($user->gender == 0) selected @endif>Male</option>
                        <option value="1" @if($user->gender == 1) selected @endif>Female</option>
                  </select>

                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                </div>

                @CSRF

                <input type="hidden" name="id" value="{{ $user->id }}" >

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $user->phone }}">
                </div>

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