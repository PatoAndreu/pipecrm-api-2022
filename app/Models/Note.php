<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  use HasFactory;

  protected $fillable = [
    'text',
    'pinned',
    'contact_id',
    'contact_id',
    'owner_id',
    'deal_id',
  ];

  protected $casts = [
    "owner_id"   => "integer",
    "contact_id" => "integer",
    "deal_id"    => "integer",
    "company_id" => "integer",
    "pinned"     => "boolean",
  ];

  public function getCreatedAtAttribute(): string
  {
    return Carbon::parse($this->attributes['created_at'])->format('Y-m-d H:i');
  }

  public function getUpdatedAtAttribute(): string
  {
    return Carbon::parse($this->attributes['updated_at'])->format('Y-m-d H:i');
  }

  public function contact(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Contact::class);
  }

  public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function deal(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Deal::class);
  }
}
