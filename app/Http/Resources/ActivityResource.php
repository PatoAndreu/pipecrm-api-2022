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
			'note'      => $this->note,
			'pinned'    => $this->pinned,
			'completed' => $this->completed,
			'priority'  => $this->priority,
			'date'      => $this->date,
			'time'      => $this->time,
			'type'      => $this->type,
			'dateTime'  => $this->dateTime,
			'delayed'   => $this->delayed,
			'company'   => $this->company,
			'contact'   => new ContactResource($this->contact),
			'owner'     => new UserResource($this->owner),
			'deal'      => $this->deal,
			'createdAt' => $this->created_at

		];
	}
}
