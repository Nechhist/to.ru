<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Season;
$this->title = 'Изменение турнира '.HTML::encode($t->name).' | '.Yii::$app->name;
?>

<style>
    .tbl_season_delete td{
        width : 100%;
        margin: 3px;
        padding: 3px;
        background-color: #00b3ee;
        text-align: center;
    }
</style>

<table>
    <tr>
        <td style="vertical-align: top; border: 3px solid #39b3d7; margin: 5px; padding: 10px">
            <h2>Изменение турнира <a href="<?php echo Yii::$app->urlManager->createUrl(['t/view', 'id'=>$t['id']]); ?>"><?php echo $t->name; ?></a></h2>

            <?php $form = ActiveForm::begin(); ?>

            <p><?= $form->field($t, 'name')->textInput(['size'=>'20', 'maxlength'=>'20']) ?> <span class="desc_field" >максимально 20 символов. Пример: "Лига меча и магии", "Starladder"...</span>
            <p><?= $form->field($t, 'game')->textInput(['size'=>'15', 'maxlength'=>'15']) ?> <span class="desc_field" >максимально 15 символов. Пример: "Dota 2", "Шахматы"...</span>
            <p><?= $form->field($t, 'img')->textInput(['size'=>'50', 'maxlength'=>'500']) ?> <span class="desc_field" >максимально 500 символов. Пример: "https://pp.vk.me/c622017/v622017538/aa/J9LfE-7p8n0.jpg".<br /> Внимание, протокол "http://", "https://" пока обязателен.</span>
            <p><?= $form->field($t, 'opisanie')->textarea(['rows'=>'2', 'cols'=>'70', 'maxlength'=>'500'])->label('Описание: <br />') ?> <span class="desc_field" >максимально 500 символов. Пример: "Турнир  16 ловскильных команд за приз 100$."</span>
            <p><?= $form->field($t, 'site')->textInput(['size'=>'20', 'maxlength'=>'50']) ?> <span class="desc_field" >максимально 20 символов. Пример: "https://vk.com/to_dota2".<br /> Внимание, протокол "http://", "https://" пока обязателен.</span>
            <p></p>
            <h4>Цвета линий и заливки (в режиме RBG, шестьнадцатеричные) в турнирной сетке:</h4>
                <span style="font-style: italic; color: red;">(совет, используйте цвета по умолчанию)</span>:
                <?= $form->field($t, 'color_table')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_text_unit')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_text_time')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_line')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_cell')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
            <span class="desc_field" >максимально 6 символов. Пример: белый - "000000", серый - "999999", зеленый - "00FF00", другие ищите в интернете...</span>
            </p>
            <div class="form-group">
                <?= Html::submitButton('Сохранить изменения', ['class' => 'button_create']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </td>


        <td style="vertical-align: top; padding: 15px; padding-left: 30px;">
            <p style="font-weight: bold; font-size: large; text-align: right;">
                <?php
                    $redis = Yii::$app->redis;
                    echo 'Просмотров: '.$redis->get('visitors:idt:'.$t['id']);
                    echo '<br />Уникумы: '.$redis->hlen('uniques:idt:'.$t['id']);
                ?>
            </p>
            <hr style="border: 2px solid #808080" />


            <h3>Сезоны турнира "<?php echo HTML::encode($t->name); ?>"</h3>
            <?php if($seasons!=null){ ?>
            <table class="tbl_season_delete">
                <tr>
                    <th>Название</th>
                    <th>Время создания</th>
                    <th>Сетка</th>
                    <th>Войти</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach($seasons as $one){ ?>
                <tr id="delete_s<?php echo $one->id ?>">
                    <td><strong><?php echo HTML::encode($one->name); ?></strong></td>
                    <td><?php echo date('d.m.Y', $one->time) ?></td>
                    <td><?php echo Season::nets()[$one->net_type]['name']; ?></td>
                    <td><button onclick="document.location.href = '<?php echo \Yii::$app->urlManager->createUrl(['t/season']) ?>/<?php echo $one['id']; ?>';">войти</button></td>
                    <td><button onclick="delete_season('<?php echo $one->name ?>', <?php echo $one->id ?>)">удалить</button></td>
                </tr>
                <?php } ?>
            </table>
            <?php }else{ ?>
            <span class="grey">сезоны не найдены...</span>
            <?php } ?>
        </TD>
    </tr>
</table>

<script>
    function delete_season(name ,i){
        if(confirm("Вы хотите удалить "+name)){
            $('#delete_s'+i).load('<?php echo \Yii::$app->urlManager->createUrl(['t/deleteseason']) ?>/'+i);
        }
    }
</script>