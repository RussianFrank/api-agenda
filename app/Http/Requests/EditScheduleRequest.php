<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditScheduleRequest extends FormRequest
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
            'schedule_id' => 'required|exists:App\Models\Schedule,id',
            'title' => 'string|min:3|max:100',
            'desciption' => 'string',
            'date' => 'date',
            'alert_date' => 'date',
        ];
    }
}