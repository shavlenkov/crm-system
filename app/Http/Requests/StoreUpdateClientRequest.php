<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClientRequest extends FormRequest
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
            'surname' => 'required',
            'email' => is_null($this->client) ? 'required|email:rfc,dns|unique:clients' : 'required|email:rfc,dns|unique:clients,email,' . $this->client->id,
        ];
    }
}
