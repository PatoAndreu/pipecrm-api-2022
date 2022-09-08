<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
		if (isset($this->firstName)) {
			$this->merge(['first_name' => $this->firstName]);
		}

		if (isset($this->lastName)) {
			$this->merge(['last_name' => $this->lastName]);
		}


		$this->merge([
									 'phone_number'                => $this->phoneNumber,
									 'mobile_phone_number'         => $this->mobilePhoneNumber,
									 'job_title'                   => $this->jobTitle,
									 'region_id'                   => $this->regionId,
									 'city_id'                     => $this->cityId,
									 'website_url'                 => $this->websiteUrl,
									 'company_id'                  => $this->companyId,
									 'contact_life_cycle_stage_id' => $this->contactLifeCycleStageId,
									 'contact_status_id'           => $this->contactStatusId,
									 'owner_id'                    => $this->ownerId,
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
			'first_name'          => 'string|sometimes',
			'last_name'           => 'string|sometimes',
			'email'               => 'string|email',
			'phone_number'        => 'nullable',
			'mobile_phone_number' => 'nullable',
			'job_title'           => 'nullable|string',
			'region_id'           => 'nullable|integer',
			'city_id'             => 'nullable|integer',
			'address'             => 'nullable',
			'website_url'         => 'nullable|string',
			'company_id'          => 'nullable|integer',
			'life_cycle_stage_id' => 'nullable|integer',
			'contact_status_id'   => 'nullable|integer',
			'owner_id'            => 'nullable|integer',
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
