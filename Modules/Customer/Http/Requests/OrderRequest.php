<?php

namespace Modules\Customer\Http\Requests;

use App\Enum\ConstantEnum;
use App\Models\Constant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'payment_method' => ['required', Rule::in(Constant::pluckValueKey(ConstantEnum::PAYMENT_METHODS))],
            'service_id' => [
                'required',
                Rule::exists('services', 'id'),
            ],
            'items' => 'required|array',
            'booking_at' => 'required|date_format:Y-m-d H:i:s|after_or_equal:now',
        ];
    }
}
