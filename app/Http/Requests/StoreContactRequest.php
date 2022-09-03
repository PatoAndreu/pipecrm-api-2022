<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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


	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(): array
	{
		return [
			'first_name' => 'string|required',
			'last_name' => 'string|required',
			'email' => 'string|required|email',
			'phone_number' => 'nullable|integer',
			'mobile_phone_number' => 'nullable|integer',
			'job_title' => 'nullable|string',
			'region_id' => 'nullable|integer',
			'city_id' => 'nullable|integer',
			'address' => 'nullable',
			'website_url' => 'nullable|string',
			'company_id' => 'nullable|integer',
			'life_cycle_stage_id' => 'nullable|integer',
			'contact_status_id' => 'nullable|integer',
			'owner_id' => 'nullable|integer',
		];
	}


	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages(): array
	{
		return [
//			'required' => 'The :attribute and :other must match.',
//			'first_name.required' => 'El campo Nombre es requerido',
//			'last_name.required' => 'El campo Apellido es requerido',
		];
	}

	/**
	 * Get custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes(): array
	{
		return [
			'first_name' => 'Nombre',
			'last_name' => 'Apellido',
			'email' => 'Email',
		];
	}
}
