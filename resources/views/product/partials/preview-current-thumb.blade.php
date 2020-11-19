@foreach($currentImages as $key=>$image)
  @if($key == $serialNumber)
  <div id="preview--{{$serialNumber}}" class="dz-preview dz-complete dz-image-preview dz-processing">
      <div class="dz-image">
        <img data-dz-thumbnail="" style="height: 188px;width: 178px;" alt="" src="{{$image->image}}">
      </div>
      <div class="dz-details">
        <div class="dz-size" data-dz-size=""><strong>0.1</strong> MiB</div>
        <div class="dz-filename">
        <span data-dz-name=""></span>
        </div>
      </div>
      <div class="dz-progress">
        <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span>
      </div>
      <div class="dz-error-message">
        <span data-dz-errormessage=""></span>
      </div>
      <a class="dz-set-default bg-danger" href="#" data-dz-remove=""
        onclick="document.getElementById('preview--{{$serialNumber}}').remove()">
        <i class="fa fa-times"></i>
      </a>
    <span class="filenameofdropzone"></span>
  </div>
  @endif
  @endforeach