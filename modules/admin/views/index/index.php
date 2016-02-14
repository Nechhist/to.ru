<?php
    use yii\helpers\Html;
?>
<div class="container">

    <h1>А Д М И Н К А</h1>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">
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
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">

    </div>

</div>
