<?php


namespace frontend\patterns\structural\adapter;

/**
 * Легковес хранит общую часть состояния (также называемую внутренним
 * состоянием), которая принадлежит нескольким реальным бизнес-объектам.
 * Легковес принимает оставшуюся часть состояния (внешнее состояние, уникальное
 * для каждого объекта)  через его параметры метода.
 */
class Flyweight
{
	private $sharedState;

	public function __construct($sharedState)
	{
		$this->sharedState = $sharedState;
	}

	public function operation($uniqueState): string
	{
		$s = json_encode($this->sharedState);
		$u = json_encode($uniqueState);
		return "Flyweight: Displaying shared ($s) and unique ($u) state.\n";
	}
}