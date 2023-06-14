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
                                    <li class="breadcrumb-item active" aria-current="page">View Student Year</li>
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
                                <h4 class="box-title">Student <strong>Search</strong></h4>
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
                                            <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search"
                                                value="search">

                                        </div>

                                    </div> {{-- end row --}}

                                </form>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Student Tables</h3>
                                <a href="{{ route('add.student.reg') }}" style="float:right;"
                                    class="btn btn-rounded btn-success mb-5">Add Student
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    @if (!@'search')
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%"> >Sl</>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">ID No</th>
                                                    <th class="text-center">Roll</th>
                                                    <th class="text-center">Year</th>
                                                    <th class="text-center">Class</th>
                                                    <th class="text-center">Image</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th class="text-center">Code</th>
                                                    @endif
                                                    <th class="text-center" width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($allData as $key => $student)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td class="text-center" width="">
                                                            {{ $student['student']['name'] }}</td>
                                                        <td class="text-center" width="">
                                                            {{ $student['student']['id_no'] }}</td>
                                                        <td class="text-center" width="">{{ $student->roll }}</td>
                                                        <td class="text-center" width="">
                                                            {{ $student['student_year']['name'] }}</td>
                                                        <td class="text-center" width="">
                                                            {{ $student['student_class']['name'] }}</td>
                                                        <td class="text-center" width=""><img id="showImg"
                                                                src="{{ !empty($student['student']['image']) ? url('upload/student_images/' . $student['student']['image']) : url('upload/no_image.jpg') }}"
                                                                alt="" style="width: 50px; width: 50px; ">
                                                        </td>
                                                        <td class="text-center" width="">{{ $student->year_id }}</td>
                                                        <td class="text-center">

                                                            <a title="Edit"
                                                                href="{{ route('student.reg.edit', $student->student_id) }}"
                                                                class="btn btn-info"> <i class="fa fa-edit"></i> </a>

                                                            <a title="Promotion"
                                                                href="{{ route('student.registration.promotion', $student->student_id) }}"
                                                                class="btn btn-primary"><i class="fa fa-check"></i></a>

                                                            <a target="_blank" title="Details"
                                                                href="{{ route('student.registration.details', $student->student_id) }}"
                                                                class="btn btn-danger"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            {{-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot> --}}
                                        </table>
                                    @else
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%"> >Sl</>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">ID No</th>
                                                    <th class="text-center">Roll</th>
                                                    <th class="text-center">Year</th>
                                                    <th class="text-center">Class</th>
                                                    <th class="text-center">Image</th>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <th class="text-center">Code</th>
                                                    @endif
                                                    <th class="text-center" width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($allData as $key => $student)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td class="text-center" width="">
                                                            {{ $student['student']['name'] }}</td>
                                                        <td class="text-center" width="">
                                                            {{ $student['student']['id_no'] }}</td>
                                                        <td class="text-center" width="">{{ $student->roll }}</td>
                                                        <td class="text-center" width="">
                                                            {{ $student['student_year']['name'] }}</td>
                                                        <td class="text-center" width="">
                                                            {{ $student['student_class']['name'] }}</td>
                                                        <td class="text-center" width=""><img id="showImg"
                                                                src="{{ !empty($student['student']['image']) ? url('upload/student_images/' . $student['student']['image']) : url('upload/no_image.jpg') }}"
                                                                alt="" style="width: 50px; width: 50px; ">
                                                        </td>
                                                        <td class="text-center" width="">{{ $student->year_id }}
                                                        </td>
                                                        <td class="text-center">
                                                            <a title="Edit"
                                                                href="{{ route('student.reg.edit', $student->student_id) }}"
                                                                class="btn btn-info"> <i class="fa fa-edit"></i> </a>

                                                            <a title="Promotion"
                                                                href="{{ route('student.registration.promotion', $student->student_id) }}"
                                                                class="btn btn-primary"><i class="fa fa-check"></i></a>

                                                            <a target="_blank" title="Details"
                                                                href="{{ route('student.registration.details', $student->student_id) }}"
                                                                class="btn btn-danger"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            {{-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> --}}
                                        </table>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

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
