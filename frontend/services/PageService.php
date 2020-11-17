<?php
namespace frontend\services;

use frontend\repositories\PageRepositoryInterface;
use yii\base\Controller;
use yii\data\ActiveDataProvider;

/**
 * Class StoreService
 *
 * @property-read PageRepositoryInterface $repository
 */
class PageService implements PageServiceInterface
{
	/**
	 * @var PageRepositoryInterface $repository
	 */
	public $repository;

	public function __construct(PageRepositoryInterface $repository = null)
	{
		$this->repository = $repository;
	}

	public function all(Controller $context, $condition = [])
	{
		return $this->repository->all($context, $condition);
	}

	public function one(Controller $context, $condition = [])
	{
		return $this->repository->one($context, $condition);
	}

	public function add(Controller $context, $condition = [])
	{
		return $this->repository->add($context, $condition);
	}
}