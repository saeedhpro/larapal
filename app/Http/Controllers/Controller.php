<?php

namespace App\Http\Controllers;

use App\Exports\OldProductExport;
use App\Models\OldProducts;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $list = OldProducts::query()->get('main_picture')->toArray();
        $list2 = OldProducts::query()->whereNotNull("pictures")->get('pictures')->toArray();
        foreach ($list2 as $l) {
            foreach ($l as $l2) {
                $a = json_decode($l2);
                foreach ($a as $l3) {
                    $list[] = ['' => $l3 ];
                }
            }
        }
        $export = new OldProductExport($list);
        return Excel::download($export, 'main_product_images.xlsx');
    }
}
