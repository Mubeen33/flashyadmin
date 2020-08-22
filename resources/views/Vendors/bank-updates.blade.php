@extends('layouts.master')
@section('page-title','Vendors Bank Updates')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Vendors Bank Details Updates</li>
@endsection
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vendors Bank Details Updates</h4>
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
                                                    <th>Email</th>
                                                    <th>Bank Name</th>
                                                    <th>Update at</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key=>$content)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>{{ $content->get_vendor->first_name }}</td>                                          
                                                        <td>{{ $content->get_vendor->last_name }}</td>
                                                        <td>{{ $content->get_vendor->email }}</td>
                                                        <td>{{ $content->bank_name }}</td>
                                                        <td>{{ $content->created_at->format('d/m/Y H:i') }}</td>
                                                        <td>

                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" 
                                                                data-target="#viewDetails-{{$content->id}}">
                                                              <i class="feather icon-eye"></i>
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="viewDetails-{{$content->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    @include('Vendors.partials.bank-details-update-request')
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            
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