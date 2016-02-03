<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */



//////////////////// COLOR /////////////////////
$bgcolor1 = '#ffffff'; // главный фон
$bgcolor2 = '#ed9c28'; // оранжевая линии
$bgcolor3 = '#7a43b6'; // фиолет линии
$bgcolor4 = '#ffffff'; // наводка на ссылку
$bgcolor5 = '#39b3d7'; // обводка внешней линии таблиц

$linktextcolor1 = $bgcolor3; // текст ненажатая ссылка
$linktextcolor2 = $bgcolor1; // текст нажатая ссылка
$linkbgcolor1 = $linktextcolor2; // фон ненажатая ссылка
$linkbgcolor2 = $bgcolor4; // фон нажатая ссылка

/////////////////////////////////////////////////
$count_messages=0;
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags() ?>

    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <title><?= Html::encode($this->title) ?></title>

    <style>
        div {
            border: 1px solid red;
        }

        body{
            margin: 15px 20px;
            padding: 0;
            color: #000000;
            font: normal 12pt sans-serif, Arial, Helvetica;
            background: <?=Yii::$app->params['color']['bg']?>;
        }

        /* ------------------- HEADER ----------------   */



        /* -------------------------- L I N K ----------------------- */

        a{
            margin: 2px;
            padding: 1px;
            color: <?=Yii::$app->params['color']['link_text_light']?>;
            background-color: <?=Yii::$app->params['color']['link_bg_dark']?>;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover{
            color: <?=Yii::$app->params['color']['link_text_dark']?>;
            background-color: <?=Yii::$app->params['color']['link_bg_light']?>;
        }

        /*  --------------  CONTENT  --------------------------------  */

        .content{
            min-height: 400px;
            margin: 10px;
        }

        .help-block-error{
            color: red;
        }

        .tbl_t td{
            padding: 5px;
            margin: 0;
            text-align: center;
        }

        .tbl_t thead{
            background-color: <?=Yii::$app->params['color']['table_bg_light']?>;
            text-align: center;
            font-weight: bold;
            padding: 7px;
            color: white;
        }


        .desc_field{ /* ОПИСАНИЕ ВОЗЛЕ ПОЛЕЙ НАСТРОЙКИ */
            color: #808080;
        }


        .button_creat_tournament { /******* кнопка создать свой турнир ******/
            margin: 5px;
            padding: 5px;
            background-color: <?=Yii::$app->params['color']['link_bg_dark']?>;
            cursor: pointer;
            color: #ffffff;
            font-weight: bold;
            width: 100px;
            height: 30px;
            border: 2px solid <?=Yii::$app->params['color']['table_bg_dark']?> ;
        }

        .button_creat_tournament:hover {
            background-color: <?=Yii::$app->params['color']['bg']?>;
            color: <?=Yii::$app->params['color']['link_bg_dark']?>;
        }

        .tbl_setting{
            width: 100%;
            border: 3px solid <?=Yii::$app->params['color']['link_bg_dark']?>;
        }

        .grey{
            color: #c0c0c0;
            font-style: italic;
        }

        .button_create{
            width: 250px;
            height: 30px;
            font-size: large;
            font-weight: bold;
        }
    </style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!-- МЕНЮ (header)-->
    <?=$this->renderAjax('_header.php')?>

    <!--    контент     -->
    <div style="padding: 10px">
        <?= $content ?>
    </div>

    <!--    ФУТЕР   -->
    <?=$this->renderAjax('_footer.php')?>

<script>
    function link(i){ document.location.href = "<?php echo Yii::$app->request->baseUrl; ?>/"+i; }
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>