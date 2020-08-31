    
    <div class="form-group">
        <label>Text Line One</label>
        <textarea class="form-control" rows="5" cols="5" name="text_line_one" placeholder="Text line one">@if(isset($data)){{$data->text_line_one}}@endif</textarea>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Button Text</label>
                <input type="text" name="button_text" placeholder="Button text" class="form-control" value="@if(isset($data)){{$data->button_text}}@endif">
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Button Link</label>
                <input type="text" name="button_link" placeholder="Button link" class="form-control" value="@if(isset($data)){{$data->button_link}}@endif">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Text Line Two</label>
        <textarea class="form-control" rows="5" cols="5" name="text_line_two" placeholder="Text line two">@if(isset($data)){{$data->text_line_two}}@endif</textarea>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Facebook URL</label>
                <input type="url" name="facebook_url" placeholder="Facebook URL" class="form-control" value="@if(isset($data)){{$data->facebook_url}}@endif">
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Twitter URL</label>
                <input type="url" name="twitter_url" placeholder="Twitter URL" class="form-control" value="@if(isset($data)){{$data->twitter_url}}@endif">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Linkedin URL</label>
                <input type="url" name="linkedin_url" placeholder="Linkedin URL" class="form-control" value="@if(isset($data)){{$data->linkedin_url}}@endif">
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Youtube URL</label>
                <input type="url" name="youtube_url" placeholder="Pinterest URL" class="form-control" value="@if(isset($data)){{$data->youtube_url}}@endif">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Instagram URL</label>
                <input type="url" name="instagram_url" placeholder="Instagram URL" class="form-control" value="@if(isset($data)){{$data->instagram_url}}@endif">
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Pinterest URL</label>
                <input type="url" name="pinterest_url" placeholder="Pinterest URL" class="form-control" value="@if(isset($data)){{$data->pinterest_url}}@endif">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Top Banner (Size width:1200px & Height:200px)</label>
                <input type="file" name="top_banner" class="form-control">
                <div>
                    @if(isset($data) && $data->top_banner != NULL)
                        <label>Current</label><br>
                        <img src="{{$data->top_banner}}" width="200px" height="80px">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Footer Banner (Size width:1200px & Height:200px)</label>
                <input type="file" name="footer_banner" class="form-control">
                <div>
                    @if(isset($data) && $data->footer_banner != NULL)
                        <label>Current</label><br>
                        <img src="{{$data->footer_banner}}" width="200px" height="80px">
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label>Footer Text</label>
        <textarea class="form-control" rows="5" cols="5" name="footer_text" placeholder="Footer text">@if(isset($data)){{$data->footer_text}}@endif</textarea>
    </div>

