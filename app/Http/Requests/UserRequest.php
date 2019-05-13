<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'name' => 'required',
                        'email' => 'required|unique:users,email'
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name' => 'required',
                        'email' => 'required|unique:users,email,' . $this->get('id'),
                    ];
                }
            default:
                break;
        }
    }
}
