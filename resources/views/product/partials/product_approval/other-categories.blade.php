<?php
	$otherCategories = NULL;
	if ($other_categories && $other_categories->other_categories !== NULL) {
		$otherCategories = json_decode($other_categories->other_categories, true);
	}


?>

<select class="form-control select2" name="categories[]"  multiple="multiple" >
@foreach($categories as $category)
   <option value="{{$category->id}}"
   	@if($otherCategories !== NULL && in_array($category->id, $otherCategories)) selected @endif
   	>{{$category->name}}</option>
@endforeach
</select>