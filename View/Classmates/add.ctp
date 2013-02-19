<div class="classmates form">
<?php echo $this->Form->create('Classmate'); ?>
	<?php
		echo $this->Form->input('firstName');
		echo $this->Form->input('currentLastName');
		echo $this->Form->input('formerLastName');
		echo $this->Form->input('email');
		echo $this->Form->input('legitComments', array('type' => 'textarea', 'label' => 'Tell me anything about La Follette while we were students just so I know you are legit.', 'cols' => 50, 'rows' => 5));
	?>
		<?php echo $this->MyForm->captcha($captcha_img); ?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
