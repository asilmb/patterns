<?php

namespace frontend\tests\unit\models;

use frontend\components\pageMapping\Page;
use frontend\components\pageMapping\PageMapperTrait;
use frontend\exceptions\PageMapperParamsEmptyException;
use Yii;

class PageMapperTest extends \Codeception\Test\Unit
{
	/**
	 * @var \frontend\tests\UnitTester
	 */
	use PageMapperTrait;

	private $id = 'test';

	public function _prepareTestPages()
	{
		Yii::$app->params[$this->id] = [
			new Page('late-dynamic-binding', 'Late / dynamic linking (Позднее/динамическое связывание)'),
			new Page('early-static-binding', 'Early static binding (Раннее/статическое связывание)'),
			new Page('double-dispatch', 'Double Dispatch (двойная диспетчеризация)')
		];
	}

	public function testPagesNotFound()
	{
		try {
			$model = $this->getMappedPages();
		} catch (PageMapperParamsEmptyException $e) {

		}
	}

	public function testPagesList()
	{
		$this->_prepareTestPages();
		$model = $this->getMappedPages();
	}
}
