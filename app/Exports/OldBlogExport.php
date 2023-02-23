<?php

namespace App\Exports;

use App\Models\OldBlog;
use Maatwebsite\Excel\Concerns\FromCollection;

class OldBlogExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OldBlog::all();
    }
}
