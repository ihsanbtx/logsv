<?php

namespace App\Imports;

use App\Models\TargetGroup;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TargetGroupImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;

    /*
     * @param \Throwable $e
     */
    
        public function rules(): array
        {
            return [
                '*.targetGroupname' => ['unique:targetGroup,targetGroupName'],
            ];
        }

        public function customValidationMessages()
        {
            return [
                'targetGroupname.unique' => 'Custom message',
            ];
        }

        public function collection(Collection $rows)
        {

            foreach ($rows as $row) 
            {
                TargetGroup::create([
                    'targetGroupName' => strval($row['targetGroupname']),
                    'updated_by' => Auth::user()->fullname,
                ]);
            }
        }

    
}
