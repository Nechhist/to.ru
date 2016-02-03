<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
?>


<table style="width: 100%">
    <tr style="vertical-align: top;">
        <td>
            <table style="padding-top: 10px; width: 100%;">
                <tr>
                    <td>
                        <span style="color: #000000; font-size: xx-large; font-weight: bold;">Пользователи</span>
                    </td>
                    <td onclick='document.location.href = "<?php echo Yii::$app->request->baseUrl; ?>/t/create"' class="td_link_creat_tournament">
                        Создать_свой_турнир
                    </td>
                </tr>
            </table>

            <div class="tbl_t">
                <table style="width: 100%">
                    <thead>
                    <td>ID</td>
                    <td>Имя</td>
                    <td>Дата регистрации</td>
                    <td>Дата посл.активности</td>
                    </thead>
                    <?php foreach($users as $one){ ?>
                        <tr>
                            <td><?php echo $one->id; ?></td>
                            <td><a href="<?php echo Yii::$app->request->baseUrl; ?>/user/view/<?php echo $one['id'] ?>" ><?php echo HTML::encode($one->username); ?></a></td>
                            <td><?php echo date('d.m.y в H:i', $one->created_at); ?></td>
                            <td><?php echo date('d.m.y в H:i', $one->updated_at); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </td>
        <td style="width: 280px">
            <div style="margin-left: 20px">
                <h2>Поиск турнира</h2>
                <input type="text" id="text_search_t" style="width: 150px" placeholder="Название турнира..." />
                <button onclick="search_t()"> >>> </button>
                <p></p>
                <div id="result_search_t"></div>
            </div>
        </td>
    </tr>
</table>




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
