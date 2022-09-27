<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
			"name"        => 'required',
			"domain"     => 'nullable',
			"type"        => 'nullable',
			"city"        => 'nullable',
			"address"     => 'nullable',
			"description" => 'nullable',
    ];
  }
}
