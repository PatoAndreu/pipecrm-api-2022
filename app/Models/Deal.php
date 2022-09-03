<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Deal extends Model
{
  use HasFactory;

  protected $dates = [
    'created_at',
    'updated_at'
  ];

  public function getCreatedAtAttribute()
  {
    return  Carbon::parse($this->attributes['created_at'])->format('d-m-Y H:i');
    // return  Carbon::parse($this->attributes['created_at'])->diffForHumans();
  }

  public function getUpdatedAtAttribute()
  {
    return  Carbon::parse($this->attributes['updated_at'])->diffForHumans();
  }

  public function Contact()
  {
    return $this->belongsTo(Contact::class);
  }

  public function Pipeline()
  {
    return $this->belongsTo(Pipeline::class);
  }

  public function Pipeline_Stage()
  {
    return $this->belongsTo(PipelineStage::class, 'pipeline_stage_id');
  }

  public function Company()
  {
    return $this->belongsTo(Company::class);
  }

  public function Owner()
  {
    return $this->belongsTo(User::class);
  }
}
