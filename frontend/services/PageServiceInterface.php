<?php


namespace frontend\services;


use yii\base\Controller;
use yii\data\ActiveDataProvider;

interface PageServiceInterface
{
	public function all(Controller $context, $condition = []);
	public function one(Controller $context, $condition = []);

}