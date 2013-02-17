<div class="classmates form">
<?php echo $this->Form->create('Classmate'); ?>
	<fieldset>
		<legend><?php echo __('Add Classmate'); ?></legend>
	<?php
		echo $this->Form->input('firstName');
		echo $this->Form->input('currentLastName');
		echo $this->Form->input('formerLastName');
		echo $this->Form->input('email');
		echo $this->Form->input('legitComments');
	?>
		<?php echo $this->Html->image($captcha_img); ?>
		<?php echo $this->Form->input('captcha', array('label' => 'Captcha')); ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
