<?php

namespace App\Http\Requests\Pigeon;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'speed' => 'required|numeric',
            'range' => 'required|numeric',
            'cost' => 'nullable|numeric',
            'downtime' => 'required|numeric'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function validated()
    {
        return [
            'name' => $this->name,
            'speed' => $this->speed,
            'range' => $this->range,
            'cost' => $this->cost,
            'downtime' => $this->downtime,
            'status' => 'ready'
        ];
    }
}
