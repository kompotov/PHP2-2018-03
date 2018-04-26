<h1><?php echo $this->article->title; ?></h1>
<?php if (isset($article->author->name)): ?>
    <small>Автор: <?php echo $this->article->author->name; ?></small>
<?php else: ?>
    <small>Автор: —</small>
<?php endif; ?>
<p><?php echo $this->article->content; ?></p>
<p><a href="/index.php">Назад</a></p>