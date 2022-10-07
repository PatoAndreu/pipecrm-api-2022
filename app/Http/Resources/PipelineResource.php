<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Arrayable;
use App\Http\Resources\PipelineStageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PipelineResource extends JsonResource
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
      'id'            => $this->id,
      'name'          => $this->name,
      'order'         => $this->order,
      'pipelineStage' => new PipelineStageResource($this->whenLoaded('pipeline_stage')),
      'pipelineStages' =>  PipelineStageResource::collection($this->whenLoaded('pipeline_stages')),
    ];
  }
}
