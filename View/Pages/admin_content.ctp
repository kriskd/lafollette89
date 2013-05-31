<p><?php echo $this->Html->link('Add content to ' . $slug, array('action' => 'add', $slug)); ?></p>
<?php if(!empty($content)): ?>
    <?php echo $this->Form->create('Content', array('type' => 'post')); ?>
        <?php foreach($content as $item): ?>
            <?php echo $this->Form->hidden('Content.' . $item['Content']['id'] . '.id', array('value' => $item['Content']['id'])); ?>
            <?php echo $this->Form->input('Content.' . $item['Content']['id'] . '.content', array('type' => 'textarea', 'value' => $item['Content']['content'])); ?>
        <?php endforeach; ?>
    <?php echo $this->Form->end('submit'); ?>
<?php endif; ?>