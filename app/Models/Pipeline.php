<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pipeline extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'order'];
  protected $cast = ['id' => 'integer', 'order' => 'integer'];
  protected $dates = [
    'created_at',
    'updated_at'
  ];


  public function getCreatedAtAttribute(): string
  {
    return Carbon::parse($this->attributes['created_at'])->format('d-m-Y H:i');
  }

  public function getUpdatedAtAttribute(): string
  {
    return Carbon::parse($this->attributes['updated_at'])->format('d-m-Y H:i');
  }

  public function Pipeline_Stages(): \Illuminate\Database\Eloquent\Relations\HasMany
  {
    return $this->hasMany(PipelineStage::class);
  }

  public function Pipeline_Stage(): \Illuminate\Database\Eloquent\Relations\HasOne
  {
    return $this->hasOne(PipelineStage::class);
  }
}
