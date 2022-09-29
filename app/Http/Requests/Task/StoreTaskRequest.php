<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
			'note'       => 'nullable',
			'pinned'     => 'nullable',
			'date'       => 'nullable',
			'time'       => 'nullable',
			'type'       => 'required',
			'delayed'    => 'sometimes',
			'priority'   => 'sometimes',
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
			'owner_id.exists'   => 'El Usuario ingresado no existe en la base de datos.',
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
			'date'       => 'Fecha',
			'time'       => 'Hora',
			'type'       => 'Tipo',
			'contact_id' => 'Contacto',
		];
	}

	protected function prepareForValidation()
	{
		$this->merge([
									 'pinned'     => $this->pinned,
									 'delayed'    => $this->delayed ?? FALSE,
									 'contact_id' => $this->contact['id'] ?? NULL,
									 'company_id' => $this->company['id'] ?? NULL,
									 'deal_id'    => $this->deal['id'] ?? NULL,
									 'owner_id'   => $this->owner['id'] ?? NULL,
								 ]);
	}
}
