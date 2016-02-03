<?php

use app\models\User;
use yii\helpers\Html;
use app\models\T;
$this->title = 'Избранные турниры | '.Yii::$app->name;
?>

<div class="container">

    <h1>Избранные турниры</h1>

    <?php if(!Yii::$app->user->isGuest){ ?>
        <table class="tbl_setting">
            <tr>

                <td style="width: 50%; padding: 10px; margin: 15px; vertical-align: top;">
                    <h3>Ссылки на турниры (<?php echo count($my_link); ?>)</h3>
                    <?php if($my_link!=null){ ?>
                    <table>
                        <?php $i=1;
                        foreach($my_link as $one){ ?>
                        <tr id="link<?php echo $one['id']; ?>">
                            <td><?php echo $i; $i++; ?>.</td>
                            <td>
                                <?php if($one['link_type']==1){ ?>
                                <a href="<?php echo Yii::$app->request->baseUrl; ?>/t/view/<?php echo $one['link_id']; ?>">
                                    <?php echo T::name($one['link_id']); ?>
                                </a>
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
                </td>

                <td style="width: 50%; padding: 10px; margin: 15px; vertical-align: top;">
                    <h3>
                        Мои турниры (<?php echo count($my_t); ?>)
                    </h3>
                    <table>
                        <?php $count_myt=1;
                        foreach($my_t as $one){ ?>
                        <tr>
                            <td>
                                <?php echo $count_myt; $count_myt++; ?>.
                            </td>
                            <td>
                                <a href="<?php echo Yii::$app->request->baseUrl; ?>/t/view/<?php echo $one['id']; ?>">
                                    <?php echo T::name($one['id']); ?>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>

            </tr>
        </table>
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