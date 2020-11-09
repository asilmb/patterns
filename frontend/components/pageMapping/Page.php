<?php


namespace frontend\components\pageMapping;


class Page
{
	private $uri;
	private $viewName;

	/**
	 * Page constructor.
	 * @param string $uri
	 * @param string $viewName
	 */
	public function __construct(string $uri,string $viewName)
	{
		$this->uri = $uri;
		$this->viewName = $viewName;
	}
}