<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	use HasFactory;

	protected $fillable = [
		'text',
		'pinned',
		'completed',
		'date',
		'time',
		'type',
		'delayed',
		'contact_id',
		'company_id',
		'owner_id',
		'deal_id',
	];

	protected $casts = ["owner_id" => "integer", "contact_id" => "integer", "deal_id" => "integer", "company_id" => "integer", "delayed" => "boolean"];

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
