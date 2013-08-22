<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="appcontent">
<?php if($this->pageCaption !== '') : ?>

<?php endif; ?>
		<div class="row">
			<div class="span8">
				<?php echo $content; ?>
			</div>
			<div class="span4">
				<h3><?php echo CHtml::encode($this->sidebarCaption); ?></h3>
				<?php
					$this->beginWidget('zii.widgets.CPortlet', array(
					));
					$this->widget('zii.widgets.CMenu', array(
						'items'=>$this->menu,
						'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
				?>
			</div>
		</div>
	</div>
</div> <!-- /container -->
<?php $this->endContent(); ?>