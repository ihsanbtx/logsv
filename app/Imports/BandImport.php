<?php

namespace App\Imports;

use App\Models\Band;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BandImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;

    /*
     * @param \Throwable $e
     */
    
        public function rules(): array
        {
            return [
                '*.bandname' => ['unique:band,bandName'],
            ];
        }

        public function customValidationMessages()
        {
            return [
                'bandname.unique' => 'Custom message',
            ];
        }

        public function collection(Collection $rows)
        {

            foreach ($rows as $row) 
            {
                Band::create([
                    'bandName' => strval($row['bandname']),
                    'updated_by' => Auth::user()->fullname,
                ]);
            }
        }

    
}
