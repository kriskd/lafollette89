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
		echo $this->Form->input('display');
		echo $this->Form->input('displaybio');
		echo $this->Form->input('emailClassmateAdd');
		echo $this->Form->input('login');
		echo $this->Form->input('password');
		echo $this->Form->input('role');
		echo $this->Form->input('cookiekey');
		echo $this->Form->input('bio');
		echo $this->Form->input('newEmail');
		echo $this->Form->input('emailKey');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Classmates'), array('action' => 'index')); ?></li>
	</ul>
</div>
