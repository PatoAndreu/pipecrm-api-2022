<?php

namespace App\Http\Requests\Pipeline;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePipelineStageRequest extends FormRequest
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
				 'pipeline_id' => 'required|integer',
				 'probability_of_close' => 'nullable',
				 'order' => 'nullable',
			 ];
  }
}
