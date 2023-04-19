<?php

namespace App\Imports;

use App\Models\Brand;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class BrandsImport implements ToCollection, WithBatchInserts
{

    public function batchSize(): int
    {
        return 100;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows[0] as $row) {
            Brand::create([
                'name' => $row
            ]);
        }
    }
}
