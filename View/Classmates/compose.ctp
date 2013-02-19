<?php echo $this->Form->create('Sendemail', array('type' => 'post', 'url' => '/sendemails')); ?>
<?php foreach($ids as $id): ?>
    <?php echo $this->Form->hidden('Classmate.' . $id, array('value' => $id, 'id' => null)); ?>
<?php endforeach; ?>
<?php echo $this->Form->input('from_email', array('label' => 'From E-mail (this must be a valid e-mail!):')); ?>
<?php echo $this->Form->input('from_name', array('label' => 'Your Name:')); ?>
<?php echo $this->Form->input('subject', array('label' => 'Subject:')); ?>
<?php echo $this->Form->textarea('body', array('label' => 'E-mail Message:')); ?>
<?php echo $this->Form->label('captcha', 'I hate spam! Just tell me what color this is:'); ?>
<?php echo $this->Html->image($captcha_img); ?>
<?php echo $this->Form->input('captcha', array('label' => false)); ?>
<?php echo $this->Form->end('submit'); ?>