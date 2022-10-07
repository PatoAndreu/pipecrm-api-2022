<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'order'];
  protected $cast = ['id' => 'integer', 'order' => 'integer'];

  public function Pipeline_Stages(): \Illuminate\Database\Eloquent\Relations\HasMany
  {
    return $this->hasMany(PipelineStage::class);
  }

  public function Pipeline_Stage(): \Illuminate\Database\Eloquent\Relations\HasOne
  {
    return $this->hasOne(PipelineStage::class);
  }
}
