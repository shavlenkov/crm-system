<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCompanyRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required',
            'email' => is_null($this->company) ? 'required|email:rfc,dns|unique:companies' : 'required|email:rfc,dns|unique:companies,email,' . $this->company->id,
            'foundation_year' => 'required|integer|min:1950|max:'.date('Y'),
            'description' => 'required'
        ];
    }
}
