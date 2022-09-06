<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PipelineStage extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'probability_of_close', 'pipeline_id'];
	protected $casts = ['probability_of_close' => 'integer','pipeline_id' => 'integer'];

  public function Pipeline(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
    return $this->belongsTo(Pipeline::class);
  }

  public function Deals(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
    return $this->hasMany(Deal::class);
  }
}
