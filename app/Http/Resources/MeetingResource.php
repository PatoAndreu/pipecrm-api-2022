<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
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
      'id'          => $this->id,
      'title'       => $this->title,
      'date'        => $this->date,
      'time'        => $this->time,
      'type'        => $this->type,
      'pinned'      => $this->pinned,
      'duration'    => $this->duration,
      'attenders'   => $this->attenders,
      'result'      => $this->result,
      'description' => $this->description,
      'company'     => new CompanyResource($this->whenLoaded('company')),
      'contact'     => new ContactResource($this->whenLoaded('contact')),
      'owner'       => new UserResource($this->whenLoaded('owner')),
      'deal'        => new DealResource($this->whenLoaded('deal')),
      'createdAt' => $this->created_at,
      'updatedAt' => $this->updated_at,
    ];
  }
}
