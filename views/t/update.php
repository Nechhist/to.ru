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


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xm-12" style="border: 3px solid #39b3d7;">
            <h2>Изменение турнира <a href="<?php echo Yii::$app->urlManager->createUrl(['t/view', 'id'=>$t['id']]); ?>"><?php echo $t->name; ?></a></h2>

            <?php $form = ActiveForm::begin(); ?>

            <?=$this->render('_form.php' , ['form' => $form, 'model' => $t]) ?>

            <p><?= $form->field($t, 'img')->textInput(['size'=>'50', 'maxlength'=>'500', 'placeholder'=>'https://pp.vk.me/c622017/v622017538/aa/J9LfE-7p8n0.jpg'])
                    ->label($t->attributeLabels()['img'] . ' <span class="desc_field" >(максимально 500 символов)</span>') ?>
            <span class="desc_field" >
                Внимание, протокол "http://", "https://" вначале вначале ссылки писать обязателено.
            </span>

            <p>
                <hr />
            </p>

            <h4>Цвета линий и заливки (в режиме RBG, шестьнадцатеричные) в турнирной сетке:</h4>
                <span class="red">(совет, используйте цвета по умолчанию)</span>:
                <?= $form->field($t, 'color_table')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_text_unit')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_text_time')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_line')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_cell')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
            <span class="desc_field" >максимально 6 символов. Пример: белый - "000000", серый - "999999", зеленый - "00FF00", другие ищите в интернете...</span>
            </p>
            <div class="form-group">
                <?= Html::submitButton('Сохранить изменения', ['class' => 'button_creat_tournament']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>


        <div class="col-lg-4 col-md-4 col-sm-4 col-xm-12" >
            <?php if($visitors != null) { ?>
            <p style="font-weight: bold; font-size: large; text-align: right;">
                Все посетители: <?=$visitors['all']?>
                <br />
                Уникальные посетители: <?=$visitors['all']?>
            </p>
            <hr style="border: 2px solid #808080" />
            <?php } ?>

            <h3>Турнирные сетки</h3>
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
            <span class="grey">Сетки не найдены...</span>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    function delete_season(name ,i){
        if(confirm("Вы хотите удалить "+name)){
            $('#delete_s'+i).load('<?php echo \Yii::$app->urlManager->createUrl(['t/deleteseason']) ?>/'+i);
        }
    }
</script>