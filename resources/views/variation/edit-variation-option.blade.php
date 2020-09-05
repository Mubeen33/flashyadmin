@extends('layouts.master')
@section('page-title','Add Variations')
@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
@endsection    
@section('content')         
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form action="{{route('admin.updateVariationOption.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$variantOption->id}}">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Add Variation</b></h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Select Variation</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="variation_id" required>
                                                                        <option selected="">Select Variation</option>
                                                                        @foreach($variations as $variation)
                                                                            @if($variantOption->variation_id == $variation->id)
                                                                                <option value="{{$variation->id}}" selected>{{$variation->variation_name}}</option>
                                                                            @else
                                                                                <option value="{{$variation->id}}">{{$variation->variation_name}}</option>
                                                                            @endif    
                                                                        @endforeach    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Option Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="option_name" class="form-control" required="" value="{{ $variantOption->option_name}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-11"></div>
                                                            <button class="btn btn-primary" type="submit">Submit</button>
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
{{-- <script>

    function get_subcategories(category_id, data_select_id) {

        //reset subcategories
        $('.subcategory-select').each(function () {
            if (parseInt($(this).attr('data-select-id')) > parseInt(data_select_id)) {
                $(this).remove();
            }
        });
        
    // ajax function for subcategories

        $.ajax({

            headers: {
                 'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                 },
            method  : 'POST',
            url     : "{{url('get_subcategories')}}/"+category_id,
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
    
</script>  --}}          
@endsection       
