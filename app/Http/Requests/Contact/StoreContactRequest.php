<?php

namespace App\Http\Requests\Contact;

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

	protected function prepareForValidation()
	{
		$this->merge([
									 'first_name'                  => $this->firstName,
									 'last_name'                   => $this->lastName,
									 'phone_number'                => $this->phoneNumber,
									 'mobile_phone_number'         => $this->mobilePhoneNumber,
									 'job_title'                   => $this->jobTitle,
									 'region_id'                   => $this->regionId,
									 'city_id'                     => $this->cityId,
									 'website_url'                 => $this->websiteUrl,
									 'contact_life_cycle_stage_id' => $this->contactLifeCycleStage['id'] ?? null,
									 'contact_status_id'           => $this->contactStatus['id'] ?? null,
									 'company_id'                  => $this->company['id'] ?? null,
									 'owner_id'                    => $this->owner['id'] ?? null,
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
			'first_name'                  => 'string|required',
			'last_name'                   => 'string|required',
			'email'                       => 'string|required|email',
			'phone_number'                => 'nullable|integer',
			'mobile_phone_number'         => 'nullable|integer',
			'job_title'                   => 'nullable|string',
			'region_id'                   => 'nullable|integer',
			'city_id'                     => 'nullable|integer',
			'address'                     => 'nullable',
			'website_url'                 => 'nullable|string',
			'company_id'                  => 'nullable|integer',
			'contact_life_cycle_stage_id' => 'nullable|integer',
			'contact_status_id'           => 'nullable|integer',
			'owner_id'                    => 'nullable|integer',
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
'phone_number.integer' => 'El campo Número de teléfono debe contener solo números.'
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
			'last_name'  => 'Apellido',
			'email'      => 'Email',
		];
	}
}
