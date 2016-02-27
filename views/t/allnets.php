<?php
    use app\models\Season;
    use yii\helpers\Html;
?>

<div class="container">
    <h3>Сравнительная таблица "Виды турнирных сеток"</h3>
    <h4 style="text-align: center">Турнирные сетки типа "Дерево"</h4>
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
        <tbody>
        <?php foreach(Season::nets() as $one){
            if ($one['type'] == 1) { ?>
                <tr>
                    <td><?php echo $one['name'] ?></td>
                    <td><?php echo $one['opisanie'] ?></td>
                    <td><?php if($one['type']==1) echo 'Дерево'; if($one['type']==2) echo 'Группы'; if($one['type']==3) echo 'Круговая'; ?></td>
                    <td><?php echo $one['count'] ?></td>
                    <td><?php if($one['3place']==1) echo 'есть';  if($one['3place']==0) echo 'нет'; ?></td>
                    <td><?php if($one['luser']==1) echo 'есть';  if($one['luser']==0) echo 'нет'; ?></td>
                    <td><?=Html::a('смотреть пример', '/season/' . $one['example'], ['target' => '_blank'])?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>

    <hr />
    <h4 style="text-align: center">Турнирные сетки типа "Групповые"</h4>
    <table class="table table-striped .table-bordered table-responsive">
        <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Тип</th>
            <th>Кол-во участников</th>
            <th>Кол-во групп</th>
            <th>Участников в группе</th>
            <th>Пример</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach(Season::nets() as $one){
            if ($one['type'] == 2) { ?>
                <tr>
                    <td><?php echo $one['name'] ?></td>
                    <td><?php echo $one['opisanie'] ?></td>
                    <td><?php if($one['type']==1) echo 'Дерево'; if($one['type']==2) echo 'Группы'; if($one['type']==3) echo 'Круговая'; ?></td>
                    <td><?php echo $one['count'] ?></td>
                    <td><?php echo $one['3place']; ?></td>
                    <td><?php echo $one['luser']; ?></td>
                    <td><?=Html::a('смотреть пример', '/season/' . $one['example'])?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>

    <hr />

    <h4 style="text-align: center">Турнирные сетки типа "Круговые"</h4>
    <table class="table table-striped .table-bordered table-responsive">
        <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Тип</th>
            <th>Кол-во участников</th>
            <th></th>
            <th>Кол-во игр на одного участника</th>
            <th>Пример</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach(Season::nets() as $one){
            if ($one['type'] == 3) { ?>
                <tr>
                    <td><?php echo $one['name'] ?></td>
                    <td><?php echo $one['opisanie'] ?></td>
                    <td><?php if($one['type']==1) echo 'Дерево'; if($one['type']==2) echo 'Группы'; if($one['type']==3) echo 'Круговая'; ?></td>
                    <td><?php echo $one['count'] ?></td>
                    <td><?php echo $one['3place']; ?></td>
                    <td><?php echo $one['luser']; ?></td>
                    <td><?=Html::a('смотреть пример', '/season/' . $one['example'])?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
    <div class="grey">Сетки в разработке.</div>
</div>