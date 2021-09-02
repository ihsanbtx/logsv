<?php

namespace App\Imports;

use App\Models\Vehicle;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VehicleImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;

    /*
     * @param \Throwable $e
     */
    
        public function rules(): array
        {
            return [
                '*.vehiclename' => ['unique:vehicle,vehicleName'],
            ];
        }

        public function customValidationMessages()
        {
            return [
                'vehiclename.unique' => 'Custom message',
            ];
        }

        public function collection(Collection $rows)
        {

            foreach ($rows as $row) 
            {
                Vehicle::create([
                    'vehicleName' => strval($row['vehiclename']),
                    'updated_by' => Auth::user()->fullname,
                ]);
            }
        }

    
}
