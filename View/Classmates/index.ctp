<div class="classmates index">
    <?php echo $this->Form->create('Classmate', array('type' => 'post')); ?>
    <div class="col1">
        <?php foreach ($col1 as $classmate): ?>
            <?php $name = h($classmate['Classmate']['formerLastName']) . ', '; ?>
            <?php $name .= h($classmate['Classmate']['firstName']); ?> 
            <?php $name .= ' (' . h($classmate['Classmate']['currentLastName']) . ')'; ?>
            <?php $options = array($classmate['Classmate']['id'] => $name); ?>
            <?php echo $this->Form->select('Classmate.id', $options, array('multiple' => 'checkbox', 'hiddenField' => false)); ?>
        <?php endforeach; ?>
    </div>
    <div class="col2">
        <?php foreach ($col2 as $classmate): ?>
            <?php $name = h($classmate['Classmate']['formerLastName']) . ', '; ?>
            <?php $name .= h($classmate['Classmate']['firstName']); ?> 
            <?php $name .= ' (' . h($classmate['Classmate']['currentLastName']) . ')'; ?>
            <?php $options = array($classmate['Classmate']['id'] => $name); ?>
            <?php echo $this->Form->select('Classmate.id', $options, array('multiple' => 'checkbox', 'hiddenField' => false)); ?>
        <?php endforeach; ?>
    </div>
    <div class="col3">
        <?php foreach ($col3 as $classmate): ?>
            <?php $name = h($classmate['Classmate']['formerLastName']) . ', '; ?>
            <?php $name .= h($classmate['Classmate']['firstName']); ?> 
            <?php $name .= ' (' . h($classmate['Classmate']['currentLastName']) . ')'; ?>
            <?php $options = array($classmate['Classmate']['id'] => $name); ?>
            <?php echo $this->Form->select('Classmate.id', $options, array('multiple' => 'checkbox', 'hiddenField' => false)); ?>
        <?php endforeach; ?>
    </div>
    <?php echo $this->Form->end('submit'); ?>
    <?php echo $this->Html->link(__('New Classmate'), array('action' => 'add')); ?>
</div>
