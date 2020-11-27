<?php


namespace frontend\patterns\behavior\observer;


/**
 * PHP имеет несколько встроенных интерфейсов, связанных с паттерном
 * Наблюдатель.
 *
 * Вот как выглядит интерфейс Издателя:
 *
 * @link http://php.net/manual/ru/class.splsubject.php
 *
 *     interface SplSubject
 *     {
 *         // Присоединяет наблюдателя к издателю.
 *         public function attach(SplObserver $observer);
 *
 *         // Отсоединяет наблюдателя от издателя.
 *         public function detach(SplObserver $observer);
 *
 *         // Уведомляет всех наблюдателей о событии.
 *         public function notify();
 *     }
 *
 * Также имеется встроенный интерфейс для Наблюдателей:
 *
 * @link http://php.net/manual/ru/class.splobserver.php
 *
 *     interface SplObserver
 *     {
 *         public function update(SplSubject $subject);
 *     }
 */

/**
 * Издатель владеет некоторым важным состоянием и оповещает наблюдателей о его
 * изменениях.
 */
class Subject implements \SplSubject
{
	/**
	 * @var int Для удобства в этой переменной хранится состояние Издателя,
	 * необходимое всем подписчикам.
	 */
	public $state;

	/**
	 * @var \SplObjectStorage Список подписчиков. В реальной жизни список
	 * подписчиков может храниться в более подробном виде (классифицируется по
	 * типу события и т.д.)
	 */
	private $observers;

	public function __construct()
	{
		$this->observers = new \SplObjectStorage();
	}

	/**
	 * Методы управления подпиской.
	 * @param \SplObserver $observer
	 */
	public function attach(\SplObserver $observer): void
	{
		/**"Subject: Attached an observer.\n";*/
		$this->observers->attach($observer);
	}

	public function detach(\SplObserver $observer): void
	{
		$this->observers->detach($observer);
		/**echo "Subject: Detached an observer.\n";*/
	}

	/**
	 * Запуск обновления в каждом подписчике.
	 */
	public function notify(): array
	{
		$result = [] ;
		/** "Subject: Notifying observers...\n";*/
		foreach ($this->observers as $observer) {
			$result[] = $observer->update($this);
		}
		return $result;
	}

	/**
	 * Обычно логика подписки – только часть того, что делает Издатель. Издатели
	 * часто содержат некоторую важную бизнес-логику, которая запускает метод
	 * уведомления всякий раз, когда должно произойти что-то важное (или после
	 * этого).
	 */
	public function someBusinessLogic(): array
	{
		/** \nSubject: I'm doing something important.\n";*/
		$this->state = rand(0, 10);

		/** "Subject: My state has just changed to: {$this->state}\n";*/
		return $this->notify();
	}
}