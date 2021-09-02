<?php

namespace App\Imports;

use App\Models\Provider;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProviderImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;

    /*
     * @param \Throwable $e
     */
    
        public function rules(): array
        {
            return [
                '*.providername' => ['unique:provider,providerName'],
            ];
        }

        public function customValidationMessages()
        {
            return [
                'providername.unique' => 'Custom message',
            ];
        }

        public function collection(Collection $rows)
        {

            foreach ($rows as $row) 
            {
                Provider::create([
                    'providerName' => strval($row['providername']),
                    'updated_by' => Auth::user()->fullname,
                ]);
            }
        }

    
}
