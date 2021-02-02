@extends('layouts.master')
@section('page-title','Appearance')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Pages</a></li>
    <li class="breadcrumb-item active">Quick Links</li>
@endsection    
                            
@section('content') 
<style type="text/css">
    .file-drop-area {
    position: relative;
    display: flex;
    align-items: center;
    max-width: 100%;
    padding: 25px;
    border: 1px dashed rgba(255, 255, 255, 0.4);
    border-radius: 3px;
    transition: .2s
}

.choose-file-button {
    flex-shrink: 0;
    background-color: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    padding: 8px 15px;
    margin-right: 10px;
    font-size: 12px;
    text-transform: uppercase
}

.file-message {
    font-size: small;
    font-weight: 300;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}

.file-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    widows: 100%;
    cursor: pointer;
    opacity: 0
}
</style>
<link href="{{ asset('app-assets/css/jodit.min.css') }}" rel="stylesheet">
<div class="content-body">
    <div class="container-fluid">
            @if(session('msg'))
                  {!! session('msg') !!}
                @endif
            <!-- Photos -->
            <div class="card form-group">
              <div class="card-body">
                <div class="row mb-2">
                    <div class="col-9">
                        <h4>Edit Quick-Links Custom Pages</h4>
                    </div>
                </div>
                <?php $page = \App\Page::find($id); ?>
<form class="form-horizontal" action="{{route('admin.quicklinks.update' , $id)}}" method="POST" enctype="multipart/form-data">
                @method('patch')
            	@csrf
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="title">Title</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Title" id="title" name="title" class="form-control" value="{{$page->title}}" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="slug">Slug</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="your-slug" id="slug" name="slug" class="form-control" value="{{$page->slug}}" required>
                            <small><code>http://domain.com/your-slug</code> Only a-z, numbers, hypen allowed</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="content">Content</label>
                        <div class="col-sm-9">
                            <textarea class="editor" name="content" required>{{$page->content}}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="slug">Meta Title</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Meta Title" id="meta_title" name="meta_title" class="form-control" value="{{$page->meta_title}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="meta_description">Meta Description</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Meta Description" id="meta_description" name="meta_description" class="form-control" value="meta_description">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="keywords">Keywords</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Keywords" id="keywords" name="keywords" class="form-control" value="{{$page->keywords}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="meta_image">Meta Image <small>(200x300)</small></label>
                        <div class="col-sm-9">
                            <div class="row px-1 pb-2 pt-1">
                                <div class="border col-sm-3  text-center">
                                    <div class="file-drop-area">

                                        <div id="div_header_logo">
                                            @if($page->meta_image == "")
                                            <div class="ml-2"><h3><i class="feather icon-image"></i></h3>No Logo</div>
                                            @else
                                            <img src="{{url($page->meta_image)}}" width="70px">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class=" border col-sm-9">
                                    <div class="file-drop-area"> <span class="choose-file-button"><u class="text-primary"><i class="feather icon-upload"></i> Choose File</u></span> <span class="file-message">or drag and drop files here</span>
                                        <input type="file" class="file-input" name="meta_image" id="meta_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="text-right">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@push('scripts')
  <script src="{{ asset('app-assets/js/scripts/editors/jodit.min.js')}}"></script>
  <script type="text/javascript">
      $(".editor").each(function (el) {
        var $this = $(this);
        var buttons = $this.data("buttons");
        buttons = !buttons
            ? "bold,underline,italic,hr,|,ul,ol,|,align,paragraph,|,image,table,link,undo,redo"
            : buttons;

        var editor = new Jodit(this, {
            uploader: {
                insertImageAsBase64URI: true,
            },
            toolbarAdaptive: false,
            defaultMode: "1",
            toolbarSticky: false,
            showXPathInStatusbar: false,
            buttons: buttons,
        });

    });
            var _URL = window.URL;
      $("#meta_image").change(function () {
    var file, img;
    var object = $(this);
    var textbox = $(this).prev();
    var filesCount = $(this)[0].files.length;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 40 || this.width > 200){
                alert("Please Upload Logo of size 200x40")
                $("#meta_image").val(''); 
            }
            else{
                gothere5();
            }
        };
        img.src = _URL.createObjectURL(file);
    }
function gothere5(){
if (filesCount === 1) {
var fileName = object.val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
if (typeof (FileReader) != "undefined") {
var dvPreview = $("#div_header_logo");

$(object[0].files).each(function () {

var file = $(this);
var reader = new FileReader();
reader.onload = function (e) {
    dvPreview.html("");
var img = $("<img />");
img.attr("style", "width: 120px; padding: 10px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
});
} else {
alert("This browser does not support HTML5 FileReader.");
}
}

});
  </script>
  @endpush
@endsection