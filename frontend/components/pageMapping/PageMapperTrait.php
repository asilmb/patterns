<?php


namespace frontend\components\pageMapping;


use frontend\exceptions\PageMapperParamsEmptyException;
use Yii;
use yii\helpers\ArrayHelper;

trait PageMapperTrait
{
	private function getMappedPages()
	{
		$pages = [];
		if(empty(Yii::$app->params[$this->id])){
			throw new PageMapperParamsEmptyException();
		}
		foreach (Yii::$app->params[$this->id] as $page){
			/** @var Page $page */
			$pages[$page->getId()] = $page->toArray();
		}
		return $pages;
	}

}