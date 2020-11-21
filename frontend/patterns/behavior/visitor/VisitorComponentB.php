<?php

namespace frontend\patterns\behavior\visitor;

class VisitorComponentB implements VisitorComponentInterface
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