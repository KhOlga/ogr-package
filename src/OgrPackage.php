<?php

namespace Okh\OgrPackage;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\InvalidArgumentException;
use GuzzleHttp\Exception\RequestException;

class OgrPackage
{
	private $config;

	/** @var Client */
	private $client;
	private $tries;

	/**
	 * OgrPackage constructor.
	 * @param $config
	 */
	public function __construct($config)
	{
		$this->config = $config;
		$this->validateConfig();
		$this->createClient();
	}

	private function validateConfig()
	{
		if (!isset($this->config['host'])) {
			throw new InvalidArgumentException('Config is not valid.');
		}
	}

	private function createClient()
	{
		$this->client = new Client([
			'base_uri' => $this->config['host'],
			'headers' => [
				'Content-Type' => 'application/json'
			]
		]);
	}

	public function getUrl()
	{
		return $this->config['host'];
	}

	/**
	 * @param $link
	 * @return mixed
	 * @throws GuzzleException
	 */
	public function getJsonData($link)
	{
		return $this->send('GET', $link);
	}

	/**
	 * @param string $method
	 * @param $link
	 * @param array $data
	 * @return mixed
	 * @throws GuzzleException
	 */
	private function send(string $method, $link)
	{
		if ($this->tries < 5) {
			try {
				$request = $this->client->request($method, $link);
				$this->tries = 0;
				return json_decode($request->getBody(), true);
			} catch (GuzzleException $e) {
				//TODO: handle exception
				++$this->tries;
				$this->send($method, $link);
			}
		}
	}

	/**
	 * @param array $inputData
	 * @return array
	 */
	public function parseData(array $inputData)
	{
		$data = [];

		if (!empty($inputData['entry'])) {
			if (!empty($inputData['entry'][0])) {
				$data['hash'] = $inputData['entry'][0]['hash'];
				$data['request_hash'] = $inputData['entry'][0]['requestHash'];
				$data['profile_url'] = $inputData['entry'][0]['profileUrl'];
				$data['preferred_username'] = $inputData['entry'][0]['preferredUsername'];
				$data['thumbnail_url'] = $inputData['entry'][0]['thumbnailUrl'];

				if(empty($inputData['entry'][0]['name'])) {
					$data['name'] = '';
				}

				$data['displayed_name'] = $inputData['entry'][0]['displayName'];

				if(empty($inputData['entry'][0]['urls'])) {
					$data['urls'] = '';
				}

				if(!empty($inputData['entry'][0]['photos'])) {
					$data['photos_value'] = $inputData['entry'][0]['photos'][0]['value'];
					$data['photos_type'] = $inputData['entry'][0]['photos'][0]['type'];
				}
			}
		}
		return $data;
	}
}