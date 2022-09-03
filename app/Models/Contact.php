<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validated)
 */
class Contact extends Model
{
  use HasFactory;

  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'phone_number',
    'mobile_phone_number',
    'job_title',
    'region_id',
    'city_id',
    'address',
    'website_url',
    'company_id',
    'life_cycle_stage_id',
    'contact_status_id',
    'owner_id',
  ];

	protected $casts = ["owner_id" => "integer", "contact_status_id" => "integer", "life_cycle_stage_id" => "integer", "company_id" => "integer"];

  public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
    return $this->belongsTo(Company::class);
  }

  public function life_cycle_stage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
    return $this->belongsTo(LifeCycleStage::class);
  }

  public function contact_status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
    return $this->belongsTo(ContactStatus::class, 'contact_status_id');
  }

  public function deals(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
    return $this->hasMany(Deal::class);
  }

  public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
    return $this->belongsTo(User::class);
  }
}
