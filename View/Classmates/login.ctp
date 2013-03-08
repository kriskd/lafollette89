<div class="classmates form">
    <?php echo $this->Form->create('Classmate'); ?>
        <?php echo $this->Form->input('login', array('label' => 'Login')); ?>
        <?php echo $this->Form->input('password', array('label' => 'Password')); ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
