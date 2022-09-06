<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
					'id' => $this->id,
					'firstName' => $this->first_name,
					'lastName' => $this->last_name,
					'email' => $this->email,
					'mobilePhoneNumber' => $this->mobile_phone_number,
					'created_at' => $this->created_at
				];
    }
}
