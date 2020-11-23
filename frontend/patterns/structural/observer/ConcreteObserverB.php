<?php


namespace frontend\patterns\structural\observer;


class ConcreteObserverB implements \SplObserver
{
	public function update(\SplSubject $subject): string
	{
		if ($subject->state == 0 || $subject->state >= 2) {
			return "ConcreteObserverB: Reacted to the event.\n";
		}
	}
}