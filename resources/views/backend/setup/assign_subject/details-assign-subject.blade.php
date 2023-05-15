@extends('admin.admin_master')
@section('Setup_active', 'active')
@section('title', 'Assign Subject Details')
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
                                    <li class="breadcrumb-item active" aria-current="page">View Assign Subject Details</li>
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
                                <h3 class="box-title">Assign Subject Details Tables</h3>
                                <a href="{{ route('add.assign.subject') }}" style="float:right;"
                                    class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h4><strong>Class :</strong> {{ $detailsData['0']['assignSub']['name'] }}</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center" width="5%"> >Sl</>
                                                <th class="text-center"width="20%">Subject</th>
                                                <th class="text-center" width="20%">Full Mark</th>
                                                <th class="text-center" width="20%">Pass Mark</th>
                                                <th class="text-center" width="20%">Subjective Mark</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($detailsData as $key => $details)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td class="text-center">
                                                        {{ $details['assignSubSubject']['name'] }}</td>
                                                    <td class="text-center"> {{ $details->full_mark }}
                                                    <td class="text-center"> {{ $details->pass_mark }}
                                                    <td class="text-center"> {{ $details->subjective_mark }}
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
