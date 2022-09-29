<?php

namespace App\Http\Requests\Deal;

use Illuminate\Foundation\Http\FormRequest;

class StoreDealRequest extends FormRequest
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
			'name'              => 'required',
			'amount'            => '',
			'priority'          => '',
			'close_date'        => '',
			'pipeline_id'       => 'required',
			'pipeline_stage_id' => 'required',
			'contact_id'        => '',
			'company_id'        => '',
			'owner_id'          => '',
		];
	}

	protected function prepareForValidation()
	{
		$this->merge([
									 'close_date'        => $this->closeDate,
									 'pipeline_id'       => $this->pipeline['id'],
									 'pipeline_stage_id' => $this->pipelineStage['id'],
									 'contact_id'        => $this->contact['id'] ?? null,
									 'company_id'        => $this->company['id'] ?? null,
									 'owner_id'          => $this->owner['id'] ?? null,
								 ]);
	}
}
