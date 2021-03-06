@extends('layouts.master')
@section('page-title','Appearance')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Pages</a></li>
    <li class="breadcrumb-item active">Business</li>
@endsection    
                            
@section('content') 
<link href="{{ asset('app-assets/css/upload-image.css') }}" rel="stylesheet">
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
                        <h4>Create Business Custom Pages</h4>
                    </div>
                </div>
<form class="form-horizontal" action="{{route('admin.business.store')}}" method="POST" enctype="multipart/form-data">
            	@csrf
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="title">Title</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Title" id="title" name="title" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="slug">Slug</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="your-slug" id="slug" name="slug" class="form-control" required>
                            <small><code>http://domain.com/your-slug</code> Only a-z, numbers, hypen allowed</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="content">Content</label>
                        <div class="col-sm-9">
                            <textarea class="editor" name="content" required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="slug">Meta Title</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Meta Title" id="meta_title" name="meta_title" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="meta_description">Meta Description</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Meta Description" id="meta_description" name="meta_description" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="keywords">Keywords</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Keywords" id="keywords" name="keywords" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label" for="meta_image">Meta Image <small>(200x300)</small></label>
                        <div class="col-sm-9">
                            <div class="row px-1 pb-2 pt-1">
                                <div class="border col-sm-3  text-center">
                                    <div class="file-drop-area">
                                        <div id="div_meta_image">
                                            <div><h3><i class="feather icon-image"></i></h3>No Logo</div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" border col-sm-9">
                                    <div class="file-drop-area"> <span class="choose-file-button"><u class="text-primary"><i class="feather icon-upload"></i> Choose File</u></span> <span class="file-message">or drag and drop files here</span> 
                                        <input type="file" class="file-input" name="meta_image" id="meta_image"> </div>
                                </div>
                            </div>
                            <!-- <input type="file" id="meta_image" name="meta_image" class="form-control"> -->
                        </div>
                    </div>
                <div class="text-right">
                    <button class="btn btn-primary" type="submit">Add New</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@push('scripts')
  <script src="{{ asset('app-assets/js/scripts/editors/jodit.min.js')}}"></script>
  <script src="{{ asset('js/upload-image.js')}}"></script>
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
  </script>
  @endpush
@endsection