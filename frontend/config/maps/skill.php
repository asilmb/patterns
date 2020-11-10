<?php

use frontend\components\pageMapping\Page;


return ['skill' => [
	new Page('double-dispatch', 'Double Dispatch (двойная диспетчеризация)'),
	new Page('late-dynamic-binding', 'Late / dynamic linking (Позднее/динамическое связывание)'),
	new Page('early-static-binding', 'Early static binding (Раннее/статическое связывание)')
]];