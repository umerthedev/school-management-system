@extends('admin.admin_master')
@section('Setup_active', 'active')
@section('title', 'Add Fee Amount')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Fee Category</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('store.fee.amount') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">
                                                <div class="form-group">
                                                    <h5>Select Fee Categories
                                                        <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <select name="fee_category_id" id="role" required=""
                                                            class="form-control">
                                                            <option value="" selected="" disabled="">
                                                                Select Fee
                                                                Categories</option>
                                                            @foreach ($fee_categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <h5>Select Class Categories
                                                                <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <select name="class_id[]" id="role" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">
                                                                        Select Class
                                                                        Categories</option>
                                                                    @foreach ($classes as $cls)
                                                                        <option value="{{ $cls->id }}">
                                                                            {{ $cls->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <h5>Fee Amount <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="amount[]" class="form-control">

                                                                {{-- @error('name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="padding-top: 25px">
                                                        <span class="btn btn-success addevenrmore">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </span>
                                                    </div>

                                                </div>
                                            </div> <!-- Add Item close div -->
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Select Class Categories
                                <span class="text-danger">*</span>
                            </h5>
                            <div class="controls">
                                <select name="class_id[]" id="role" required="" class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Class
                                        Categories</option>
                                    @foreach ($classes as $cls)
                                        <option value="{{ $cls->id }}">
                                            {{ $cls->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Fee Amount <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="amount[]" class="form-control">

                                {{-- @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                        </div>
                    </div>
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
