<?php


namespace frontend\patterns\structural\proxy;


/**
 * Интерфейс Заместителя идентичен интерфейсу Реального Субъекта.
 */
class Proxy implements Subject
{
	/**
	 * @var RealSubject
	 */
	private $realSubject;

	/**
	 * Заместитель хранит ссылку на объект класса РеальныйСубъект. Клиент может
	 * либо лениво загрузить его, либо передать Заместителю.
	 */
	public function __construct(RealSubject $realSubject)
	{
		$this->realSubject = $realSubject;
	}

	/**
	 * Наиболее распространёнными областями применения паттерна Заместитель
	 * являются ленивая загрузка, кэширование, контроль доступа, ведение журнала
	 * и т.д. Заместитель может выполнить одну из этих задач, а затем, в
	 * зависимости от результата, передать выполнение одноимённому методу в
	 * связанном объекте класса Реального Субъект.
	 */
	public function request(): string
	{
		if ($this->checkAccess()) {
			$result = $this->realSubject->request();
			$this->logAccess();
		}
		return $result;
	}

	private function checkAccess(): bool
	{
		// Некоторые реальные проверки должны проходить здесь.
		echo "Proxy: Checking access prior to firing a real request.\n";

		return true;
	}

	private function logAccess(): void
	{
		echo "Proxy: Logging the time of request.\n";
	}
}