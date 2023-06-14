@extends('admin.admin_master')
@section('student_active', 'active')
@section('title', 'Edit Student ')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Student Promotion</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post"
                                    action="{{ route('promotion.student.registration', $editData->student_id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $editData->id }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Student Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $editData['student']['name'] }}">

                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Father's Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="fname" class="form-control"
                                                        value="{{ $editData['student']['fname'] }}">

                                                    @error('fname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="mname" class="form-control"
                                                        value="{{ $editData['student']['mname'] }}">

                                                    @error('mname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- End 1st Row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Mobile<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="mobile" class="form-control"
                                                        value="{{ $editData['student']['mobile'] }}">

                                                    @error('mobile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Address <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="address" class="form-control"
                                                        value="{{ $editData['student']['address'] }}">

                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Gender <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="gender" id="role" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Gender </option>
                                                        <option value="male"
                                                            {{ $editData['student']['gender'] == 'male' ? 'selected' : '' }}>
                                                            Male</option>
                                                        <option value="female"
                                                            {{ $editData['student']['gender'] == 'female' ? 'selected' : '' }}>
                                                            Female</option>
                                                    </select>

                                                    @error('gender')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- End 2nd Row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Religion <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="religion" id="religion" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Religion </option>
                                                        <option value="islam"
                                                            {{ $editData['student']['religion'] == 'islam' ? 'selected' : '' }}>
                                                            Islam</option>
                                                        <option value="hindu"
                                                            {{ $editData['student']['religion'] == 'hindu' ? 'selected' : '' }}>
                                                            Hindu</option>
                                                        <option value="christan"
                                                            {{ $editData['student']['religion'] == 'christan' ? 'selected' : '' }}>
                                                            Christan</option>
                                                    </select>

                                                    @error('religion')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Date Of Birth<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="dob" class="form-control"
                                                        value="{{ $editData['student']['dob'] }}">

                                                    @error('dob')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Discount <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount" class="form-control"
                                                        value="{{ $editData['discount']['discount'] }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- End 3rd Row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Year <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="religion" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Year </option>
                                                        @foreach ($years as $y)
                                                            <option value="{{ $y->id }}"
                                                                {{ $editData->year_id == $y->id ? 'selected' : '' }}>
                                                                {{ $y->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Class <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Class </option>
                                                        @foreach ($classes as $c)
                                                            <option value="{{ $c->id }}"
                                                                {{ $editData->class_id == $c->id ? 'selected' : '' }}>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Group <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="group_id" id="religion" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Group </option>
                                                        @foreach ($groups as $g)
                                                            <option value="{{ $g->id }}"
                                                                {{ $editData->group_id == $g->id ? 'selected' : '' }}>
                                                                {{ $g->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('religion')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- End 4th Row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Shift <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="shift_id" id="religion" required=""
                                                        class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            Shift </option>
                                                        @foreach ($shifts as $s)
                                                            <option value="{{ $s->id }}"
                                                                {{ $editData->shift_id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                    @error('religion')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control"
                                                        id="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{-- show image --}}
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImg"
                                                            src="{{ !empty($editData['student']['image']) ? url('upload/student_images/' . $editData['student']['image']) : url('upload/no_image.jpg') }}"
                                                            alt=""
                                                            style="width: 100px; width: 100px; border:1px solid #000000;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- End 4th Row -->
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Promotion">
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
