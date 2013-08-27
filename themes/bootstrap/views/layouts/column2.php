<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="appcontent">
<?php if($this->pageCaption !== '') : ?>

<?php endif; ?>
		<div class="row">
			<div class="span9">
				<?php echo $content; ?>
			</div>
			<div class="span2" style="margin-left:10px;">
                <span class="nav-header">Menu</span>
				<?php
					$this->beginWidget('zii.widgets.CPortlet', array(
					));
					$this->widget('zii.widgets.CMenu', array(
						'items'=>$this->menu,
						'htmlOptions'=>array('class'=>'nav nav-list'),
					));
					$this->endWidget();
				?>



</div> <!-- /container -->



<?php $this->endContent(); ?>