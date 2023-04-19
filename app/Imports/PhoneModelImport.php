<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\PhoneModel;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;

class PhoneModelImport implements ToArray
{


    public function array(array $array)
    {
        $keys = $array[0];
        $data = [];
        $count = count($array);
        $indexCount = count($keys); // 24

        for ($i = 1; $i < $count; $i++) {
            for ($j = 0; $j < $indexCount; $j++) {
                $data[$keys[$j]][] = $array[$i][$j];
            }
        }

        $this->save($data);

    }

    protected function save(array $array): void
    {
        foreach ($array as $key => $value) {
            /**
             * @var Brand $brand
             */
            $brand = Brand::where('name', $key)->first();
            $data = Arr::whereNotNull($value);
            $models = [];
            foreach ($data as $item) {
                $models[] = [
                    'name' => $item
                ];
            }

            $brand->models()->createMany($models);
            $brand->refresh();
        }
    }
}
