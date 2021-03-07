<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable=[
        "identity",
        "first_name",
        "last_name",
        "email",
        "password",
        "phone",
        "mobile",
        "business_information",
        "vat_register",
        "company_name",
        "website_url",
        "director_first_name",
        "director_last_name",
        "director_email",
        "director_details",
        "additional_info",
        "product_type",
        "account_holder",
        "bank_name",
        "bank_account",
        "branch_name",
        "branch_code",
        "address",
        "street",
        "city",
        "state",
        "subrub",
        "zip_code",
        "country",
        "waddress",
        "wstreet",
        "wcity",
        "wstate",
        "wsubrub",
        "wzip_code",
        "wcountry",
        "active",
        "product_auto_approved",
        "email_verified_at",
        "deleted_at",
        "created_at",
        "updated_at"
    ];

    public function setProductAutoApprovedAttribute($value)
    {
        $this->attributes['product_auto_approved'] = $value=='on' ? true: false;

    }

    public function getProductAutoApprovedAttribute($value)
    {
       return $value ? 'on':'off';
    }

}
