<form action="/admin/admin-article-update.php?id=<?php echo $this->article->id; ?>" method="post">
    <label>
        <span>Заголовок:</span>
        <input type="text" value="<?php echo $this->article->title; ?>" name="title">
    </label>
    <br>
    <label>
        <span>Текст:</span>
        <textarea name="content"><?php echo $this->article->content; ?></textarea>
    </label>
    <br>
    <input type="submit" value="Сохранить">
</form>

<a href="/admin/admin-blog.php">Вернуться к списку статей</a>