@extends('layouts.master')
@section('page-title','Add CustomFeilds')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
@endpush

@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Custom Feilds</a></li>
@endsection 
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('app-assets/vendors/css/jquery.tagsinput-revisited.css')}}" rel="stylesheet" type="text/css">   
@section('content')
    @include('msg.msg')
            <div class="content-body">
                <section id="basic-horizontal-layouts">
                    <form id="addCustomFields_from" action="{{route('admin.addProductWarranty.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row match-height">
                                   
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Add Products Warranty</b><button type="button" class="btn btn-sm btn-warning" style="left: 15px;position: relative;"><a href="{{route('admin.productWarranty.get')}}" style="text-decoration: none;color: #fff">Products Warranty</a></button> </h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-2">
                                                                    <span>Parent Category</span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="parent_id[]" onchange="get_subcategories(this.value, 0);">
                                                                        <option value="">none</option>
                                                                        @foreach($parentCategory as $category)
                                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach    
                                                                    </select>
                                                                    <small class="place-error--msg"></small>
                                                                    <div id="subcategories_container"></div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <span>Parent Warranties</span>
                                                                </div>
                                                                <div class="col-md-4">    
                                                                    <input type="text" class="form-control tagsInput" data-role="tagsinput" name="warranty" placeholder="Enter choice values">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-3" style="margin-left: 4%; text-align: right;"> <button class="btn btn-warning" type="submit">Submit</button></div>
                                                           
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>    
                </section>
            </div>

        
@endsection



@push('scripts')
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/jquery.tagsinput.js')}}"></script>
<script>

    $('.tagsInput').tagsInput('items');
    function get_subcategories(category_id, data_select_id) {

        //reset subcategories
        $('.subcategory-select').each(function () {
            if (parseInt($(this).attr('data-select-id')) > parseInt(data_select_id)) {
                $(this).remove();
            }
        });
        

        $.ajax({

            headers: {
                 'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                 },
            method  : 'POST',
            url     : "{{url('admin/get_subcategories')}}/"+category_id,
            data    : {"_token": "{{ csrf_token() }}","category_id":category_id},
            success : function(subcategories){

                // console.log(subcategories);
                if (category_id == null) {

                    return false;
                }else{

                    $('#subcategories_container').append(subcategories);
                }
                
            }
        });
        
        
        
    }
    
</script>

@endpush  
