<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
		{
        return true;
    }

	protected function prepareForValidation()
	{
		$this->merge([
			'first_name' => $this->firstName,
			'last_name' => $this->lastName,
		]);
	}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
		{
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users.email'
        ];
    }
}
