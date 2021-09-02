<?php

namespace App\Imports;

use App\Models\User;
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
use Illuminate\Support\Facades\Hash;

class UserImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;

    /*
     * @param \Throwable $e
     */
    
        public function rules(): array
        {
            return [
                '*.nrp' => ['Unique:user,nrp', 'max:8', 'min:8'],
                '*.usertype' => ['required', Rule::in(['Admin', 'Operator']), ],
                '*.fullname' => 'required',
                '*.email' => ['Unique:user,email', 'required', 'email'],
                //'*.caseagent' => ['required', Rule::in(CaseAgent::all()->caseAgentName)],
            ];
        }

        public function customValidationMessages()
        {
            return [
                'nrp.Unique' => 'Custom message',
            ];
        }

        public function collection(Collection $rows)
        {

            foreach ($rows as $row) 
            {
                User::create([
                    'nrp' => strval($row['nrp']),
                    'fullname' => $row['fullname'],
                    'usertype' => $row['usertype'],
                    'email' => $row['email'],
                    'caseagent' => $row['caseagent'],
                    'updated_by' => Auth::user()->fullname,
                    'password' => Hash::make('Jakarta2021'),
                ]);
            }
        }

    
}
