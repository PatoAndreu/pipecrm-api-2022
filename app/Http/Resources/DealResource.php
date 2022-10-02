<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\PipelineResource;
use App\Http\Resources\PipelineStageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DealResource extends JsonResource
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
      'id'            => $this->id,
      'name'          => $this->name,
      'amount'        => $this->amount,
      'priority'      => $this->priority,
      'closeDate'     => $this->close_date,
      'createdAt'     => $this->created_at,
      'updatedAt'     => $this->updated_at,
      'contact'       => new ContactResource($this->whenLoaded('contact')),
      'company'       => new CompanyResource($this->whenLoaded('company')),
      'owner'         => new UserResource($this->whenLoaded('owner')),
      'pipeline'      => new PipelineResource($this->whenLoaded('pipeline')),
      'pipelineStage' => new PipelineStageResource($this->whenLoaded('pipeline_stage')),
    ];
  }
}
