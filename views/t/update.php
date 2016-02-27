<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Season;

$this->title = 'Изменение турнира '.HTML::encode($t->name).' | '.Yii::$app->name;
?>

<style>
    .table_season_delete {
        width: 100%;
    }

    .table_season_delete td, th{
        margin: 3px;
        padding: 3px;
        text-align: center;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xm-12" style="border: 3px solid #39b3d7;">
            <h2>Изменение турнира <?=Html::a(Html::encode($t->name), '/' . $t->id)?></h2>

            <?php $form = ActiveForm::begin(); ?>

            <?=$this->render('_form.php' , ['form' => $form, 'model' => $t]) ?>

            <p><?= $form->field($t, 'img')->textInput(['size'=>'50', 'maxlength'=>'500', 'placeholder'=>'https://pp.vk.me/c622017/v622017538/aa/J9LfE-7p8n0.jpg'])
                    ->label($t->attributeLabels()['img'] . ' <span class="desc_field" >(максимально 500 символов)</span>') ?>
            <span class="desc_field" >
                Внимание, помните, что ссылки на изображения в VK, FB находящиеся в приватных альбомах могут быть видимы только Вами.
                 Старайтесь вставлять, только надежные ссылки. (Также, админитрация имеет право насильно сменить ссылку на недозволенное изображение.)
            </span>

            <hr style="margin: 5px; padding: 5px;" />

            <a onclick="openColorsTour()" style="cursor: pointer">Цвета линий и заливки (в режиме RBG, шестьнадцатеричные) в турнирной сетке</a>
            <div id="divColorsTour" style="display: none; margin: 10px">
                <span class="red">(совет, используйте цвета по умолчанию)</span>
                <?= $form->field($t, 'color_table')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_text_unit')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_text_time')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_line')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <?= $form->field($t, 'color_cell')->textInput(['size'=>'6', 'maxlength'=>'6']) ?>
                <span class="desc_field" >максимально 6 символов. Пример: белый - "000000", серый - "999999", зеленый - "00FF00", другие ищите в интернете...</span>
            </div>
            <hr style="margin: 5px; padding: 5px;" />
            <div class="form-group">
                <?= Html::submitButton('Сохранить изменения', ['class' => 'button_creat_tournament']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>


        <div class="col-lg-4 col-md-4 col-sm-4 col-xm-12" >
            <?php if($visitors != null) { ?>
            <p style="font-weight: bold; font-size: large; text-align: right;">
                Всего просмотров: <?=$visitors['all']?>
                <br />
                Уник. посетителей: <?=$visitors['uni']?>
            </p>
            <hr style="border: 2px solid #808080" />
            <?php } ?>

            <h3>Турнирные сетки</h3>
            <?php if($seasons!=null){ ?>
            <table class="table_season_delete">
                <tr>
                    <th>Название</th>
                    <th>Cозданиe</th>
                    <th>Сетка</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach($seasons as $one){ ?>
                <tr id="delete_s<?php echo $one->id ?>">
                    <td><a href="<?=\Yii::$app->urlManager->createUrl(['t/season', 'id'=>$one['id']]) ?>"><strong><?php echo HTML::encode($one->name); ?></strong></a></td>
                    <td><?php echo date('d.m.Y', $one->time) ?></td>
                    <td><?php echo Season::nets()[$one->net_type]['name']; ?></td>
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

    function openColorsTour(){
        $('#divColorsTour').toggle();
    }
</script>
