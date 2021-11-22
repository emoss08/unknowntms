<?php

namespace App\Exports;

use App\Models\Tractors;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TractorsExport implements FromCollection, Responsable, ShouldAutoSize, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            '#',
            'Status',
            'Tractor ID',
            'Year',
            'Make',
            'Model',
            'Vin',
            'Owned By',
            'Driver 1',
            'Driver 2',
            'Tag',
            'Tag State',
            'Tag Expiration',
            'Last Inspiration',
            'Comments',
            'Entered by (User ID)',
        ];
    }

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'invoices.xlsx';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function collection()
    {
        return Tractors::all();
    }
}
