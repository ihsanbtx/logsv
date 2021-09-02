<?php

namespace App\Imports;

use App\Models\SVOP;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SVOPImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;

    /*
     * @param \Throwable $e
     */
    
        public function rules(): array
        {
            return [
                '*.nrp' => ['unique:user,nrp', 'max:8', 'min:8'],
                
            ];
        }

        public function customValidationMessages()
        {
            return [
                'nrp.unique' => 'Custom message',
            ];
        }

        public function collection(Collection $rows)
        {

            foreach ($rows as $row) 
            {
                SVOP::create([
                    'nrp' => strval($row['nrp']),
                    'fullname' => $row['fullname'],
                    'updated_by' => Auth::user()->fullname,
                ]);
            }
        }

    
}
