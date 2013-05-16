<?php foreach($controllers as $controller): ?>
    <?php foreach($controller as $action): ?>
        <p><?php echo $this->Html->link($action, array('action' => 'content', $action)); ?></p>
    <?php endforeach; ?>
<?php endforeach; ?>