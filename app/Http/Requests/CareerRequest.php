<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CareerRequest extends Request
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
            'title' => 'required|min:3',
            'department' => 'required|min:5',
            'due_date' => 'required|date',
            'post_date' => 'required|date',
            'remove_date' => 'required|date',
        ];
    }
}
