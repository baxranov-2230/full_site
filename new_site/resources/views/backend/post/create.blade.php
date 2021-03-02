@extends('admin.admin_master')

@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">

                                <img src="  {{asset('backend/assets/images/dashboard/Group126@2x.png')}}"
                                     class="gradient-corona-img img-fluid" alt="">
                            </div>
                            <div class="col-5 col-sm-7 col-xl-8 p-0">
                                <h4 class="mb-1 mb-sm-0">Welcome to Easy</h4>
                            </div>
                            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="{{url('/')}}" target="_blank"
                             class="btn btn-outline-light btn-rounded get-started-btn">Frontend</a>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Post Insert</h4>

                    {{--    TITLE--}}
                    <form class="forms-sample">
                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Title English</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="title_en">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Title Uzbek</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="title_uz">
                            </div>
                        </div>

                        {{--                   CATEGORY AND SUBCATEGORY--}}
                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Category</label>
                                <select class="form-control" id="exampleSelectGender" name="category_id">
                                    <option disabled="" selected="">--Select Category--</option>
                                    @foreach($category as $row)
                                        <option value="{{$row->id}}">{{$row->category_en}}
                                            | {{$row->category_uz}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">SubCategory</label>
                                <select class="form-control" name="subcategory_id"
                                id="subcategory_id">
                                    <option disabled="" selected="">--Select SubCategory--</option>
                                </select>
                            </div>
                        </div>

                        {{--                                DISTRICT--}}

                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">District</label>
                                <select class="form-control" id="exampleSelectGender" name="district_id">
                                    <option disabled="" selected="">--Select District--</option>
                                    @foreach($district as $row)
                                        <option value="{{$row->id}}">{{$row->district_en}}
                                            | {{$row->district_uz}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">SubDistrict</label>
                                <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                                    <option selected="" disabled="">--Select SubDistrict--</option>

                                </select>
                            </div>
                        </div>


                        {{--                        IMAGE--}}
                        <div class="form-group">
                            <label for="exampleForControlFile1">New Image Upload</label>
                            <input type="file" class="form-control-file" id="exampleForControlFile1" name="image">
                        </div>

                        {{--                        TAGS--}}

                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Tags English</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="tags_en">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Taga Uzbek</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="tags_uz">
                            </div>
                        </div>


                        {{--                            DETALIS--}}
                        <div class="form-group">
                            <label for="exampleTextarea1">Details English</label>
                            <textarea class="form-control" name="details_en" id="summernote"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Details Uzbek</label>
                            <textarea class="form-control" name="details_uz" id="summernote1"></textarea>
                        </div>

                        <hr>
                        <h4 class="text-center">Extra Option</h4>
                        <br>
                        <div class="row">
                            <div class="form-check col-md-3">
                                <label class="form-check-label">
                                    <input type="checkbox" name="headline" class="form-check-input"> Headline <i
                                        class="input-helper"></i></label>
                            </div>
                            <div class="form-check col-md-3">
                                <label class="form-check-label">
                                    <input type="checkbox" name="bigthumbnail" class="form-check-input"> General Big
                                    Thhumbnail <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check col-md-3">
                                <label class="form-check-label">
                                    <input type="checkbox" name="first_section" class="form-check-input"> First Section
                                    <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check col-md-3">
                                <label class="form-check-label">
                                    <input type="checkbox" name="first_section_thumbnail" class="form-check-input">
                                    First Section Thhumbnail
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        {{--This is for Category--}}
        <script type="text/javascript">
            $(document).ready(function () {
                $('select[name="category_id"]').on('change', function () {
                    var category_id = $(this).val();
                    if (category_id) {
                        $.ajax({
                            url: "{{  url('/get/subcategory/') }}/" + category_id,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $("#subcategory_id").empty();
                                $.each(data, function (key, value) {
                                    $("#subcategory_id").append('<option value="' + value.id + '">' + value.subcategory_en + '</option>');
                                });
                            },

                        });
                    } else {
                        alert('danger');
                    }
                });
            });
        </script>

        {{--This is for Category--}}
        <script type="text/javascript">
            $(document).ready(function () {
                $('select[name="district_id"]').on('change', function () {
                    var district_id = $(this).val();
                    if (district_id) {
                        $.ajax({
                            url: "{{  url('/get/subdistrict/') }}/" + district_id,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $("#subdistrict_id").empty();
                                $.each(data, function (key, value) {
                                    $("#subdistrict_id").append('<option value="' + value.id + '">' + value.subdistrict_en + '</option>');
                                });
                            },

                        });
                    } else {
                        alert('danger');
                    }
                });
            });
        </script>

@endsection
