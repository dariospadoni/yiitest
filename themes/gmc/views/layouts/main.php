<html>

<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>


    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sito web del Gemelli Medical Center">
    <meta name="author" content="Witbit Ingegneria Informatica - www.witbit.it">



    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/utils.js" ></script>

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" media="screen" >


    <script>


    </script>

</head>

<body>

<div id="header">
    <div id="logo"> </div>
</div>

<div id="menuBar">
    <div id='cssmenu'>
        <ul>
            <li><a href='index.html'><span>GMC</span></a></li>
            <li><a href='index.html'><span>PRESTAZIONI</span></a></li>
            <li><a href='index.html'><span>MEDICI</span></a></li>
            <li><a href='index.html'><span>FONDI</span></a></li>
            <li><a href='index.html'><span>INFO UTILI</span></a></li>
        </ul>
    </div>
</div>

<div id="headerImage">

</div>

<div id="contentWrapper">
        <?php
            echo $content;
        ?>
</div>


<div id="footer">

    asdasd
</div>

</body>

</html>