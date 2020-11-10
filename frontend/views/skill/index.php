<?php
/**
 * @var $this yii\web\View
 * @var array $pageList
 */

$this->title = 'Skills';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Skills!</h1>

    </div>

    <ol>
		<?php
		foreach ($pageList as $key => $page) : ?>
            <li>
                <a href= <?= $key ?>> <?= $page['title'] ?></a>
            </li>
		<?php endforeach; ?>

    </ol>


</div>
