@extends('admin.admin_master')
@section('Setup_active', 'active')
@section('title', 'Edit Assign Subject')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Assign Subject</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('update.assign.subject', $editData['0']->class_id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">
                                                <div class="form-group">
                                                    <h5>Select Class Name
                                                        <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <select name="class_id" id="role" required=""
                                                            class="form-control">
                                                            <option value="" selected="" disabled="">
                                                                Select Class</option>
                                                            @foreach ($classes as $cls)
                                                                <option value="{{ $cls->id }}"
                                                                    {{ $editData['0']->class_id == $cls->id ? 'selected' : '' }}>
                                                                    {{ $cls->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @foreach ($editData as $edit)
                                                    <div class="delete_whole_extra_item_add"
                                                        id="delete_whole_extra_item_add">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <h5>Select Student Subject
                                                                        <span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <select name="subject_id[]" id="role"
                                                                            required="" class="form-control">
                                                                            <option value="" selected=""
                                                                                disabled="">
                                                                                Select Subject</option>
                                                                            @foreach ($subjects as $sub)
                                                                                <option value="{{ $sub->id }}"
                                                                                    {{ $edit->subject_id == $sub->id ? 'selected' : '' }}>
                                                                                    {{ $sub->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h5>Full Mark <span class="text-danger">*</span></h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="full_mark[]"
                                                                            class="form-control"
                                                                            value="{{ $edit->full_mark }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h5>Pass Mark<span class="text-danger">*</span></h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="pass_mark[]"
                                                                            class="form-control"
                                                                            value="{{ $edit->pass_mark }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h5>Subjective Mark <span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="subjective_mark[]"
                                                                            class="form-control"
                                                                            value="{{ $edit->subjective_mark }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Practical Mark <span class="text-danger"></span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="practical_mark[]"
                                                                    class="form-control" value="Optional">
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                            <div class="col-md-2" style="padding-top: 25px">
                                                                <span class="btn btn-success addevenrmore">
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </span>
                                                                <span class="btn btn-danger removeevenrmore">
                                                                    <i class="fa fa-minus-circle"></i>
                                                                </span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div> <!-- Add Item close div -->
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                                            </div>

                                        </div>
                                    </div> <!-- End Row -->
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



    {{-- Add and remove the class and amount --}}
    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Select Student Subject
                                <span class="text-danger">*</span>
                            </h5>
                            <div class="controls">
                                <select name="subject_id[]" id="role" required="" class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Subject</option>
                                    @foreach ($subjects as $sub)
                                        <option value="{{ $sub->id }}">
                                            {{ $sub->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Full Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="full_mark[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Pass Mark<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="pass_mark[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Subjective Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subjective_mark[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-2">
                        <div class="form-group">
                            <h5>Practical Mark <span class="text-danger"></span></h5>
                            <div class="controls">
                                <input type="text" name="practical_mark[]" class="form-control" value="Optional">
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-2" style="padding-top: 25px">
                        <span class="btn btn-success addevenrmore">
                            <i class="fa fa-plus-circle"></i>
                        </span>
                        <span class="btn btn-danger removeevenrmore">
                            <i class="fa fa-minus-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script add and remove the class and amount --}}

    <script type="text/javascript">
        $(document).ready(function() {

            var couner = 0;
            $(document).on("click", ".addevenrmore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                couner++;
            });
            $(document).on("click", ".removeevenrmore", function(event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                couner -= 1;
            });
        });
    </script>

@endsection
