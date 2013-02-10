<?php echo $this->Form->create('SendEmails', array('type' => 'post', 'url' => '/sendemails/send')); ?>
<?php foreach($ids as $id): ?>
    <?php echo $this->Form->hidden('Classmate.' . $id, array('value' => $id, 'id' => null)); ?>
<?php endforeach; ?>
<?php echo $this->Form->input('from', array('label' => 'From E-mail (this must be a valid e-mail!):')); ?>
<?php echo $this->Form->input('email', array('label' => 'Your Name:')); ?>
<?php echo $this->Form->input('subject', array('label' => 'Subject:')); ?>
<?php echo $this->Form->textarea('message', array('label' => 'E-mail Message:')); ?>
<?php echo $this->Form->end('submit'); ?>