@extends('admin.admin_master')
@section('Setup_active', 'active')
@section('title', 'Fee Amount Details')
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
                                    <li class="breadcrumb-item active" aria-current="page">View Fee Amount Details</li>
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
                                <h3 class="box-title">Fee Amount Details Tables</h3>
                                <a href="{{ route('add.fee.amount') }}" style="float:right;"
                                    class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h4><strong>Fee Category :</strong> {{ $detailsData['0']['fee_category']['name'] }}</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center" width="5%"> >Sl</>
                                                <th class="text-center">Class Name</th>
                                                <th class="text-center" width="30%">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($detailsData as $key => $details)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td class="text-center">
                                                        {{ $details['student_class']['name'] }}</td>
                                                    <td class="text-center">TK {{ $details->amount }}
                                                    </td>
                                                    {{-- <td class="text-center">
                                                        <a href="{{ route('fee.amount.edit', $amount->fee_category_id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <a href="{{ route('fee.amount.details', $amount->fee_category_id) }}"
                                                            class="btn btn-success">Details</a>
                                                        <a href="{{ route('fee.amount.delete', $amount->fee_category_id) }}"
                                                            class="btn btn-danger" id="delete">Delete</a>
                                                    </td> --}}
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
