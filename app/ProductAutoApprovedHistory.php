<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAutoApprovedHistory extends Model
{
    protected $fillable=[
                        "vendor_id",
                        "action",
                        "type",
                        "notes",
                        "start_date",
                        "end_date"
                        ];
    public $timestamps = false;

}
