<?php


namespace frontend\patterns\behavior\observer;

/**
 * Конкретные Наблюдатели реагируют на обновления, выпущенные Издателем, к
 * которому они прикреплены.
 */
class ConcreteObserverA implements \SplObserver
{
	public function update(\SplSubject $subject)
	{
		if ($subject->state < 3) {
			return "ConcreteObserverA: Reacted to the event < 3.\n";
		}
		return '';
	}
}