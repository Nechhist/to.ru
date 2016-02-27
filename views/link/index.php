<?php

use app\models\User;
use yii\helpers\Html;
use app\models\T;
$this->title = 'Избранные турниры | '.Yii::$app->name;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Избранные турниры, Турнир онлайн, удобные турнирные сетки']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Ваши избранные турниры']);

?>

<div class="container">

    <h1>Избранные турниры</h1>

    <?php if(!Yii::$app->user->isGuest){ ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">
            <h3>Ссылки на турниры (<?php echo count($my_link); ?>)</h3>
            <?php if($my_link!=null){ ?>
                <table>
                    <?php $i=1;
                    foreach($my_link as $one){ ?>
                        <tr id="link<?php echo $one['id']; ?>">
                            <td><?php echo $i; $i++; ?>.</td>
                            <td>
                                <?php if($one['link_type']==1){ ?>
                                    <?=Html::a(T::name($one['link_id']), '/' . $one['link_id'])?>
                                <?php }else echo 'не турнир (link_type!=1)'; ?>
                            </td>
                            <td>
                                <a onclick="delete_link(<?php echo $one['id']; ?>)">
                                    <span class="grey" style="font-weight: normal;">(удалить)</span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php }else{ ?>
                <span class="grey">Ссылки не найдены...</span>
            <?php } ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">
            <h3>
                Мои турниры (<?php echo count($my_t); ?>)
            </h3>
            <?php if ($my_t != null) { ?>
                <table>
                    <?php $count_myt=1;
                    foreach($my_t as $one){ ?>
                        <tr>
                            <td>
                                <?php echo $count_myt; $count_myt++; ?>.
                            </td>
                            <td>
                                <?=Html::a(T::name($one['id']), '/' . $one['id'])?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else {?>
                <span class="grey">Созданные Вами турниры не найдены.</span>
            <?php } ?>
        </div>

    <?php }else{ ?>
        <span class="grey">Вы не можете сохранять ссылки в "Избранные турниры", пока не зарегистрированы.</span>
    <?php } ?>
</div>


<script>
    function delete_link(i){
        if(confirm("Вы хотите удалить ссылку?")){
            $('#link'+i).load("<?php echo \Yii::$app->urlManager->createUrl(['link/ajaxdelete']) ?>/"+i);
        }
    }
</script>