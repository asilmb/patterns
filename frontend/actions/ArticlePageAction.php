<?php

namespace frontend\actions;

use yii\base\Action;

class ArticlePageAction extends Action
{
	public $title;

	public function run()
	{
		$this->controller->view->title = $this->title;
		return $this->controller->render($this->id);
	}
}