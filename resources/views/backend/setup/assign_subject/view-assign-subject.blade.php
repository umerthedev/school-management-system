@extends('admin.admin_master')
@section('Setup_active', 'active')
@section('title', 'View Assign Subject')
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
                                    <li class="breadcrumb-item active" aria-current="page">View Assign Subject</li>
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

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Assign Subject Tables</h3>
                                <a href="{{ route('add.assign.subject') }}" style="float:right;"
                                    class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="5%"> >Sl</>
                                                <th class="text-center">Class</th>
                                                <th class="text-center" width="30%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($allData as $key => $assign)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td class="text-center">{{ $assign['assignSub']['name'] }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('assign.subject.edit', $assign->class_id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <a href="{{ route('assign.subject.details', $assign->class_id) }}"
                                                            class="btn btn-success">Details</a>
                                                        <a href="{{ route('assign.subject.delete', $assign->class_id) }}"
                                                            class="btn btn-danger" id="delete">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
