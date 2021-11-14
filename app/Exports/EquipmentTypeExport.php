<?php

namespace App\Exports;

use App\Models\EquipmentType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EquipmentTypeExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EquipmentType::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Status',
            'Equipment Type ID',
            'Description',
            'Entered by (User ID)',
        ];
    }
}
