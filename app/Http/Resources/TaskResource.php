<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ContactResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
      'company'   => new CompanyResource($this->whenLoaded('company')),
      'contact'   => new ContactResource($this->whenLoaded('contact')),
      'owner'     => new UserResource($this->whenLoaded('owner')),
      'deal'      => new DealResource($this->whenLoaded('deal')),
      'createdAt' => $this->created_at,
      'updatedAt' => $this->updated_at,
    ];
  }
}
