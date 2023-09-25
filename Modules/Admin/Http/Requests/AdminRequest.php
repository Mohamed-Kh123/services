<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Core\Http\Requests\BaseRequest;

class AdminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => request()->getMethod() == "POST" ? "required" : "",
            'email' => ['email' , Rule::unique('admins')->ignore(request()->get('id'))],

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'email.unique' => trans('admin::messages.email_unique'),
        ]; // TODO: Change the autogenerated stub
    }
}
