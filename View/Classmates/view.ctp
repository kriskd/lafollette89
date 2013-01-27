<div class="classmates view">
<h2><?php  echo __('Classmate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FirstName'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['firstName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CurrentLastName'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['currentLastName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FormerLastName'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['formerLastName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LegitComments'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['legitComments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Display'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['display']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Displaybio'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['displaybio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('EmailClassmateAdd'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['emailClassmateAdd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cookiekey'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['cookiekey']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bio'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['bio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NewEmail'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['newEmail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('EmailKey'); ?></dt>
		<dd>
			<?php echo h($classmate['Classmate']['emailKey']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Classmate'), array('action' => 'edit', $classmate['Classmate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Classmate'), array('action' => 'delete', $classmate['Classmate']['id']), null, __('Are you sure you want to delete # %s?', $classmate['Classmate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Classmates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classmate'), array('action' => 'add')); ?> </li>
	</ul>
</div>
