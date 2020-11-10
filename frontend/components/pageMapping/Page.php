<?php


namespace frontend\components\pageMapping;


use frontend\actions\ArticlePageAction;

class Page
{
	private $id;
	private $title;
	private $class = ArticlePageAction::class;

	/**
	 * Page constructor.
	 * @param string $id
	 * @param string $title
	 */
	public function __construct(string $id, string $title)
	{
		$this->id = $id;
		$this->title = $title;
	}


	public function toArray()
	{
		return [
			'class' => $this->class,
			'title' => $this->title
		];
	}

	/**
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}


}