<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array|Arrayable|\JsonSerializable
	 */
	public function toArray($request): array
	{

		return [
			'id'                      => $this->id,
			'firstName'                => $this->first_name,
			'lastName'                => $this->last_name,
			'email'                   => $this->email,
			'phoneNumber'             => $this->phone_number,
			'mobilePhoneNumber'       => $this->mobile_phone_number,
			'jobTitle'                => $this->job_title,
			'regionId'                => $this->region_id,
			'cityId'                  => $this->city_id,
			'address'                 => $this->address,
			'websiteUrl'              => $this->website_url,
			'createdAt'              => $this->created_at,
			'updatedAt'              => $this->updated_at,
//			'companyId'               => $this->company_id,
//			'contactLifeCycleStageId' => $this->contact_life_cycle_stage_id,
//			'contactStatusId'         => $this->contact_status_id,
//			'ownerId'                 => $this->owner_id,
			'owner'                   => new UserResource($this->owner),
			'contactLifeCycleStage'   => $this->contact_life_cycle_stage,
			'contactStatus'           => $this->contact_status,
			'deals'                   => $this->deals,
			'company'                 => $this->company,
		];
//        return parent::toArray($request);
	}
}
