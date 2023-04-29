@extends('admin.admin_master')
@section('Profile_active', 'active')
@section('title', 'Edit Profile')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Profile</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Role <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="usertype" id="role"disabled
                                                                class="form-control">
                                                                <option value="">Select
                                                                    Role</option>
                                                                <option value="Admin"
                                                                    {{ $editData->usertype == 'Admin' ? 'Selected' : '' }}>
                                                                    Admin</option>
                                                                <option value="User"
                                                                    {{ $editData->usertype == 'User' ? 'Selected' : '' }}>
                                                                    User</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                required="" value="{{ $editData->name }}">
                                                        </div>
                                                    </div>
                                                </div><!-- End Col Md-6 -->
                                            </div> <!-- End Row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Email <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $editData->email }}">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Phone </h5>
                                                        <div class="controls">
                                                            <input type="text" name="phone" class="form-control"
                                                                value="{{ $editData->phone }}">
                                                        </div>
                                                    </div>
                                                </div><!-- End Col Md-6 -->
                                            </div> <!-- End Row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Address <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control"
                                                                value="{{ $editData->address }}">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Gender <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="role" class="form-control">
                                                                <option value="">Gender
                                                                </option>
                                                                <option value="Male"
                                                                    {{ $editData->gender == 'Male' ? 'Selected' : '' }}>
                                                                    Male</option>
                                                                <option value="Female"
                                                                    {{ $editData->gender == 'Female' ? 'Selected' : '' }}>
                                                                    Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- End Col Md-6 -->
                                            </div> <!-- End Row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Image <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" class="form-control"
                                                                id="image">
                                                        </div>
                                                    </div>
                                                    {{-- show image --}}
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImg"
                                                                src="{{ !empty($user->image) ? url('upload/user_images/' . $user->image) : url('upload/no_image.jpg') }}"
                                                                alt=""
                                                                style="width: 100px; width: 100px; border:1px solid #000000;">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->
                                                <div class="col-md-6">
                                                </div><!-- End Col Md-6 -->
                                            </div> <!-- End Row -->


                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
        </div>
    </div>

    {{-- Image Load  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


@endsection
