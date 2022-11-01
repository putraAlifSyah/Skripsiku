<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class cekPeriode extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(array $data)
    {
        $messages = [
            'Periode_Pendaftaran.required' => 'Masukkan Periode'
        ];
    
        $validator = Validator::make($data, [
            'Periode_Pendaftaran' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),  
        ], $messages);
    
        return $validator;
    }

    public function cekPeriode(array $data)
    {
    
    }
}
