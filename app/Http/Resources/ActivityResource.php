<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		return [
			'id'        => $this->id,
			'text'      => $this->text,
			'pinned'    => $this->pinned,
			'completed' => $this->completed,
			'date'      => $this->date,
			'time'      => $this->time,
			'type'      => $this->type,
			'contact'   => new ContactResource($this->contact),
			'companyId' => $this->company_id,
			'owner'     => new UserResource($this->owner),
			'deal'      => $this->deal,
		];
	}
}
