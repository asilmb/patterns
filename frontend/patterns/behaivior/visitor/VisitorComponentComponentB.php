<?php

namespace frontend\patterns\behaivior\visitor;

class VisitorComponentComponentB implements VisitorComponentInterface
{
	/**
	 * То же самое здесь: visitConcreteComponentB => ConcreteComponentB
	 */
	public function accept(VisitorInterface $visitor): string
	{
		return $visitor->visitConcreteComponentB($this);
	}

	public function specialMethodOfConcreteComponentB(): string
	{
		return "B";
	}
}