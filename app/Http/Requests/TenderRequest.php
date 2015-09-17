<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TenderRequest extends Request
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
            'bid_title' => 'required|min:3',
            'tender_no' => 'required|min:3',
//            'pre_bid_date' => 'required|date',
//            'opening_bid_date' => 'required|date',
//            'post_date' => 'required|date',
//            'post_date' => 'required|date',
//            'remove_date' => 'required|date',
        ];
    }
}
