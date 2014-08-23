<?php
namespace Widget\Http;

use Klein;

class Response extends Klein\Response {

	/**
	 * @var EngineInterface
	 */
	var $engine;

	/**
	 * @param EngineInterface $engine
	 */
	public function __construct(EngineInterface $engine)
	{
		$this->setEngine($engine);
		parent::__construct();
	}

	/**
	 * @param $engine
	 */
	public function setEngine($engine)
	{
		$this->engine = $engine;
	}

	/**
	 * @param       $template
	 * @param array $parameters
	 * @return string
	 */
	public function render($template, $parameters = [])
	{
		$this->setHeaders($this->engine->headers);
		return $this->engine->render($template, $parameters);
	}

	/**
	 * @param $headers
	 */
	protected function setHeaders($headers)
	{
		foreach ($headers as $header => $value)
		{
			$this->header($header, $value);
		}
	}

}