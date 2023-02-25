<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanySaveRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:25',
            'email' => 'required|email|max:50',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:25',
            'address' => 'required|max:150',
            'city' => 'required|max:50',
            'region' => 'required|max:50',
            'country' => 'required|max:2',
            'postal_code' => 'required|max:25'
        ];
    }
}
