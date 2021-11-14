<?php

namespace App\Imports;

use App\Models\Tractors;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class TractorsImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.1' => 'required',
            '*.2' => 'required|unique:tractors,tractor_id',
            '*.3' => 'required|size:4',
            '*.4' => 'required',
            '*.5' => 'required',
            '*.6' => 'required|vin_code'
        ])->validate();

    foreach ($rows as $row) {
    Tractors::create([
            'status'     => $row[1],
            'tractor_id'    => $row[2],
            'year' =>$row[3],
            'make' => $row[4],
            'model' => $row[5],
            'vin' => $row[6],
            'owned_by' => $row[7],
            'driver_1' => $row[8],
            'driver_2' => $row[9],
            'tag' => $row[10],
            'tag_state' => $row[11],
            'tag_expiration' => $row[12],
            'last_inspection' => $row[13],
            'comments' => $row[14]
            ]);
        }
    }
}
