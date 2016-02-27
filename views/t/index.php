<?php

use app\models\User;
use yii\helpers\Html;

$this->title = 'Турниры | '.Yii::$app->name;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Турнир онлайн, турнирные сетки, турниры']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Список и поиск турниров']);

?>

<div class="container">
    <div class="row">
        <input type="text" id="text_search_t" style="width: 250px" placeholder="Название турнира..." />
        <button onclick="search_t()"  class="button_creat_tournament">
            Найти турнир
        </button>

        <button onclick= <?php if(!Yii::$app->user->isGuest){ ?> 'document.location.href = "<?php echo Yii::$app->request->baseUrl; ?>/t/create";' <?php }else{ ?>'alert("Вы должны зарегистрироваться.")'<?php } ?> class="button_creat_tournament">
            Создать свой турнир
        </button>

        <div id="result_search_t"></div>
    </div>

    <div class="row" style="margin-top: 15px">
        <h2 style="margin: 5px; padding: 5px">Последние созданные турниры</h2>
            <table class="tbl_t" style="width: 100%">
                <thead>
                    <td>ID</td>
                    <td>Название</td>
                    <td>Игра</td>
                    <td>Создатель</td>
                    <td>Дата создания</td>
                </thead>
                <tbody>
                <?php foreach($ts as $one){ ?>
                    <tr>
                        <td><?php echo $one->id; ?></td>
                        <td><?=Html::a(HTML::encode($one->name), '/' . $one['id'])?></td>
                        <td><?php echo HTML::encode($one->game); ?></td>
                        <td><?php echo User::name($one->admin_id); ?></td>
                        <td><?php echo date('d.m.y в H:i', $one->time); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </div>
</div>



<script>
    function search_t(){
        var text = $('#text_search_t').val();
        //alert(text);
        if(text!=null){
            $.ajax({
                type: "GET",
                url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxsearch']) ?>",
                data: "text="+text,
                success: function(data){
                    $('#result_search_t').html(data);
                }
            });
        }
    }
</script>