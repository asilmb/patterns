<?php

namespace frontend\actions;

use yii\base\Action;

class ArticlePageAction extends Action
{
	public $viewName;

	public function run()
	{
		return $this->controller->render($this->id );
	}
}