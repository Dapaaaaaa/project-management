<?php

namespace App\Http\Requests;

use App\Models\Project_status;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProject_statusRequest extends FormRequest
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
        $rules = Project_status::$rules;
        
        return $rules;
    }
}
