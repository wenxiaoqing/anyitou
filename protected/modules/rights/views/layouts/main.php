<?php $this->beginContent(Rights::module()->appLayout); ?>

<div id="rights" >

	<div id="content">
	<div class="tabbable tabbable-custom tabbable-full-width" >
		<?php if( $this->id!=='install' ): ?>
		
			<?php $this->renderPartial('/_menu'); ?>

		<?php endif; ?>
		<div class="tab-content" >
			<?php $this->renderPartial('/_flash'); ?>
			<?php echo $content; ?>
		</div>
	</div>
	</div><!-- content -->

</div>

<?php $this->endContent(); ?>