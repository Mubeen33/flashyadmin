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
    <li class="breadcrumb-item active">Vendors Activity</li>
@endsection
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vendors Activity</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SN.</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Activity</th>
                                                    <th>Details</th>
                                                    <th>Last Activity</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $single)
                                                    @foreach($single as $key=>$content)
                                                        <!-- run one tme -->
                                                        @if($key == 0)
                                                        <tr>
                                                            <th scope="row">{{ $key+1 }}</th>
                                                            <td>{{ $content->get_vendor->first_name }}</td>                                          
                                                            <td>{{ $content->get_vendor->last_name }}</td>
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
                                                                <a class="btn btn-primary btn-sm" title="View All Activity of {{ $content->get_vendor->first_name }}" href="{{ route('admin.vendor.activity.get', Crypt::encrypt($content->vendor_id)) }}"><i class="feather icon-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
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