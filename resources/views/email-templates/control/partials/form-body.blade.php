    <div class="form-group">
        <label>Subject Line</label>
        <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" name="subject_line" class="form-control" value="@if(isset($data)){{$data->subject_line}}@else{{old('subject_line')}}@endif">
        <small class="place-error--msg text-danger"></small>
    </div>

    <div class="form-group">
        <label>About Template</label>
        <input type="text" name="about_template" class="form-control" value="@if(isset($data)){{$data->about_template}}@endif">
    </div>

    <div class="form-group">
        <label>Text Line One</label>
        <textarea is-required='true' onclick="removeErrorLevels($(this), 'input')" class="form-control" rows="5" cols="5" name="text_line_one" placeholder="Text line one">@if(isset($data)){{$data->text_line_one}}@else{{old('text_line_one')}}@endif</textarea>
        <small class="place-error--msg text-danger"></small>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Button Text</label>
                <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" name="button_text" placeholder="Button text" class="form-control" value="@if(isset($data)){{$data->button_text}}@else{{old('button_text')}}@endif">
                <small class="place-error--msg text-danger"></small>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Button Link</label>
                <input onclick="removeErrorLevels($(this), 'input')" type="text" name="button_link" placeholder="Button link" class="form-control" value="@if(isset($data)){{$data->button_link}}@else{{old('button_link')}}@endif">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Text Line Two</label>
        <textarea is-required='true' onclick="removeErrorLevels($(this), 'input')" class="form-control" rows="5" cols="5" name="text_line_two" placeholder="Text line two">@if(isset($data)){{$data->text_line_two}}@else{{old('button_link')}}@endif</textarea>
        <small class="place-error--msg text-danger"></small>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Facebook URL</label>
                <input onclick="removeErrorLevels($(this), 'input')" type="url" name="facebook_url" placeholder="Facebook URL" class="form-control" value="@if(isset($data)){{$data->facebook_url}}@else{{old('facebook_url')}}@endif">
                <small class="place-error--msg"></small>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Twitter URL</label>
                <input onclick="removeErrorLevels($(this), 'input')" type="url" name="twitter_url" placeholder="Twitter URL" class="form-control" value="@if(isset($data)){{$data->twitter_url}}@else{{old('twitter_url')}}@endif">
                <small class="place-error--msg"></small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Linkedin URL</label>
                <input onclick="removeErrorLevels($(this), 'input')" type="url" name="linkedin_url" placeholder="Linkedin URL" class="form-control" value="@if(isset($data)){{$data->linkedin_url}}@else{{old('linkedin_url')}}@endif">
                <small class="place-error--msg"></small>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Youtube URL</label>
                <input onclick="removeErrorLevels($(this), 'input')" type="url" name="youtube_url" placeholder="Pinterest URL" class="form-control" value="@if(isset($data)){{$data->youtube_url}}@else{{old('youtube_url')}}@endif">
                <small class="place-error--msg"></small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Instagram URL</label>
                <input onclick="removeErrorLevels($(this), 'input')" type="url" name="instagram_url" placeholder="Instagram URL" class="form-control" value="@if(isset($data)){{$data->instagram_url}}@else{{old('instagram_url')}}@endif">
                <small class="place-error--msg"></small>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Pinterest URL</label>
                <input onclick="removeErrorLevels($(this), 'input')" type="url" name="pinterest_url" placeholder="Pinterest URL" class="form-control" value="@if(isset($data)){{$data->pinterest_url}}@else{{old('pinterest_url')}}@endif">
                <small class="place-error--msg"></small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label>Top Banner (Size width:1200px & Height:200px)</label>
                <input onclick="removeErrorLevels($(this), 'input')" type="file" name="top_banner" class="form-control">
                <small class="place-error--msg"></small>
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
                <input onclick="removeErrorLevels($(this), 'input')" type="file" name="footer_banner" class="form-control">
                <small class="place-error--msg"></small>
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
        <textarea onclick="removeErrorLevels($(this), 'input')" class="form-control" rows="5" cols="5" name="footer_text" placeholder="Footer text">@if(isset($data)){{$data->footer_text}}@else{{old('footer_text')}}@endif</textarea>
        <small class="place-error--msg"></small>
    </div>

