<?php

namespace frontend\repositories;

use yii\base\Controller;

interface PageRepositoryInterface
{

	public function all(Controller $context, array $condition);

	public function one(Controller $context, array $condition);

	public function add(Controller $context, array $condition);


}