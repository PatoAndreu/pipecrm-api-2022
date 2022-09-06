<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePipelineStageRequest extends FormRequest
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
			'pipeline_id' => $this->pipelineId,
			'probability_of_close' => $this->probabilityOfClose,
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
			'name' => 'required|string',
			'pipeline_id' => 'required',
			'probability_of_close' => 'nullable',
			'order' => 'nullable',
		];
  }
}
