<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
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
	 * Get custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes(): array
	{
		return [
			'text'       => 'Texto',
			'contact_id' => 'Contacto',
		];
	}

	protected function prepareForValidation()
	{
		$this->merge([
									 'pinned'     => $this->pinned,
									 'contact_id' => $this->contact['id'] ?? NULL,
									 'company_id' => $this->company['id'] ?? NULL,
									 'deal_id'    => $this->deal['id'] ?? NULL,
									 'owner_id'   => $this->owner['id'] ?? NULL,
								 ]);
	}
}
