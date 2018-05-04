<table>
    <tr>
        <?php foreach ($this->functions as $name => $function): ?>
            <th><?= $name ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($this->models as $model): ?>
        <tr>
            <?php foreach ($this->functions as $function): ?>
                <td><?= $function($model); ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
