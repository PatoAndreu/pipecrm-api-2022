<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PipelineStage extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'probability_of_close', 'pipeline_id'];

  public function Pipeline()
  {
    return $this->belongsTo(Pipeline::class);
  }

  public function Deals()
  {
    return $this->hasMany(Deal::class);
  }
}
