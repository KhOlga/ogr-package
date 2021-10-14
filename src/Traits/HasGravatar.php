<?php

trait HasGravatar
{
	public function imageRequests(string $email)
	{
		$hash = $this->makeEmailHash($email);

		//TODO: connect to makeEmailHashGravatarAPI, get the data, return response json
	}

	public function profileRequest(string $email)
	{
		$hash = $this->makeEmailHash($email);
		//TODO: connect to makeEmailHashGravatarAPI, get the data, return response json
	}

	protected function makeEmailHash(string $data)
	{
		if ($data) {
			return md5($data);
		}
	}
}
