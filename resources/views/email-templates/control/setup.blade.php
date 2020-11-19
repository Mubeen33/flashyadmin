@extends('layouts.master')
@section('page-title','Email Templates Setup')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Email Templates</li>
@endsection    
@section('content')
        @include('msg.msg')                             
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Setup New One</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form id="setupEmailTemplateForm" action="{{ route('admin.email-templates.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Template</label>
                                            <select onclick="removeErrorLevels($(this), 'input')" is-required='true' onchange="getTemplate(this.value)" class="form-control" name="template">
                                                <option value="">Choose One</option>
                                                <option value="Customer-Signup" @if(isset($data) && $data->template === "Customer-Signup") selected @else @if(old('template') === "Customer-Signup") selected @endif @endif >Customer Signup Template</option>
                                                <option value="Vendor-Signup" @if(isset($data) && $data->template === "Vendor-Signup") selected @if(old('template') === "Vendor-Signup") selected @endif  @endif >Vendor Signup Template</option>
                                            </select>
                                            <small class="place-error--msg text-danger"></small>
                                        </div>
                                        <div id="render--data">
                                            @include('email-templates.control.partials.form-body')
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-warning" type="submit">Setup</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection


@push('scripts')
<script type="text/javascript">
    function getTemplate(templateName){
        if (templateName === "") {
            return false;
        }else{
            $.ajax({
                url:"/admin/get-email-template?templateName="+templateName,
                method:"GET",
                cache:false,
                success:function(response){
                    $("#render--data").html(response)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 404) {
                        alert('SORRY\nTemplate Not Found')
                        window.location.reload(true)
                    }else{                      
                        alert('something went wrong...')
                        window.location.reload(true)
                    }

                }
            })
        }

    }
</script>

<script type="text/javascript">
    $("#setupEmailTemplateForm").on('submit', function(e){
        formClientSideValidation(e, "setupEmailTemplateForm", 'yes');
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush