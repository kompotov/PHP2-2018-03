<a href="/admin-article.php?action=new">Создать новую статью</a>

<hr>

<table>
    <tr>
        <th>Id</th>
        <th>Заголовок</th>
        <th>Редактировать</th>
        <th>Удалить</th>
        <th>Читать</th>
    </tr>
    <?php foreach ($data as $article): ?>
    <tr>
        <td><?php echo $article->id; ?></td>
        <td><?php echo $article->title; ?></td>
        <td><a href="/admin-article.php?id=<?php echo $article->id; ?>">Редактировать</a></td>
        <td><a href="/admin-article.php?id=<?php echo $article->id; ?>&action=delete">Удалить</a></td>
        <td><a href="/article.php?id=<?php echo $article->id; ?>">Читать</a></td>
    </tr>
    <?php endforeach; ?>
</table>