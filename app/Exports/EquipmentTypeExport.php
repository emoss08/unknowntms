<?php

namespace App\Exports;

use App\Models\EquipmentType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EquipmentTypeExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
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
