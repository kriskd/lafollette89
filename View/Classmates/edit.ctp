<div class="classmates form">
<?php echo $this->Form->create('Classmate'); ?>
    <div class="wrapper">
        <div class="contentleft">
            <h2>Name</h2>
            <?php echo $this->Form->input('firstName'); ?>
            <?php echo $this->Form->input('currentLastName'); ?>
            <?php echo $this->Form->input('formerLastName'); ?>
        </div>
        <div class="contentright">
            <h2>Email</h2>
            <?php echo $this->Form->input('email'); ?>
            <h2>Password</h2>
            <?php echo $this->Form->input('password', array('label' => 'New Password:')); ?>
            <?php echo $this->Form->input('password2', array('label' => 'Re-Enter New Password:', 'type' => 'password')); ?>
        </div>
    </div>
    <div class="wrapper">
        <div class="contentleft">
            <h2>Privacy Settings</h2>
            <?php echo $this->Form->input('display'); ?>
            <?php echo $this->Form->input('displaybio'); ?>
        </div>
        <div class="contentright">
            <h2>Classmate Email Alerts</h2>
            <?php echo $this->Form->input('emailClassmateAdd'); ?>
        </div>
    </div>
    <div class="wrapper">
        <div class="contentleft">
            <h2>Bio</h2>
            <?php echo $this->Form->input('bio'); ?>
        </div>
        <div class="contentright">
            <h2>Confirm</h2>
            <p>Enter your <strong>current</strong> password to make any changes on this form.</p>
            <?php echo $this->Form->input('password', array('label' => 'Current Password:')); ?>
        </div>
    </div>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
