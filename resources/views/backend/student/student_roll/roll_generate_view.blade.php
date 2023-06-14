@extends('admin.admin_master')
@section('student_active', 'active')
@section('title', 'Student Management')
@section('admin')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Setup Management</li>
                                    <li class="breadcrumb-item active" aria-current="page"> Roll Generator</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">Student <strong>Roll Generator</strong></h4>
                            </div>

                            <div class="box-body">
                                <form action="{{ route('student.class.year.wise') }}" method="get">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Year <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="religion" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Year </option>
                                                        @foreach ($years as $y)
                                                            <option value="{{ $y->id }}"
                                                                {{ @$year_id == $y->id ? 'selected' : '' }}>
                                                                {{ $y->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Class <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <select name="class_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Class </option>
                                                        @foreach ($classes as $c)
                                                            <option value="{{ $c->id }}"
                                                                {{ @$class_id == $c->id ? 'selected' : '' }}>
                                                                {{ $c->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('religion')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4" style="padding-top: 25px">
                                            {{-- <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search"
                                                value="search"> --}}
                                            <a id="search" class="btn btn-rounded btn-dark mb-5"
                                                name="search">Search</a>

                                        </div>

                                    </div> {{-- end row --}}

                                    {{-- ////////////////////////Roll Generator Table\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}




                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
