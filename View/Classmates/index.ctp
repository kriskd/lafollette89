<div class="classmates index">
    <?php echo $this->Form->create('Classmate', array('type' => 'post')); ?>
    <?php if(!empty($col1)): ?>
        <div class="col1">    
            <?php foreach ($col1 as $classmate): ?>
                <?php $name = h($classmate['Classmate']['formerLastName']) . ', '; ?>
                <?php $name .= h($classmate['Classmate']['firstName']); ?> 
                <?php $name .= ' (' . h($classmate['Classmate']['currentLastName']) . ')'; ?>
                <?php $options = array($classmate['Classmate']['id'] => $name); ?>
                <?php echo $this->Form->select('Classmate.id', $options, array('multiple' => 'checkbox', 'hiddenField' => false)); ?>
            <?php endforeach; ?>      
        </div>
    <?php endif; ?>
    <?php if(!empty($col2)): ?>
        <div class="col2">
            <?php foreach ($col2 as $classmate): ?>
                <?php $name = h($classmate['Classmate']['formerLastName']) . ', '; ?>
                <?php $name .= h($classmate['Classmate']['firstName']); ?> 
                <?php $name .= ' (' . h($classmate['Classmate']['currentLastName']) . ')'; ?>
                <?php $options = array($classmate['Classmate']['id'] => $name); ?>
                <?php echo $this->Form->select('Classmate.id', $options, array('multiple' => 'checkbox', 'hiddenField' => false)); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if(!empty($col3)): ?>
        <div class="col3">
            <?php foreach ($col3 as $classmate): ?>
                <?php $name = h($classmate['Classmate']['formerLastName']) . ', '; ?>
                <?php $name .= h($classmate['Classmate']['firstName']); ?> 
                <?php $name .= ' (' . h($classmate['Classmate']['currentLastName']) . ')'; ?>
                <?php $options = array($classmate['Classmate']['id'] => $name); ?>
                <?php echo $this->Form->select('Classmate.id', $options, array('multiple' => 'checkbox', 'hiddenField' => false)); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php echo $this->Form->end('submit'); ?>
    <?php echo $this->Html->link(__('New Classmate'), array('action' => 'add')); ?>
</div>
