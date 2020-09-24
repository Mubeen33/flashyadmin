<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Product List - Flashybuy</title>

    <style>
      .document--body{
        margin: 0px;
        padding: 10px;
      }
      .main--content{}
      .header-part{
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 3px solid #ddd
      }
      .header-part h2{
        padding: 0;
        margin: 0;
      }
      .logo{
        text-align: center;
        margin-bottom: 10px
      }


      .data--list{
        padding-top: 50px;
      }
      .data--list table{
        width: 100%;
        text-align: center;
      }
      .data--list table thead{
        background: #565656;
      }
      .data--list table thead th{
        color: #fff;
        padding: 5px 2px;

      }
      .data--list table tbody tr td{
        font-size: 14px;
        border-bottom: 1px solid #ddd;
        padding: 5px 2px;
      }
      /* 
      thead {display: table-header-group;}
      tfoot {display: table-header-group;} 
      */
    </style>
  </head>
  <body>

    <div class="document--body">

      <div class="main--content">
        <div class="header-part">
          <div class="logo">
            <img height="32px" width="156px" src="{{ public_path('assets/logo.png') }}">
          </div>

          <h2>Product List</h2>
          <span>
            <small>Export Date : <?php echo date('d/m/Y H:m');?></small>
          </span>
        </div> <!-- .header-part end here -->
      </div> <!-- .main--content end here -->

      <div style="clear:both"></div>

      <div class="data--list">

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Category</th>
              <th>Description</th>
              <th>Image</th>
              <th>Product Type</th>
              <th>SKU</th>
            </tr>
          </thead>

          <tbody>
          @foreach($data as $key=>$content)
            <tr>
              <td>{{$content->id}}</td>
              <td>{{$content->title}}</td>
              <td>{{$content->get_category->name}}</td>
              <td>{{\Str::words($content->description, '20')}}</td>
              <td>
                @if(!$content->get_images->isEmpty())
                  <?php
                    foreach($content->get_images as $key_img=>$image){
                      if($key_img == 0){
                        echo "<a title='Click to view Image' href='".$image->image."'>Product Image</a>";
                        break;
                      }
                    }
                  ?>
                @endif
              </td>
              <td>{{$content->product_type}}</td>
              <td>{{$content->sku}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>

      </div> <!-- .data--list end here -->

      <div style="clear:both"></div>
     </div> <!--.document--body end here -->

  </body>
</html>