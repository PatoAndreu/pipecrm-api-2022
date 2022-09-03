<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
  use HasFactory;

  public function Pipeline_Stages()
  {
    return $this->hasMany(PipelineStage::class);
  }

  public function Pipeline_Stage()
  {
    return $this->hasOne(PipelineStage::class);
  }
}
