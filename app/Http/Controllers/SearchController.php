<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;




class SearchController extends Controller

{

   public function index()

{

return view('search');

}



public function search(Request $request)

{

if($request->ajax())

{

$output="";

$products=DB::table('images')->where('title','LIKE','%'.$request->search."%")->get();

if($products)

{

foreach ($products as $key => $product) {

$output.='<tr>'.

'<td>'.$product->id.'</td>'.
'<td><a href="/images/slider/'.$product->desktop_image.'"><img src="/images/slider/'.$product->desktop_image.'" style="width: 100px;border-radius: 5px; padding: 5px; box-shadow: 0px 0px 5px #7d73ff7a;"></a></td>'.

'<td>'.$product->language.'</td>'.

'<td>'.$product->order.'</td>'.
// '<td><div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 8px 20px;"> Action </button> <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a href="javascript:void(0)" class="dropdown-item" id="edit" onclick="update_item("'.$s->id.'");">Edit</a> <a class="dropdown-item" href="/'.$s->id.'/delete/slider" onclick="delete_item("'.$s->id.'");">Delete</a> </div> </div>'.'</td>'.

// '<td>'.$product->price.'</td>'.

'</tr>';

}



return Response($output);



   }



   }



}

}