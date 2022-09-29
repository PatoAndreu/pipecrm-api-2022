<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return TRUE;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(): array
	{
		return [
			'text'       => 'required',
			'pinned'     => 'nullable',
			'contact_id' => 'nullable|exists:App\Models\Contact,id',
			'company_id' => 'nullable|exists:App\Models\Company,id',
			'deal_id'    => 'nullable|exists:App\Models\Deal,id',
			'owner_id'   => 'nullable|exists:App\Models\User,id',
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
			'contact_id.exists' => 'El Contacto ingresado no existe en la base de datos.',
			'company_id.exists' => 'La Empresa ingresado no existe en la base de datos.',
			'deal_id.exists'    => 'El Negocio ingresado no existe en la base de datos.',
			'owner_id.exists'   => 'El Propietario ingresado no existe en la base de datos.',
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
			'text'       => 'Texto',
			'contact_id' => 'Contacto',
			'company_id' => 'Empresa',
			'owner_id'   => 'Propietario',
		];
	}

	protected function prepareForValidation()
	{
		$this->merge([
									 'contact_id' => $this->contact['id'] ?? NULL,
									 'company_id' => $this->company['id'] ?? NULL,
									 'deal_id'    => $this->deal['id'] ?? NULL,
									 'owner_id'   => $this->owner['id'] ?? NULL,
								 ]);
	}
}
