<?php
    use yii\helpers\Html;
    use app\models\T;

    $redis = Yii::$app->redis;
?>
<div class="container">

    <h1>А Д М И Н К А</h1>

    <!-- Основные ссылки разделов --->
    <div class="col-lg-5 col-md-5 col-sm-5 col-xm-12">
        <h2>Основные разделы</h2>
        <ul>
            <li><?=Html::a('Турниры', '/admin/t', ['target' => '_blank'])?></li>
            <li><?=Html::a('Турнирные сетки', '/admin/season', ['target' => '_blank'])?></li>
            <li><?=Html::a('Новости/события', '/admin/news', ['target' => '_blank'])?></li>
            <li><?=Html::a('Главный чат', '/admin/chatmain', ['target' => '_blank'])?></li>
            <li><?=Html::a('Турнирные чаты', '/admin/msgs', ['target' => '_blank'])?></li>
            <li><?=Html::a('Обратная связь', '/admin/contact', ['target' => '_blank'])?></li>
            <li><?=Html::a('Пользователи', '/admin/user', ['target' => '_blank'])?></li>
        </ul>

        <hr />

        <h3>Последние зарег. пользователи</h3>
        <table class="table" style="border: 1px solid black">
            <thead>
            <tr>
                <th>id</th>
                <th>имя</th>
                <th>время регистрации</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($users as $item){?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=Html::encode($item['username'])?></td>
                <td><?=date("d.m.y (H:i)", $item['created_at'])?></td>
                <?php } ?>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-7 col-xm-12">
        <div style="text-align: right">
            Всего хостов: <?=count($redis->keys('visitors_uni:*'))?> (с 14.02.2016)
        </div>

        <h2>Последние измененные турниры</h2>
        <table class="table" style="border: 1px solid black">
            <thead>
            <tr>
                <th>id</th>
                <th>турнир</th>
                <th>сезон</th>
                <th>time_update</th>
                <th>хосты</th>
                <th>хиты</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach($seasons as $item){ ?>
                <tr>
                    <td><?=$item['id']?></td>
                    <td><?=Html::a(T::name($item['t_id']), '/t/view/' . $item['t_id'])?></td>
                    <td><?=Html::encode($item['name'])?></td>
                    <td><?=date("D.m.y H:i", $item['time_update'])?></td>
                    <td><?=$redis->get('visitors_uni:id:' . $item['t_id'])?></td>
                    <td><?=$redis->get('visitors_all:id:' . $item['t_id'])?></td>
                <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>

</div>
