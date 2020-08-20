@extends('layouts.master')
@section('page-title','Vendors')
@push('styles')
<style type="text/css">
    .vendors-activity-details p{
        margin: 0;
        font-size: 12px
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Vendor Activity</li>
@endsection
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Activities of <b>{{ $vendor->first_name }} {{ $vendor->last_name }}</b></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SN.</th>
                                                    <th>Activity</th>
                                                    <th>Details</th>
                                                    <th>Activity Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key=>$content)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>{{ $content->activityName }}</td>
                                                        <td>
                                                            @php
                                                                $activities_array = (json_decode($content->activities, true));
                                                                echo "<div class='vendors-activity-details'>";
                                                                    foreach($activities_array as $key=>$value){
                                                                        $key = str_replace('_', ' ', $key);
                                                                        echo "<p>".ucwords($key)." : ".$value."</p>";
                                                                    }
                                                                echo "</div>";
                                                            @endphp
                                                        </td>
                                                        <td>{{ $content->created_at->format('d/m/Y H:i') }}</td>
                                                        <td>
                                                            <form action="{{ route('admin.vendor.activityDelete.post') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="vendorID" value="{{ Crypt::encrypt($content->vendor_id) }}">
                                                                <input type="hidden" name="activityID" value="{{ Crypt::encrypt($content->id) }}">
                                                                <button onclick="return confirm('Are you sure to DELETE?')" type="submit" class="btn btn-danger btn-sm" title="Delete this record"><i class="feather icon-delete"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>

                                        {!! $data->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection