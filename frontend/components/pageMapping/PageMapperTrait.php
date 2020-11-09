<?php


namespace frontend\components\pageMapping;


use Yii;
use yii\helpers\ArrayHelper;

trait PageMapperTrait
{
	private function getMappedPages()
	{
		return ArrayHelper::toArray(Yii::$app->params($this->id));
	}
}