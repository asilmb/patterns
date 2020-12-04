<?php

namespace frontend\patterns\structural\proxy;

/**
 * Реальный Субъект содержит некоторую базовую бизнес-логику. Как правило,
 * Реальные Субъекты способны выполнять некоторую полезную работу, которая к
 * тому же может быть очень медленной или точной – например, коррекция входных
 * данных. Заместитель может решить эти задачи без каких-либо изменений в коде
 * Реального Субъекта.
 */
class RealSubject implements Subject
{
	public function request(): string
	{
		return "RealSubject: Handling request.\n";
	}
}