<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetingRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'title'       => '',
      'date'        => 'required',
      'time'        => 'required',
      'type'        => 'required',
      'pinned'      => '',
      'duration'    => '',
      'attenders'   => '',
      'result'      => '',
      'description' => '',
      'contact_id'  => 'nullable|exists:App\Models\Contact,id',
      'company_id'  => 'nullable|exists:App\Models\Company,id',
      'deal_id'     => 'nullable|exists:App\Models\Deal,id',
      'owner_id'    => 'nullable|exists:App\Models\User,id',
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
