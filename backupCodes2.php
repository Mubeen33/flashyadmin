<?php
    $otherCategories = NULL;
    if ($other_categories) {
        $arr_other_categories = json_decode($other_categories, true);
        
        foreach ($arr_other_categories as $key => $value) {
            if ($arr_other_categories->other_categories !== NULL) {
                $otherCategories = $arr_other_categories->other_categories;
            }
        }
    }


?>

<select class="form-control select2" name="categories[]"  multiple="multiple" >
@foreach($categories as $category)
   <option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
</select>