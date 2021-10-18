<?php

namespace Okh\OgrPackage\Traits;

use Okh\OgrPackage\Models\Metric;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasMetric
{
	public function metric(): HasOne
	{
		return $this->hasOne(Metric::class);
	}
}