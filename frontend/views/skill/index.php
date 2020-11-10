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
		foreach ($pageList as $page) : ?>
            <a href = <?php "{$this->context->id}/{$page->id}" ?>> <?= $page->title ?></a >
		<?php endforeach; ?>

    </ol>


</div>
