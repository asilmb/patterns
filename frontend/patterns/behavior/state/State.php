<?php


namespace frontend\patterns\behavior\state;


abstract class State
{
	/**
	 * @var Context
	 */
	protected  $context;

	public function setContext(Context $context)
	{
		$this->context = $context;
	}

	abstract public function handle1(): string;

	abstract public function handle2(): string;
}