<?php

namespace frontend\repositories;

use frontend\models\Page;
use yii\base\Controller;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class PageRepository implements PageRepositoryInterface
{
	/**
	 * @var Page $model
	 */
	private $model = Page::class;
	/**
	 * @var array $condition
	 */
	private $condition;

	/**
	 * @param Controller $context
	 * @param mixed $condition
	 */
	public function setCondition(Controller $context, $condition): void
	{
		$this->condition = array_merge($condition, ['context_id' => $context->id]);
	}

	public function all(Controller $context, array $condition)
	{
		$this->setCondition($context, $condition);
		return new ActiveDataProvider([
			'query' => $this->model::find()->where($this->condition),
			'pagination' => [
				'pageSize' => 10,
			],
		]);
	}

	public function one(Controller $context, array $condition)
	{
		$this->setCondition($context, $condition);
		if (($model = $this->model::findOne($this->condition)) !== null) {
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}

	public function add(Controller $context, array $condition)
	{
		// TODO: Implement add() method.
	}
}