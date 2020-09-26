<table>
	<thead>
		<tr>
			<th style="background-color: #ddd;border-bottom: 2px solid #444444">ID</th>
			<th style="background-color: #ddd;border-bottom: 2px solid #444444">Title</th>
			<th style="background-color: #ddd;border-bottom: 2px solid #444444">Category</th>
			<th style="background-color: #ddd;border-bottom: 2px solid #444444">Description</th>
			<th style="background-color: #ddd;border-bottom: 2px solid #444444">Image</th>
			<th style="background-color: #ddd;border-bottom: 2px solid #444444">Product Type</th>
			<th style="background-color: #ddd;border-bottom: 2px solid #444444">SKU</th>
		</tr>
	</thead>
    <tbody>
    @foreach($data as $content)
    <tr>
         <td>{{$content->id}}</td>    
         <td>{{$content->title}}</td>    
         <td>{{$content->get_category->name}}</td>    
         <td>{{$content->description}}</td>    
         <td>
         	@if(!$content->get_images->isEmpty())
         		@foreach($content->get_images as $key_img=>$image)
         			@if($key_img == 0)
         				{{$image->image}}
         			@endif
         		@endforeach
         	@endif
         </td>
         <td>
         	{{$content->product_type}}
         </td>
         <td>
         	{{$content->sku}}
         </td>   
	</tr>
    @endforeach
    </tbody>
</table>