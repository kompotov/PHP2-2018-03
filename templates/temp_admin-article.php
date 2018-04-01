<form action="/admin-article-update.php?id=<?php echo $article->id; ?>" method="post">
    <label>
        <span>Заголовок:</span>
        <input type="text" value="<?php echo $article->title; ?>" name="title">
    </label>
    <br>
    <label>
        <span>Текст:</span>
        <textarea name="content"><?php echo $article->content; ?></textarea>
    </label>
    <br>
    <input type="submit" value="Сохранить">
</form>

<a href="/admin-blog.php">Вернуться к списку статей</a>