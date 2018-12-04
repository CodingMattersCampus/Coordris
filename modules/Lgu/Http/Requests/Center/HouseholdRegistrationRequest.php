<?php

namespace Modules\Lgu\Http\Requests\Center;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class HouseholdRegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "head" => "required|string",
            "spouse" => "string|nullable",
            "child" => "string|nullable",
            "child2" => "string|nullable",
            "dependent1" => "string|nullable",
            "dependent2" => "string|nullable",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('lgu')->check();
    }
}
