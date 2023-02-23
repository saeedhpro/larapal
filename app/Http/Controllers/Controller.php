<?php

namespace App\Http\Controllers;

use App\Exports\OldProductExport;
use App\Models\OldProducts;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $old = OldProducts::query()->take(5);
        $list = $old->pluck('main_picture');
        $list2 = $old->whereNotNull("pictures")->get('pictures')->toArray();
        foreach ($list2 as $l) {
            foreach ($l as $l2) {
                $a = json_decode($l2);
                foreach ($a as $l3) {
                    $list[] = $l3;
                }
            }
        }
        foreach ($list as $l) {
            $p = public_path($l);
            $path = "E:\\old/" . $l;
            if (file_exists($l)) {
                echo $l;
                $image = Image::make($p);
                $image->save($path);
            }
        }
        return true;
//        $export = new OldProductExport($list);
//        return Excel::download($export, 'main_product_images.xlsx');
    }
}
