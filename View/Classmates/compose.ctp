<?php if($flash = $this->Session->flash()): ?>
    <?php echo $flash; ?>
    <?php return; ?>
<?php endif; ?>
<?php echo $this->Form->create('SendEmail', array('type' => 'post')); ?>
<?php foreach($ids as $id): ?>
    <?php echo $this->Form->hidden('Classmate.' . $id, array('value' => $id, 'id' => null)); ?>
<?php endforeach; ?>
<?php echo $this->Form->input('from_email', array('label' => 'From E-mail (this must be a valid e-mail!):')); ?>
<?php echo $this->Form->input('from_name', array('label' => 'Your Name:')); ?>
<?php echo $this->Form->input('subject', array('label' => 'Subject:')); ?>
<?php echo $this->Form->input('body', array('type' => 'textarea', 'label' => 'E-mail Message:', 'cols' => 100, 'rows' => 10)); ?>
<?php echo $this->MyForm->captcha($captcha_img); ?>
<?php echo $this->Form->end('submit'); ?>