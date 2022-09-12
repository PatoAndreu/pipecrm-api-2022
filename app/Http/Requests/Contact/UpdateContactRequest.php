<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

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
			'first_name'                   => 'string|sometimes',
			'last_name'                   => 'string|sometimes',
			'email'                       => 'string|email',
			'phone_number'                => 'nullable',
			'mobile_phone_number'         => 'nullable',
			'job_title'                   => 'nullable|string',
			'region_id'                   => 'nullable|integer',
			'city_id'                     => 'nullable|integer',
			'address'                     => 'nullable',
			'website_url'                 => 'nullable|string',
			'company_id'                  => 'nullable|integer|exists:App\Models\Company,id',
			'contact_life_cycle_stage_id' => 'nullable|integer|exists:App\Models\ContactLifeCycleStage,id',
			'contact_status_id'           => 'nullable|integer|exists:App\Models\ContactStatus,id',
			'owner_id'                    => 'nullable|integer|exists:App\Models\User,id',
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
			'first_name'                   => 'Nombre',
			'last_name'                   => 'Apellido',
			'email'                       => 'Email',
			'owner_id'                    => 'Propietario',
			'contact_status_id'           => 'Estado del Lead',
			'contact_life_cycle_stage_id' => 'Ciclo de vida del Lead',
		];
	}
}
