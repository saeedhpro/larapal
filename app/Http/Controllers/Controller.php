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
        $f = public_path("a.txt");
        file_put_contents($f, json_encode($list));
        $s = '["products\/October2019\/yVs9jYHhbmfp4xKYC647.jpg","products\/September2019\/wfkxLRIQ0czSfnMQjqrj.jpg","products\/September2019\/5jQnDH4VgJ96yzBdtWGG.jpg","products\/October2019\/HIVpZ68WEX3SPIHil55d.jpg","products\/September2019\/MKkT7Bua8PqlTqt97gXu.jpg","products\/October2019\/pSixD3KItTBQPrCXLFrJ.jpg","products\/October2019\/076kXDu7Iug1cz7mCFhY.jpg","products\/October2019\/R2JzOT55hYONzOlFOuzF.jpg","products\/October2019\/I8NK1YDlK878w6P6ifcQ.jpg","products\/October2019\/cBwaZLaPf9bk9nhNcb2e.jpg","products\/October2019\/0lKRkmpYQKInf9UM3Ul2.jpg","products\/October2019\/HL6YtpOBsJTZa97OvJZM.jpg","products\/October2019\/XQQjReWt3lJ8NLf11BEP.jpg","products\/October2019\/ZntptLmL2P8pwyCvdrTT.jpg","products\/October2019\/nvdLCUTFiup4nvFvw9gy.jpg","products\/October2019\/NGvCzeCGP3U4SU74dIWN.jpg","products\/May2022\/vCgH6kDqYD6yAHuyHS3w.jpg","products\/September2019\/uIGt7nKbSqdlfB4AtkOJ.jpg","products\/September2019\/Bfo6tanDAf3sxJvuEnmq.jpg","products\/September2019\/pHFSjZXiGx4oPZ3JQ0EG.jpg","products\/September2019\/EfiyagByXJU5iJ8YLWEP.jpg","products\/September2019\/DsUSsHPxM9nUS2SuLTSI.jpg","products\/September2019\/mbCBFk0Of6hkCZLl4U0Z.jpg","products\/September2019\/fLFqHSwVVJQ4ngUuCShR.jpg","products\/September2019\/8TPoTgOj8CdbKaW9BbVq.jpg","products\/September2019\/o9pdnuTpVstqJm16jBHf.jpg","products\/September2019\/mdGPYRZ0cbsbKwpTnB01.jpg","products\/September2019\/oHzrf64ar2G3Ul4PHPy4.jpg","products\/September2019\/kANH9LwmSq1k7rXjjw7N.jpg","products\/September2019\/YJjaBmwmc2OgnefLWW8d.jpg","products\/September2019\/9TLSBXpr1blxJkb8ySBd.jpg","products\/September2019\/7ZYxVXbsNfA1lkYknBTB.jpg","products\/September2019\/Q17hq3TDKL43C04g2PCb.jpg","products\/September2019\/9R3zFmMAbhamOarRUWUr.jpg","products\/September2019\/uQ3nYebPoodPviDQYWzF.jpg","products\/September2019\/0ZxfTM95IReTuVwn72az.jpg","products\/September2019\/vaha2lsfOF2ksteyJPvg.jpg","products\/September2019\/d3sOZwz9WVp8CqECMWLo.jpg","products\/September2019\/lIoci4XuoGiTPSNs1RIA.jpg","products\/October2019\/AcVm0DmhnrF8iuv59XyO.jpg","products\/October2019\/ghcDfmS4FOjPc8VFw4zE.jpg","products\/October2019\/u1fHsqaJXyEjTzPBaSlr.jpg","products\/October2019\/ZvqkPmYUAVipVVUKD1pv.jpg","products\/October2019\/LTcankMtAGh4tW8BTK3H.jpg","products\/October2019\/M67imvHMt4i8MdU4l6GX.jpg","products\/October2019\/yHpGJDnhorCNIgPMlDci.jpg","products\/October2019\/BbP9rP9bm14gl8hHYs5U.jpg","products\/October2019\/I2bx1wtKc8fjPBN414nY.jpg","products\/October2019\/CJjPzZybs4zDN8racDDL.jpg","products\/October2019\/i1fjIFNp1aTk2Vn9FMei.jpg","products\/October2019\/WctaxqEyCPEmhbBsJAlA.jpg","products\/October2019\/6qd7DujGYadgBdfAGv7N.jpg","products\/September2019\/GWwNaBucsEetgLQMzZpX.jpg","products\/September2019\/tmmIMuVyXLyQLCgYjPsw.jpg","products\/September2019\/2SRaLWSBhlP0rvpbf78L.jpg","products\/September2019\/AB6tsnKMcSpAN1trEFWf.jpg","products\/September2019\/DiEQF65x3MAueHlv9IIN.jpg","products\/September2019\/MAD2MhYbqcuvgNi3b33E.jpg","products\/September2019\/TCpWHgOUWpbMbks2qqKh.jpg","products\/September2019\/yvO4jpIWu5IAT3oohsro.jpg","products\/September2019\/wYJwaWfxulwi2BoQo4xW.jpg","products\/September2019\/fTYc8nSjrRiAuWGkQS7I.jpg","products\/September2019\/nwFIRdm1K0pjBXf4XKtA.jpg"]';
        return;
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
