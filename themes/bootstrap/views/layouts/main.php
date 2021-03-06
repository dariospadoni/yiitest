<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Sito web del Gemelli Medical Center">
	<meta name="author" content="Witbit Ingegneria Informatica - www.witbit.it">

	<!-- Le styles -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->baseUrl;?>/css/gmc.css"  rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/utils.js" ></script>

</head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo $this->createAbsoluteUrl('//'); ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Prenotazioni', 'url'=>array('/prenotazione/index'),'visible'=> Yii::app()->user->isAdmin()),
						array('label'=>'Pagine', 'url'=>array('/pagina/index'),'visible'=> Yii::app()->user->isAdmin()),
                        array('label'=>'Fondi', 'url'=>array('/fondo/index'),'visible'=> Yii::app()->user->isAdmin()),
						array('label'=>'Prestazioni', 'url'=>array('/prestazione/index'),'visible'=> Yii::app()->user->isAdmin() ),
                        array('label'=>'Medici', 'url'=>array('/medico/index'),'visible'=> Yii::app()->user->isAdmin() ),
                        array('label'=>'Pazienti', 'url'=>array('/paziente/index'),'visible'=> Yii::app()->user->isAdmin() ),
                        array('label'=>'Feedback', 'url'=>array('/feedback/index'),'visible'=> Yii::app()->user->isAdmin() ),
					),
					'htmlOptions'=>array(
						'class'=>'nav',
					),
				)); ?>
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
                        array('label'=>'Utente: '.Yii::app()->user->name, 'url'=>'#', 'htmlOptions'=>array('class'=>'btn'),'visible'=> isSet(Yii::app()->user->role)),
						array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn')),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
					),
					'htmlOptions'=>array(
						'class'=>'nav pull-right',
					),
				)); ?>
			</div>
		</div>
	</div>
	
	<div class="container">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('BBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=> isset($this->breadcrumbsOptionsHomeLink) ? $this->breadcrumbsOptionsHomeLink :null,
			'separator'=>' / ',
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	</div>
	
	<?php echo $content; ?>

<!--	<footer class="footer">-->
<!--		<div class="container">-->
<!--			<p>Copyright &copy; --><?php //echo date('Y'); ?><!-- by My Company.<br/>-->
<!--			All Rights Reserved.<br/>-->
<!--			--><?php //echo Yii::powered(); ?><!--</p>-->
<!--		</div>-->
<!--	</footer>-->

</body>
</html>