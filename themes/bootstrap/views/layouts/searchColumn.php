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

                <h3>Cerca</h3>
                <?php $this->renderPartial('_search',array(
                    'model'=>$this->searchModel,
                    'specializzazioni'=>$this->specializzazioni
                )); ?>

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



</div> <!-- /container -->
<?php $this->endContent(); ?>