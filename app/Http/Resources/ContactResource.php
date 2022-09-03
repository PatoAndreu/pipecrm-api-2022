<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {

			return [
				'id'		              => $this->id,
				'firstName'		        => $this->first_name,
				'lastName'		 				=> $this->last_name,
				'email' 			 				=> $this->email,
				'phoneNumber'				=> $this->phone_number,
				'mobilePhoneNumber' => $this->mobile_phone_number,
				'jobTitle' 		      => $this->job_title,
				'regionId'           => $this->region_id,
				'cityId' 		        => $this->city_id,
				'address'             => $this->address,
				'websiteUrl' 			  => $this->website_url,
				'companyId' 			    => $this->company_id,
				'lifeCycleStageId' => $this->life_cycle_stage_id,
				'contactStatusId'   => $this->contact_status_id,
				'ownerId'            => $this->owner_id,
			];
//        return parent::toArray($request);
    }
}
