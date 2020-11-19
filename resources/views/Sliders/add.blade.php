@extends('layouts.master')
@section('page-title','Create Slider')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush


@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Slider Create</li>
@endsection    
@section('content')
        @include('msg.msg')                               
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Slider</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form id="slider__form" action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" onclick="removeErrorLevels($(this), 'input')" name="title" placeholder="Order" class="form-control">
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div>   
                                        
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Descriptiont</label>
                                                <input type="text" onclick="removeErrorLevels($(this), 'input')" name="description" placeholder="Button Text" class="form-control">
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Order</label>
                                                <input type="number" onclick="removeErrorLevels($(this), 'input')" name="order_no" placeholder="Order" class="form-control">
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div>   
                                        
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Button Text</label>
                                                <input type="text" onclick="removeErrorLevels($(this), 'input')" name="button_text" placeholder="Button Text" class="form-control">
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div>

                                    </div>     

                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Text Color</label>
                                            <input type="color" onclick="removeErrorLevels($(this), 'input')" name="text_color" placeholder="Text Color" class="form-control">
                                            <small class="place-error--msg"></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Button Color</label>
                                            <input type="color" onclick="removeErrorLevels($(this), 'input')" name="button_color" placeholder="Button Color" class="form-control">
                                            <small class="place-error--msg"></small>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Button Text Color</label>
                                            <input type="color" onclick="removeErrorLevels($(this), 'input')" name="button_text_color" placeholder="Button Text Color" class="form-control">
                                            <small class="place-error--msg"></small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div>
                                        <label>Animations</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="title_animation">
                                                    <option value="fadeInUp">fadeInUp</option>
                                                </select>
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="description_animation">
                                                    <option value="fadeInUp">fadeInUp</option>
                                                </select>
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Button</label>
                                                <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="button_animation">
                                                    <option value="fadeInUp">fadeInUp</option>
                                                </select>
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <label>Image (Size: 1230 * 445)</label>
                                            <input onchange="previewFile('image_lg_input', 'previewImg_lg');" type="file" id="image_lg_input" name="image_lg" class="d-none" accept="image/*">
                                            <br>
                                            <button class="btn btn-success" type="button" 
                                                onclick="document.getElementById('image_lg_input').click()" 
                                            >Image</button>
                                            <div>
                                                <br>
                                                <span><img class="d-none preview--file" id="previewImg_lg" width="200px" height="100px" src=""></span>
                                            </div>
                                            <small class="place-error--msg"></small>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label>Image for mobile (Size: 600 * 300)</label>
                                            <input is-required='true' onchange="previewFile('image_sm_input', 'previewImg_sm');" type="file" id="image_sm_input" name="image_sm" class="d-none" accept="image/*">
                                            <br>
                                            <button class="btn btn-success" type="button" 
                                                onclick="document.getElementById('image_sm_input').click()" 
                                            >Image</button>
                                            <div>
                                                <br>
                                                <span><img class="d-none preview--file" id="previewImg_sm" width="150px" height="80px" src=""></span>
                                            </div>
                                            <small class="place-error--msg text-danger"></small>
                                        </div>
                                            <small class="place-error--msg"></small>
                                        </div>
                                    </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Slider Type</label>
                                                <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="slider_type">
                                                    <option value="Product">Product Slider</option>
                                                    <option value="Deal">Deal Slider</option>
                                                </select>
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Select a Date Range (Format: Month/Day/Year)</label>
                                                <input type="text" class="form-control" name="daterange" id="date-ranger" />
                                                <!-- <input onclick="removeErrorLevels($(this), 'input')" type="date" name="start_time" class="form-control"> -->
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <input onclick="removeErrorLevels($(this), 'input')" type="date" name="end_time" class="form-control">    
                                                <small class="place-error--msg"></small>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-warning" type="submit">Add</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script type="text/javascript">

    function previewFile(inputID, previewID){
        var file = $("#"+inputID).get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#"+previewID).attr("src", reader.result);
                $("#"+previewID).removeClass("d-none");
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>



<script type="text/javascript">
    $("#slider__form").on('submit', function(e){
        formClientSideValidation(e, "slider__form", 'yes');
    })


    $(function() {

        var dateString = moment().format("DD/MM/YYYY");

        $('#date-ranger').daterangepicker({
            opens: 'center',
            startDate: dateString,
            endDate: dateString,
            minDate: dateString
        }, 
        function(start, end, label) {
            console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
        });
});
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@endpush