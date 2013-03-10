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
            <?php echo $this->Form->input('passwordNew', array('label' => 'New Password:', 'type' => 'password')); ?>
            <?php echo $this->Form->input('password2', array('label' => 'Re-Enter New Password:', 'type' => 'password')); ?>
        </div>
    </div>
    <div class="wrapper">
        <div class="contentleft">
            <h2>Privacy Settings</h2>
            <?php $radio_options = array('type' => 'radio', 'options' => array(1 => 'Yes', 0 => 'No')); ?>
            <?php echo $this->Form->input('display', $radio_options + array('legend' => 'Do you want your name displayed to guests?')); ?>
            <?php echo $this->Form->input('displaybio', $radio_options + array('legend' => 'Do you want your bio displayed to guests?')); ?>
        </div>
        <div class="contentright">
            <h2>Classmate Email Alerts</h2>
            <?php echo $this->Form->input('emailClassmateAdd', $radio_options + array('legend' => 'Do you want to receive an e-mail when a classmate is added to the site?')); ?>
        </div>
    </div>
    <div class="wrapper">
        <div class="contentleft">
            <h2>Bio</h2>
            <?php echo $this->Form->textarea('bio'); ?>
        </div>
        <div class="contentright">
            <h2>Confirm</h2>
            <p>Enter your <strong>current</strong> password to make any changes on this form.</p>
            <?php echo $this->Form->input('password', array('label' => 'Current Password:')); ?>
        </div>
    </div>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
