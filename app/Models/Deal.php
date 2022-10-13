<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Deal extends Model
{
  use HasFactory;

  protected $dates = [
    'created_at',
    'updated_at'
  ];

  protected $fillable = [
    'name',
    'amount',
    'priority',
    'type',
    'order',
    'close_date',
    'pipeline_id',
    'pipeline_stage_id',
    'contact_id',
    'company_id',
    'owner_id'
  ];

  const ORDER_GAP = 60000;
  const ORDER_MIN = 0.00002;

  public static function booted()
  {
    static::creating(function ($model) {
      $model->order = self::query()->where('pipeline_stage_id', $model->pipeline_stage_id)->orderByDesc('order')->first()?->order + self::ORDER_GAP;
    });

    static::addGlobalScope(fn ($query) => $query->orderBy('order'));

    static::saved(function ($model) {
      if ($model->order < self::ORDER_MIN) {
        DB::statement("SET @previousOrder := 0");
        DB::statement(
          "
          UPDATE deals
          SET order = (@previousOrder := @previousOrder + ?)
          WHERE pipeline_stage_id = ?
          ORDER BY order
        ",
          [
            self::ORDER_GAP,
            $model->pipeline_stage_id
          ]
        );
      }
    });
  }

  public function getCreatedAtAttribute(): string
  {
    return Carbon::parse($this->attributes['created_at'])->format('d-m-Y H:i');
    // return  Carbon::parse($this->attributes['created_at'])->diffForHumans();
  }

  public function getUpdatedAtAttribute(): string
  {
    return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
  }

  public function Contact(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Contact::class);
  }

  public function Pipeline(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Pipeline::class);
  }

  public function Pipeline_Stage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(PipelineStage::class, 'pipeline_stage_id');
  }

  public function Company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  public function Owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
