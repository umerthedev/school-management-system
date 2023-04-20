@extends('admin.admin_master')
@section('Profile_active', 'active')
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
                                    <li class="breadcrumb-item" aria-current="page">Manage Profile</li>
                                    <li class="breadcrumb-item active" aria-current="page">Your Profile</li>
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


                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-black"
                                style="background: url('../images/gallery/full/10.jpg') center center;">
                                <h3 class="widget-user-username">Name: {{ $user->name }}</h3>
                                <a href="{{ route('edit.profile') }}" style="float:right;"
                                    class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                                <h6 class="widget-user-desc">Role: {{ $user->usertype }}</h6>
                                <h6 class="widget-user-desc">Email: {{ $user->email }}</h6>

                            </div>
                            <div class="widget-user-image">
                                <img class="rounded-circle"
                                    src="{{ !empty($user->image) ? url('upload/user_images/' . $user->image) : url('upload/no_image.jpg') }}"
                                    alt="User Avatar">
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Mobile</h5>
                                            <span class="description-text">{{ $user->phone }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 br-1 bl-1">
                                        <div class="description-block">
                                            <h5 class="description-header">Address</h5>
                                            <span class="description-text">{{ $user->address }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Gender</h5>
                                            <span class="description-text">{{ $user->gender }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
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
