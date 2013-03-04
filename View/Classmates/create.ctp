<div class="classmates form">
    <?php echo $this->Form->create('Classmate'); ?>
        <?php echo $this->Form->input('login', array('label' => 'Create Login')); ?>
        <?php echo $this->Form->input('password', array('label' => 'Create Password')); ?>
        <?php echo $this->Form->input('password2', array('label' => 'Confirm Password', 'type' => 'password')); ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
