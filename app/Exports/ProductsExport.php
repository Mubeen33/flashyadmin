<?php

namespace App\Exports;

use App\Product;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsExport implements FromView, WithHeadingRow
{


	private $data;//array of product id

	 function __construct($data) {
	        $this->data = $data;
	 }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.csv.csv-export', [
            'data' => $this->data
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Category',
            'Description',
            'Image',
            'Product Type',
            'SKU'
        ];
    }



}
