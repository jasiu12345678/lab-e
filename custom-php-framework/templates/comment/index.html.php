<?php

/** @var \App\Model\Comment[] $comments */
/** @var \App\Service\Router $router */

$title = 'Comments';
$bodyClass = 'index';

ob_start(); ?>
    <h1>Comments</h1>

    <p style="margin: 1em 0 1.5em;"><a href="<?= $router->generatePath('comment-create') ?>">Create new</a></p>

    <ul class="index-list">
        <?php foreach ($comments as $comment): ?>
            <li style="display: flex; align-items: baseline; gap: 1em; border-bottom: 1px solid #ddd; padding: 0.4em 0;">
                <span style="font-size: 0.85em;">
                    <?= htmlspecialchars($comment->getContent()) ?>
                    <small style="font-size: 0.85em;">— <?= htmlspecialchars($comment->getAuthor()) ?></small>
                </span>
                <ul class="action-list" style="margin: 0; font-size: 0.75em;">
                    <li><a href="<?= $router->generatePath('comment-show', ['id' => $comment->getId()]) ?>">Details</a></li>
                    <li><a href="<?= $router->generatePath('comment-edit', ['id' => $comment->getId()]) ?>">Edit</a></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
