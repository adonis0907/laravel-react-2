<?php namespace AllanTatter\React;

use Illuminate\Contracts\Config\Repository as Config;

class React {

	private $config;
	private $url;
	private $port;

	public function __construct(Config $config)
	{
		$this->config = $config;

		$this->url = $this->config->get('react.url');
		$this->port = $this->config->get('react.port');
	}

	public function component($component, array $data = [])
	{
		$props = json_encode($data);

		return $this->render(
			'?component=' .
			urlencode($component) .
			'&props=' .
			urlencode($props)
		);
	}

	public function router($routes, array $data = [], $path = null)
	{
		$props = json_encode($data);

		if (is_null($path)) {
			$path = (\Request::path() == '/' ? '/' : '/' . \Request::path());
		}

		return $this->render(
			'?type=react-router' .
			'&routes=' .
			urlencode($routes) .
			'&path=' .
			urlencode($path) .
			'&props=' .
			urlencode($props)
		);
	}

	private function render($uri)
	{
		return @file_get_contents($this->url . ( ! is_null($this->port) ? ':' . $this->port : '') . $uri);
	}

}
