<?php


namespace frontend\patterns\behavior\state;


class Context
{
	private  $state;

	public function __construct(State $initialState)
	{
		$this->changeState($initialState);
	}

	/**
	 * @param State $state
	 */
	public function changeState(State $state): void
	{
		$this->state = $state;
		$this->state->setContext($this);
	}

	/**
	 * Контекст делегирует часть своего поведения текущему объекту Состояния.
	 */
	public function request1(): string
	{
		return $this->state->handle1();
	}

	public function request2(): string
	{
		return $this->state->handle2();
	}
}