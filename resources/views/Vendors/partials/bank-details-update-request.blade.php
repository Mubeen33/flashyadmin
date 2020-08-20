<div class="form-group">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <h4>Update Data</h4>
            <table class="table">
                <tr>
                    <th>Account Holder</th>
                    <td>{{ $content->account_holder }}</td>
                </tr>
                <tr>
                    <th>Bank Name</th>
                    <td>{{ $content->bank_name }}</td>
                </tr>
                <tr>
                    <th>Bank Account</th>
                    <td>{{ $content->bank_account }}</td>
                </tr>
                <tr>
                    <th>Branch Name</th>
                    <td>{{ $content->branch_name }}</td>
                </tr>
                <tr>
                    <th>Branch Code</th>
                    <td>{{ $content->branch_code }}</td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 col-md-12">
            <h4>Current Data</h4>
            <table class="table">
                <tr>
                    <th>Account Holder</th>
                    <td>{{ $content->get_vendor->account_holder }}</td>
                </tr>
                <tr>
                    <th>Bank Name</th>
                    <td>{{ $content->get_vendor->bank_name }}</td>
                </tr>
                <tr>
                    <th>Bank Account</th>
                    <td>{{ $content->get_vendor->bank_account }}</td>
                </tr>
                <tr>
                    <th>Branch Name</th>
                    <td>{{ $content->get_vendor->branch_name }}</td>
                </tr>
                <tr>
                    <th>Branch Code</th>
                    <td>{{ $content->get_vendor->branch_code }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>



<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <h4>Vendor Details</h4>
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <th>{{ $content->get_vendor->first_name }}</th>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <th>{{ $content->get_vendor->last_name }}</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>{{ $content->get_vendor->email }}</th>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <th>{{ $content->get_vendor->mobile }}</th>
                </tr>
                <tr>
                    <th>Account Status</th>
                    <th>
                        @if($content->get_vendor->active == 0)
                            <span class="badge badge-danger">Pending</span>
                            @else
                            <span class="badge badge-success">Approved</span>
                        @endif
                    </th>
                </tr>
                <tr>
                    <th>Joining Date</th>
                    <th>{{ $content->get_vendor->created_at->format('d/n/Y') }}</th>
                </tr>
            </table>
        </div>
    </div>
</div>



<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.vendor.bankUpdatesApprove.post') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ Crypt::encrypt($content->id) }}">
                <input type="hidden" name="vendorID" value="{{ Crypt::encrypt($content->vendor_id) }}">
                <button onclick="return confirm('Are you sure?')" class="btn btn-success" type="submit">Approve Request</button>
            </form>
        </div>
    </div>
</div>