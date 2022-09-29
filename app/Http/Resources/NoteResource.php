<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
			'company'   => $this->company,
			'contact'   => $this->contact,
			'owner'     => $this->owner,
			'deal'      => $this->deal,
			'createdAt' => $this->created_at
		];
	}
}
