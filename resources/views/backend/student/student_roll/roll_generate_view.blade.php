@extends('admin.admin_master')
@section('student_active', 'active')
@section('title', 'Student Management')
@section('admin')

    {{-- ajax cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
                                <form action="" method="get">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Year <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Year </option>
                                                        @foreach ($years as $y)
                                                            <option value="{{ $y->id }}">
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
                                                    <select name="class_id" id="class_id" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Class </option>
                                                        @foreach ($classes as $c)
                                                            <option value="{{ $c->id }}">
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
                                            <a id="search" class="btn btn-rounded btn-dark mb-5">Search</a>

                                        </div>

                                    </div> {{-- end row --}}

                                    {{-- ////////////////////////Roll Generator Table\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}


                                    <div class="row d-none" id="roll-generate">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID NO</th>
                                                        <th>Student Name</th>
                                                        <th>Father Name</th>
                                                        <th>Gender</th>
                                                        <th>Roll</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="roll-generate-tr">

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    <input type="submit" name="" class="btn btn-rounded btn-info mb-5"
                                        value="Roll Generator">




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

    {{-- ajax script --}}

    <script type="text/javascript">
        $(document).on('click', '#search', function() {
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            $.ajax({
                url: "{{ route('student.registration.getstudents') }}",
                type: "GET",
                data: {
                    'year_id': year_id,
                    'class_id': class_id
                },
                success: function(data) {
                    $('#roll-generate').removeClass('d-none');
                    var html = '';
                    $.each(data, function(key, v) {
                        html +=
                            '<tr>' +
                            '<td>' + v.student.id_no +
                            '<input type="hidden" name="student_id[]" value="' + v.student_id +
                            '"></td>' +
                            '<td>' + v.student.name + '</td>' +
                            '<td>' + v.student.fname + '</td>' +
                            '<td>' + v.student.gender + '</td>' +
                            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="' +
                            v.roll + '"></td>' +
                            '</tr>';
                    });
                    html = $('#roll-generate-tr').html(html);
                }
            });
        });
    </script>
@endsection
