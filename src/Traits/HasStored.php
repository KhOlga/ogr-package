<?php

namespace Okh\OgrPackage\Traits;

use Okh\OgrPackage\Models\Metric;
use Okh\OgrPackage\OgrPackage;

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

	public function storeImage(string $emailHash)
	{
		$ogrPackage = app(OgrPackage::class);
		$link = $ogrPackage->getUrl() . 'avatar/' . $emailHash . '.jpg';
		$file = storage_path('app/' . time() . '.jpg');
		file_put_contents($file, fopen($link, 'r'));

		return 201;
	}
}