<?php

use Okh\OgrPackage\OgrPackage;

trait HasGravatar
{
	public function imageRequests(string $email, int $size, string $default)
	{
		$hash = $this->makeEmailHash($email);
		$ogrPackage = app(OgrPackage::class);
		$link = $ogrPackage->getUrl() . 'avatar/' . $hash . '?d=' . urlencode($default) . "&s=" . $size;

		return response()->json($link);
	}

	public function profileDataRequest(string $email)
	{
		$hash = $this->makeEmailHash($email);
		$ogrPackage = app(OgrPackage::class);
		$link = $ogrPackage->getUrl() . $hash . '.json';
		$data = $ogrPackage->getJsonData($link);

		return response()->json($data);
	}

	protected function makeEmailHash(string $data)
	{
		if ($data) {
			return md5($data);
		}
	}
}
