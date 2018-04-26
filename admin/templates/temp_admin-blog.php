<a href="/admin/?admin=yes&ctrl=ArticleCreate">Создать новую статью</a>

<hr>

<table>
    <tr>
        <th>Id</th>
        <th>Заголовок</th>
        <th>Автор</th>
        <th>Редактировать</th>
        <th>Удалить</th>
        <th>Читать</th>
    </tr>
    <?php foreach ($this->articles as $article): ?>
    <tr>
        <td><?php echo $article->id; ?></td>
        <td><?php echo $article->title; ?></td>
        <?php if (isset($article->author->name)): ?>
            <td><?php echo $article->author->name; ?></td>
        <?php else: ?>
            <td>—</td>
        <?php endif; ?>
        <td><a href="/admin/?admin=yes&ctrl=Article&id=<?php echo $article->id; ?>">Редактировать</a></td>
        <td><a href="/admin/?admin=yes&ctrl=ArticleDelete&id=<?php echo $article->id; ?>">Удалить</a></td>
        <td><a href="/?ctrl=Article&id=<?php echo $article->id; ?>">Читать</a></td>
    </tr>
    <?php endforeach; ?>
</table>