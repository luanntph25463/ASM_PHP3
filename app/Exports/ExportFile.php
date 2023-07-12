<?php

namespace App\Exports;

use App\Models\category_courses;
use App\Models\courses;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportFile implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return courses::all();
    }
}
