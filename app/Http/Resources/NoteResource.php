<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\DealResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ContactResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

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
      'type'      => 'note',
      'text'      => $this->text,
      'pinned'    => $this->pinned,
      'company'   => new CompanyResource($this->whenLoaded('company')),
      'contact'   => new ContactResource($this->whenLoaded('contact')),
      'owner'     => new UserResource($this->whenLoaded('owner')),
      'deal'      => new DealResource($this->whenLoaded('deal')),
      'createdAt' => $this->created_at,
      'updatedAt' => $this->updated_at,
    ];
  }
}
