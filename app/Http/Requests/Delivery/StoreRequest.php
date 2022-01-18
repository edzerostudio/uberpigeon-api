<?php

namespace App\Http\Requests\Delivery;

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
            'distance' => 'required|numeric',
            'deadline' => 'required|date',
            'cost' => 'sometimes|required|numeric',
            'pigeon' => 'sometimes|required|exists:pigeons',
            'estimated_arrival' => 'sometimes|required|date',
            'status' => 'sometimes|required|in:delivering,delivered,cancelled'
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
            'distance' => $this->distance,
            'deadline' => $this->deadline,
            'cost' => $this->cost,
            'pigeon' => $this->pigeon,
            'estimated_arrival' => $this->estimated_arrival,
            'status' => $this->status
        ];
    }
}
