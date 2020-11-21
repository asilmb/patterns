<?php ?>

<h1>State</h1>

<p>
    В контроллере BehaviorPatternsController по методу State есть пример реализации State

</p>

<a href="https://refactoring.guru/ru/design-patterns/visitor">Ссылка на подробную статью </a>

<p>
    Основная идея в том, что программа может находиться в одном из нескольких состояний, которые всё время сменяют друг
    друга. Набор этих состояний, а также переходов между ними, предопределён и конечен. Находясь в разных состояниях,
    программа может по-разному реагировать на одни и те же события, которые происходят с ней.
</p>
<p>
    Такой подход можно применить и к отдельным объектам. Например, объект Документ может принимать три состояния:
    Черновик, Модерация или Опубликован. В каждом из этих состоянии метод опубликовать будет работать по-разному:
</p>
<ul>
    <li>Из черновика он отправит документ на модерацию.</li>
    <li> Из модерации — в публикацию, но при условии, что это сделал администратор.</li>
    <li>В опубликованном состоянии метод не будет делать ничего.</li>
</ul>
<pre>
namespace RefactoringGuru\State\Conceptual;

/**
 * Контекст определяет интерфейс, представляющий интерес для клиентов. Он также
 * хранит ссылку на экземпляр подкласса Состояния, который отображает текущее
 * состояние Контекста.
 */
class Context
{
    /**
     * @var State Ссылка на текущее состояние Контекста.
     */
    private $state;

    public function __construct(State $state)
    {
        $this->transitionTo($state);
    }

    /**
     * Контекст позволяет изменять объект Состояния во время выполнения.
     */
    public function transitionTo(State $state): void
    {
        echo "Context: Transition to " . get_class($state) . ".\n";
        $this->state = $state;
        $this->state->setContext($this);
    }

    /**
     * Контекст делегирует часть своего поведения текущему объекту Состояния.
     */
    public function request1(): void
    {
        $this->state->handle1();
    }

    public function request2(): void
    {
        $this->state->handle2();
    }
}

/**
 * Базовый класс Состояния объявляет методы, которые должны реализовать все
 * Конкретные Состояния, а также предоставляет обратную ссылку на объект
 * Контекст, связанный с Состоянием. Эта обратная ссылка может использоваться
 * Состояниями для передачи Контекста другому Состоянию.
 */
abstract class State
{
    /**
     * @var Context
     */
    protected $context;

    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    abstract public function handle1(): void;

    abstract public function handle2(): void;
}

/**
 * Конкретные Состояния реализуют различные модели поведения, связанные с
 * состоянием Контекста.
 */
class ConcreteStateA extends State
{
    public function handle1(): void
    {
        echo "ConcreteStateA handles request1.\n";
        echo "ConcreteStateA wants to change the state of the context.\n";
        $this->context->transitionTo(new ConcreteStateB());
    }

    public function handle2(): void
    {
        echo "ConcreteStateA handles request2.\n";
    }
}

class ConcreteStateB extends State
{
    public function handle1(): void
    {
        echo "ConcreteStateB handles request1.\n";
    }

    public function handle2(): void
    {
        echo "ConcreteStateB handles request2.\n";
        echo "ConcreteStateB wants to change the state of the context.\n";
        $this->context->transitionTo(new ConcreteStateA());
    }
}

/**
 * Клиентский код.
 */
$context = new Context(new ConcreteStateA());
$context->request1();
$context->request2();
</pre>