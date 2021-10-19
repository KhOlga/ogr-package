<?php

use Okh\OgrPackage\OgrPackage;

trait HasGravatar
{
	public function imageRequests(string $email, int $size, string $default)
	{
		$hash = $this->makeEmailHash($email);
		$ogrPackage = app(OgrPackage::class);

		return $ogrPackage->getUrl() . 'avatar/' . $hash . '?d=' . urlencode($default) . "&s=" . $size;
	}

	public function profileDataRequest(string $email)
	{
		$hash = $this->makeEmailHash($email);
		$ogrPackage = app(OgrPackage::class);
		$link = $ogrPackage->getUrl() . $hash . '.json';

		return  $ogrPackage->parseData($ogrPackage->getJsonData($link));
	}

	protected function makeEmailHash(string $data)
	{
		if ($data) {
			return md5($data);
		}
	}
}
