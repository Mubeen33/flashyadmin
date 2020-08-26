@extends('layouts.master')
@section('content')
        <!-- dataTable starts -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="" />
                            </div>
                            <div class="col-lg-1">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div> <br />
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <thead>
                                        <tr class="table-head">
                                            <td width="10%">
                                                <i class="fa fa-calendar" aria-hidden="true"></i> Date
                                            </td>
                                            <td width="8%">
                                                <i class="fa fa-clock-o"></i> Time
                                            </td>
                                            <td width="8%">
                                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                                 Order ID
                                            </td>
                                            <td width="8%">
                                                <i class="fa fa-info-circle"></i> Quanity
                                            </td>
                                            <td width="20%" align="left">
                                                <i class="fa fa-user-circle"></i> Seller
                                            </td>
                                            <td width="10%">
                                                <i class="fa fa-calendar"></i> Due Date
                                            </td>
                                            <td width="10%">
                                                <i class="fa fa-check-square"></i> Total
                                            </td>
                                            <td width="12%">Payment Status</td>
                                            <td width="10%">Product Status</td>
                                            <td width="12%">Order Status</td>
                                            <td width="10%" >View</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td width="10%" >
                                                12-aug-2020
                                            </td>
                                            <td width="8%">
                                                12:20PM
                                            </td>
                                            <td width="8%">
                                                #123456
                                            </td>
                                            <td width="8%">
                                                25
                                            </td>
                                            <td width="22%">
                                                Multi junction technologies
                                            </td>
                                            <td width="8%">
                                                2-aug-2017
                                            </td>
                                            <td width="8%">
                                                R 25$ <small>(Paypal)</small> 
                                            </td>
                                            <td width="8%">
                                                Paid
                                            </td>
                                            <td width="8%">
                                                <span class="chip-text">
                                                    Status
                                                </span>
                                            </td>
                                            <td width="10">
                                                <div class="chip chip-success">
                                                    <div class="chip-body">
                                                        <div class="chip-text">Procced</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td >
                                                <a href="#">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>   

                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- dataTable ends -->
                    </div>
@endsection