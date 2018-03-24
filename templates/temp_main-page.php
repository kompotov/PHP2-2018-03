<ul>
    <?php foreach ($data as $article): ?>
    <li>
        <h2><?php echo $article->title; ?></h2>
        <p><?php echo $article->content; ?> <a href="/article.php?id=<?php echo $article->id; ?>">Читать дальше</a></p>
    </li>
    <?php endforeach; ?>
</ul>