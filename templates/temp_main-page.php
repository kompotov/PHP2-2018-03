<ul>
    <?php foreach ($this->articles as $article): ?>
    <li>
        <h2><?php echo $article->title; ?></h2>
        <?php if ($article->author): ?>
            <small>Автор: <?php echo $article->author->name; ?></small>
        <?php else: ?>
            <small>Автор: —</small>
        <?php endif; ?>
        <p><?php echo $article->content; ?> <a href="/article.php?id=<?php echo $article->id; ?>">Читать дальше</a></p>
    </li>
    <?php endforeach; ?>
</ul>