<?php

use app\models\User;
use yii\helpers\Html;

$this->title = 'Турниры | '.Yii::$app->name;
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <input type="text" id="text_search_t" style="width: 150px" placeholder="Название турнира..." />
            <button onclick="search_t()"> Найти турнир </button>
            <p></p>
            <div id="result_search_t"></div>
        </div>
        <div class="col-lg-3">
            <span onclick= <?php if(!Yii::$app->user->isGuest){ ?> 'document.location.href = "<?php echo Yii::$app->request->baseUrl; ?>/t/create";' <?php }else{ ?>'alert("Вы должны зарегистрироваться.")'<?php } ?> class="button_creat_tournament">
                Создать свой турнир
            </span>
        </div>
    </div>

    <div class="row tbl_t">
            <h2 style="margin: 0; padding: 0">Последние созданные турниры</h2>
            <table style="width: 100%">
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
                            <td><a href="<?php echo Yii::$app->request->baseUrl; ?>/t/view/<?php echo $one['id'] ?>" ><?php echo HTML::encode($one->name); ?></a></td>
                            <td><?php echo HTML::encode($one->game); ?></td>
                            <td><?php echo User::name($one->admin_id); ?></td>
                            <td><?php echo date('d.m.y в H:i', $one->time); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </div>



        </div>
        <div class="row">

        </div>
    </div>
</div>



<script>
    function search_t(){
        var text = $('#text_search_t').val();
        //alert(text);
        if(text!=null){
            $.ajax({
                type: "GET",
                url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxsearcht']) ?>",
                data: "text="+text,
                success: function(data){
                    $('#result_search_t').html(data);
                }
            });
        }
    }
</script>