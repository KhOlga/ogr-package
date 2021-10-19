<?php

namespace Okh\OgrPackage\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Metric extends Model
{
	protected $fillable = [
		'hash',
		'request_hash',
		'profile_url',
		'preferred_username',
		'thumbnail_url',
		'photos_value',
		'photos_type',
		'name',
		'displayed_name',
		'urls',
		'avatar_path',
		'user_id'
	];

	public function user(): HasOne
	{
		$model = config('ogr.models.user');
		return $this->hasOne($model);
	}
}