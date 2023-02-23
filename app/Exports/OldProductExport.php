<?php

namespace App\Exports;

use App\Models\OldProducts;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class OldProductExport implements FromArray
{
    protected $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    public function array(): array
    {
        return $this->list;
    }
}
