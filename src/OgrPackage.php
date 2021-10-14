<?php

namespace Okh\OgrPackage;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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
		if (!isset($this->config['host']) || !isset($this->config['key'])) {
			throw new InvalidArgumentException('Config for [Gravatar API service] is not valid.');
		}
	}

	private function createClient()
	{
		$this->client = new Client([
			'base_uri' => $this->config['host'],
			'token' => $this->config['key'],
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
	public function getIPs($link)
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
}