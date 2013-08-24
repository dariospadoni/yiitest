<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="appcontent">
<?php if($this->pageCaption !== '') : ?>
		<div class="page-header">
			<h1><?php echo CHtml::encode($this->pageCaption); ?> </h1>
		</div>
<?php endif; ?>
		<?php echo $content; ?>
	</div>

</div> <!-- /container -->
<?php $this->endContent(); ?>