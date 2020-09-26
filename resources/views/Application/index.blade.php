@extends('layouts.master')
@section('page-title','Application')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Application Maintenance</li>
@endsection 
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Application Maintenance</h4></div>
                            </div>
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12"></div>
                                        <div class="col-lg-4 col-md-12">
                                            <form action="{{ route('admin.site-maintenance.store') }}" method="POST" style="border: 1px solid #ddd; padding: 15px;">
                                                @csrf
                                                <div class="form-group">
                                                    <div style="text-align: left !important;"><label><i class='feather icon-info'></i> Application Mood</label></div>
                                                    <select onchange="manageApplicationMood(this.value)" name="application_mood" class="btn btn-info btn-block">
                                                        <option value="">Choose One</option>
                                                        <option value="1" @if($data && intval($data->active_mood) === 1) selected @endif>Active</option>
                                                        <option value="0" @if($data && intval($data->active_mood) === 0) selected @endif>Under Maintenance</option>
                                                    </select>
                                                    
                                                </div>



                                                @php
                                                    $live_at = NULL;
                                                    if($data && intval($data->active_mood) === 0){
                                                        $live_at = date('Y-m-d\TH:i', strtotime($data->live_at));
                                                    }
                                                @endphp
                                                <div id="live__time" class="form-group @if($data && intval($data->active_mood) === 1) d-none @endif">
                                                    <div style="text-align: left !important;"><label><i class='feather icon-clock'></i> Will be Live at</label></div>
                                                    <input class="form-control" type="datetime-local"
                                                       name="live_time" placeholder="2018-06-12T19:30" value="{{$live_at}}"> 
                                                </div>

                                                <div class="form-group">
                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-warning">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4 col-md-12"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection



@push('scripts')
<script type="text/javascript">
    function manageApplicationMood(getValue){
        if (getValue === "0") {
            //under maintenance
            $("#live__time").removeClass('d-none')
            $("#live__time").children($("input[name=live_time]")).attr('required', true)
            return;
        }else{
            $("#live__time").addClass('d-none')
            $("#live__time").children($("input[name=live_time]")).attr('required', false)
            return;
        }
    }
</script>
@endpush