<?php
    use app\models\Season;
?>
<div class="container">

    <h3>Сравнительная таблица "Виды турнирных сеток"</h3>
    <table class="table table-striped .table-bordered table-responsive">
        <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Тип</th>
            <th>Кол-во участников</th>
            <th>3 место</th>
            <th>Сетка лузеров</th>
            <th>Пример</th>
        </tr>
        </thead>
        <?php
        foreach(Season::nets() as $one){ ?>
        <tbody>
        <tr>
            <td><?php echo $one['name'] ?></td>
            <td><?php echo $one['opisanie'] ?></td>
            <td><?php if($one['type']==1) echo 'Дерево'; if($one['type']==2) echo 'Группы'; if($one['type']==2) echo 'Круговая'; ?></td>
            <td><?php echo $one['count'] ?></td>
            <td><?php if($one['3place']==1) echo 'есть';  if($one['3place']==0) echo 'нет'; ?></td>
            <td><?php if($one['luser']==1) echo 'есть';  if($one['luser']==0) echo 'нет'; ?></td>
            <td><a href="<?php echo Yii::$app->urlManager->createUrl(['t/season', 'id'=>$one['example']]); ?>" target="_blank">смотреть пример</td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

</div>