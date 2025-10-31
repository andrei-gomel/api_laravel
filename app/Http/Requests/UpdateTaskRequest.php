<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
    	return true;
    }

    public function rules()
    {
        return [
            'title'   => 'required|min:4|max:50',
        ];
    }

}
