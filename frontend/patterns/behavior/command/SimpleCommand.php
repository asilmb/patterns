<?php


namespace frontend\patterns\behavior\command;


/**
 * Некоторые команды способны выполнять простые операции самостоятельно.
 */
class SimpleCommand implements Command
{
	private $payload;

	public function __construct(string $payload)
	{
		$this->payload = $payload;
	}

	public function execute(): void
	{
		echo "SimpleCommand: See, I can do simple things like printing (" . $this->payload . ")\n";
	}
}