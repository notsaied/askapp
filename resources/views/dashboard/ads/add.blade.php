@extends('dashboard.layouts.app')

@section('page_name') Add Ad @stop

@section('header_tags')
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/adminlte.min.css') }}">
@stop

@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                        <!-- Input addon -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Ad</h3>
                            </div>

                            <div class="card-body">

                            <form action="{{ route('ad.create') }}" method="POST" enctype="multipart/form-data">

                            <div class="mb-4">
                                <label class="mb-2 mt-2">Ad image : </label>

                                <div class="mb-3">
                                  <input type="file" name="image">
                                </div>

                            </div>

                            <div class="input-group mb-3">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                </div>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <textarea class="form-control" rows="6" name="description" placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                    <label>Started Time:</label>
                                        <div class="input-group date" id="started" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="started_at" data-target="#started">
                                                <div class="input-group-append" data-target="#started" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                        </div>
                            </div>

                            <div class="form-group">
                                    <label>Expired time:</label>
                                        <div class="input-group date" id="expired" data-target-input="nearest">
                                                <input type="text" name="expired_at" class="form-control datetimepicker-input" data-target="expired">
                                                <div class="input-group-append" data-target="#expired" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                        </div>
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
<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('dashboard/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('dashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('dashboard/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('dashboard/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('dashboard/plugins/dropzone/min/dropzone.min.js') }}"></script>
<!-- AdminLTE App -->

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
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Date and time picker
        $('#started').datetimepicker({
            icons: { time: 'far fa-clock' }
        });

        $('#expired').datetimepicker({
            icons: { time: 'far fa-clock' }
        });


        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
</script>

@stop