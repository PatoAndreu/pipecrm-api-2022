<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CompanyResource;
use Illuminate\Contracts\Support\Arrayable;
use App\Http\Resources\ContactStatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ContactLifeCycleStageResource;

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
      'firstName'               => $this->first_name,
      'lastName'                => $this->last_name,
      'email'                   => $this->email,
      'phoneNumber'             => $this->phone_number,
      'mobilePhoneNumber'       => $this->mobile_phone_number,
      'jobTitle'                => $this->job_title,
      'regionId'                => $this->region_id,
      'cityId'                  => $this->city_id,
      'address'                 => $this->address,
      'websiteUrl'              => $this->website_url,
      'createdAt'               => $this->created_at,
      'updatedAt'               => $this->updated_at,
      'contactLifeCycleStage'   => new ContactLifeCycleStageResource($this->whenLoaded('contact_life_cycle_stage')),
      'contactStatus'           => new ContactStatusResource($this->whenLoaded('contact_status')),
      'owner'                   => new UserResource($this->whenLoaded('owner')),
      'company'                 => new CompanyResource($this->whenLoaded('company')),
      'deals'                   => DealResource::collection($this->whenLoaded('deals')),
      'createdAt'               => $this->created_at,
      'updatedAt'               => $this->updated_at,
    ];
  }
}
