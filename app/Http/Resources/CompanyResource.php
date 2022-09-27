<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array|Arrayable|\JsonSerializable
	 */
	public function toArray($request): array
	{
		return [
			'id'          => $this->id,
			"name"        => $this->name,
			"dominio"     => $this->dominio,
			"type"        => $this->type,
			"city"        => $this->city,
			"address"     => $this->address,
			"description" => $this->description,
		];
	}
}
