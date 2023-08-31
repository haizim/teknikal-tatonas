<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HardwareRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'hardware' => ['required', 'numeric'],
            'location' => ['required'],
            'timezone' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i:s'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ];
    }
}
