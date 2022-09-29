<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
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
			'contact'       => $this->contact,
			'company'       => $this->company,
			'owner'         => new UserResource($this->owner),
			'pipeline'      => $this->pipeline,
			'pipelineStage' => new PipelineStageResource($this->pipeline_stage),
		];
	}
}
