<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PipelineStageResource extends JsonResource
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
				'name' => $this->name,
				'probabilityOfClose' => $this->probability_of_close,
				'pipelineId' => $this->pipeline_id,
			];
    }
}
