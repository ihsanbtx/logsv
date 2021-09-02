<?php

namespace App\Imports;

use App\Models\CaseAgent;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CaseAgentImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;

    /*
     * @param \Throwable $e
     */
    
        public function rules(): array
        {
            return [
                '*.caseagentname' => ['unique:caseagent,caseAgentName'],
            ];
        }

        public function customValidationMessages()
        {
            return [
                'caseagentname.unique' => 'Custom message',
            ];
        }

        public function collection(Collection $rows)
        {

            foreach ($rows as $row) 
            {
                CaseAgent::create([
                    'caseAgentName' => strval($row['caseagentname']),
                    'updated_by' => Auth::user()->fullname,
                ]);
            }
        }

    
}
