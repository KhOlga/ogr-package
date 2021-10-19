<?php

namespace Okh\OgrPackage\Traits;

use Okh\OgrPackage\Models\Metric;

trait HasStored
{
	public function storeMetric(array $data, $userId)
	{
		$data['user_id'] = $userId;
		$data['avatar_path'] = '';
		$metric = Metric::create($data);

		if ($metric->save() === false) {
			return 417;
		}
	}

	public function storeImage()
	{
		//TODO: add store images logic, dir and file name get from config/ogr.php
	}
}