@extends('layouts.master')
@section('page-title','Edit Category')
@push('styles')
<style type="text/css">
   .border-danger-alert{
   border:1px solid red;
   }
</style>
@endpush
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active"><a href="#">Edit Category</a></li>
@endsection    
@section('content')   

@include('msg.msg')
<div class="content-body">
   <section id="basic-horizontal-layouts">
      <form id="edit_categoryForm" action="{{route('admin.updateCategory.post')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="row match-height">
            <div class="col-md-12 col-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title"><b>Edit Category</b></h4>
                  </div>
                  <div class="card-content">
                     <div class="card-body">
                        <div class="form-body">
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group row">
                                    <div class="col-md-2">
                                       <span>Category Name</span>
                                    </div>
                                    <div class="col-md-4">
                                       <input type="hidden" id="name"  class="form-control" name="id" value="{{$categories->id}}">
                                       <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" id="name2"  class="form-control" name="name" value="{{$categories->name}}">
                                       <small class="place-error--msg text-danger"></small>
                                    </div>
                                    <div class="col-md-2">
                                       <span>Slug</span>
                                    </div>
                                    <div class="col-md-4">
                                       <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" id="slug"  class="form-control" name="slug" value="{{$categories->slug}}" >
                                       <small class="place-error--msg text-danger"></small>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="col-12">
                                 <div class="form-group row">
                                    <div class="col-md-2">
                                       <span>Title(meta tag)</span>
                                    </div>
                                    <div class="col-md-4">
                                       <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" id="title"  class="form-control" name="title" value="{{$categories->title_meta_tag}}" >
                                       <small class="place-error--msg text-danger"></small>
                                    </div>
                                    <div class="col-md-2">
                                       <span>Keywords(meta tag)</span>
                                    </div>
                                    <div class="col-md-4">
                                       <input type="text" id="keyword"  class="form-control" name="keyword" value="{{$categories->keywords}}" >
                                    </div>
                                    
                                 </div>
                              </div>
                              
                              <div class="col-12">
                                 <div class="form-group row">
                                    <div class="col-md-2">
                                       <span>Descripation(meta tag)</span>
                                    </div>
                                    <div class="col-md-10">
                                       <input type="text" id="desc"  class="form-control" name="desc" value="{{$categories->description}}" >
                                       <small class="place-error--msg text-danger"></small>
                                    </div> 
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="form-group row">
                                    <div class="col-md-2">
                                       <span>Order</span>
                                    </div>
                                    <div class="col-md-4">
                                       <input style="width: 100%;" is-required='true' onclick="removeErrorLevels($(this), 'input')" type="number" min="1" id="order"  class="form-control" name="order" value="{{$categories->category_order}}"  value="1">
                                       <small class="place-error--msg text-danger"></small>
                                    </div>
                                    <div class="col-md-2">
                                       <span>Homepage order</span>
                                    </div>
                                    <div class="col-md-4">
                                       <input style="width: 100%;" type="number" min="1" id="home_order"  class="form-control" name="home_order" value="{{$categories->homepage_order}}" value="1">
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="col-12">
                                 <div class="form-group row">
                                    <div class="col-md-2">
                                       <span>Parent Category</span>
                                    </div>
                                    <div class="col-md-4">
                                       <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="parent_id[]" onchange="get_subcategories(this.value, 0);">
                                          >
                                          <option value="">None</option>
                                          @foreach ($parentCategories as $category)
                                          @if($category->id != $categories->id)
                                          @if (!empty($parent_categories_array[0]) && $category->id == $parent_categories_array[0]->id)
                                          <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                          @else
                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                          @endif  
                                          @endif 
                                          @endforeach
                                       </select>
                                       <small class="place-error--msg"></small>
                                       <div id="subcategories_container">
                                          @if (!empty($parent_categories_array))
                                          @for($i = 1; $i < count($parent_categories_array); $i++)
                                          @if (!empty($parent_categories_array[$i]))
                                          @php
                                          $subcategories = \App\Category::where([['id','!=',$categories->id],['parent_id','=',$parent_categories_array[$i]->parent_id]])->get();
                                          @endphp
                                          @if(!empty($subcategories))
                                          <select name="parent_id[]" class="form-control subcategory-select" data-select-id="{{$i}}" onchange="get_subcategories(this.value,'{{$i}}');">
                                             <option value="">None</option>
                                             @foreach ($subcategories as $subcategory)
                                             <option value="{{ $subcategory->id }}" <?php echo ($subcategory->id == $parent_categories_array[$i]->id) ? 'selected' : ''; ?>><?php echo $subcategory->name; ?></option>
                                             @endforeach
                                          </select>
                                          @endif
                                          @endif
                                          @endfor
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <span id="label_commission">Category Commission</span>
                                    </div>
                                    <div class="col-md-4">
                                       <input style="width: 100%;" is-required='true' type="number" min="1" value="1" id="commission"  class="form-control" name="commission" placeholder="Order" value="{{$categories->commission}}">
                                       <small class="place-error--msg text-danger"></small>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="col-12">
                                 <div class="form-group row">
                                    <div class="col-md-2">
                                       <span>Category Image</span>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="custom-file">
                                          <input type="file" onchange="previewFile(this);" name="image" class="custom-file-input" id="inputGroupFile01">
                                          <label id="custom-image-label" class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                       </div>
                                       <span class="text text-danger" id="error"></span>
                                       <span><img class="preview--file" id="previewImg" width="100" src="{{ $categories->image }}"></span>
                                       <input type="hidden" id="image"  class="form-control" name="image" value="">
                                    </div>
                                    <div class="col-md-2">
                                       <span>Visibilty</span>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="custom-control custom-radio" style="display: inline; margin-right: 5%;">
                                          <input type="radio" class="custom-control-input" value="1" {{ $categories->visibility == 1 ? 'checked' : '' }} name="visiblity" id="customRadio6">
                                          <label class="custom-control-label" for="customRadio6">Yes</label>
                                       </div>
                                       <div class="custom-control custom-radio" style="display: inline; margin-right: 5%;">
                                          <input type="radio" class="custom-control-input" value="0" {{ $categories->visibility == 0 ? 'checked' : '' }} name="visiblity" id="customRadio5">
                                          <label class="custom-control-label" for="customRadio5">No</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="col-12">
                                 <div class="form-group row">
                                    <div class="col-md-2">
                                       <span>show on Homepage</span>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="custom-control custom-radio" style="display: inline; margin-right: 5%;">
                                          <input type="radio" class="custom-control-input" value="1" {{ $categories->show_on_homepage == 1 ? 'checked' : '' }} name="home_visiblity" id="customRadio4">
                                          <label class="custom-control-label" for="customRadio4">Yes</label>
                                       </div>
                                       <div class="custom-control custom-radio" style="display: inline; margin-right: 5%;">
                                          <input type="radio" class="custom-control-input" value="0" {{ $categories->show_on_homepage == 0 ? 'checked' : '' }} name="home_visiblity" id="customRadio3">
                                          <label class="custom-control-label" for="customRadio3">No</label>
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <span>Show Category on navigation</span>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="custom-control custom-radio" style="display: inline; margin-right: 5%;">
                                          <input type="radio" class="custom-control-input" value="1" {{ $categories->show_image_nav == 1 ? 'checked' : '' }} name="image_visiblity" id="customRadio1">
                                          <label class="custom-control-label" for="customRadio1">Yes</label>
                                       </div>
                                       <div class="custom-control custom-radio" style="display: inline; margin-right: 5%;">
                                          <input type="radio" class="custom-control-input" value="0" {{ $categories->show_image_nav == 0 ? 'checked' : '' }} name="image_visiblity" id="customRadio2">
                                          <label class="custom-control-label" for="customRadio2">No</label>
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                               <div class="col-md-12" style="text-align: right;">
                                 <button class="btn btn-warning submit-btn"  type="submit">Update</button>
                              </div>
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
<script>
   //image upload validation
   
       function previewFile(input){
           var _URL = window.URL || window.webkitURL;
           var file = $("input[type=file]").get(0).files[0];
   
              img = new Image();
              var imgwidth = 0;
              var imgheight = 0;
              var maxwidth = 170;
              var maxheight = 170;
              img.src = _URL.createObjectURL(file);
                 img.onload = function() {
                  imgwidth = this.width;
                  imgheight = this.height;
              
           if(imgwidth == maxwidth && imgheight == maxheight){
   
               $('#error').html(null);
               $('.submit-btn').prop('disabled', false);
               if(file){
                   var reader = new FileReader();
        
                   reader.onload = function(){
                       $("#previewImg").attr("src", reader.result);
                   }
        
                   reader.readAsDataURL(file);
               }
           }
           else{
   
               $('#error').html('Required image is 170X170');
               $('.submit-btn').prop('disabled', true);
   
           }
         }  
       }
   // end image uploade
   
   // function for subcategories 
   
       function get_subcategories(category_id,data_select_id){
   
           // commission on category base.
   
               getCommission(category_id);
   
           // end comission
   
           //reset subcategories
   
           $('.subcategory-select').each(function () {
               if (parseInt($(this).attr('data-select-id')) > parseInt(data_select_id)) {
                   $(this).remove();
               }
           });
           // ajax function for subcategories 
               if (category_id == null) {
   
                   return false;
               }
               else{
   
                   $.ajax({
   
                       headers: {
                            'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                            },
                       method  : 'POST',
                       url     : "{{url('get_subcategories')}}/"+category_id,
                       data    : {"_token": "{{ csrf_token() }}","category_id":category_id},
                       success : function(subcategories){
   
                           // console.log(subcategories);
                          $('#subcategories_container').append(subcategories); 
                           
                       }
                   });
               }          
   
       }
   
   //  commission function 
       
       function getCommission(category_id){
   
           $.ajax({
   
               headers: {
                    'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                    },
               method  : 'POST',
               url     : "{{url('get_categories_commission')}}/"+category_id,
               data    : {"_token": "{{ csrf_token() }}","category_id":category_id},
               success : function(commission){
   
                   // console.log(commission);
   
                       if (category_id == null) {
   
                           return false;
                       }else{
   
                           $('#label_commission').html('Default Category Commission<span class="text text-danger">(You can edit it.)</span>');
                           $('#commission').val(commission);
   
                       } 
               }
           });
       } 
</script>
@endsection



@push('scripts')
<script type="text/javascript">
   $(document).ready(function(){
       $("#edit_categoryForm").on('submit', function(e){
           formClientSideValidation(e, "edit_categoryForm", 'yes');
       })
   })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush