<div class="classmates index">
    <?php echo $this->Form->create('Classmate', array('type' => 'post')); ?>
	<?php foreach ($classmates as $classmate): ?>
        <?php $name = h($classmate['Classmate']['formerLastName']) . ', '; ?>
		<?php $name .= h($classmate['Classmate']['firstName']); ?> 
		<?php $name .= ' (' . h($classmate['Classmate']['currentLastName']) . ')'; ?>
        <?php $options = array($classmate['Classmate']['id'] => $name); ?>
        <?php echo $this->Form->select('Classmate.id', $options, array('multiple' => 'checkbox', 'hiddenField' => false)); ?>
    <?php endforeach; ?>
    <?php echo $this->Form->end('submit'); ?>
    <?php echo $this->Html->link(__('New Classmate'), array('action' => 'add')); ?>
</div>
