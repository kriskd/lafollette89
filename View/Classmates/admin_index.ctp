<h2>Classmates</h2>
<?php echo $this->Form->create('Classmate'); ?>
<table>
    <tr>
        <th>Delete</th>
        <th>Former Last Name</th>
        <th>Current Last Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th>Display</th>
        <th>Role</th>
        <th>Comments</th>
    </tr>
    <?php foreach($classmates as $classmate): ?>
        <?php $id = $classmate['Classmate']['id']; ?>
        <tr>
            <td>
                <?php if($classmate['Classmate']['display'] == 0): ?>
                    <?php echo $this->Form->input('Classmate.'.$id.'.delete', array('type' => 'checkbox', 'label' => false, 'hiddenField' => false)); ?>
                <?php endif; ?>
            </td>
            <td><?php echo $classmate['Classmate']['formerLastName']; ?></td>
            <td><?php echo $classmate['Classmate']['currentLastName']; ?></td>
            <td><?php echo $classmate['Classmate']['firstName']; ?></td>
            <td><?php echo $classmate['Classmate']['email']; ?></td>
            <td>
                <?php echo $this->Form->select('Classmate.'.$id.'.display', array('No', 'Yes'), array('value' => $classmate['Classmate']['display'])); ?>
            </td>
            <td>
                <?php if(isset($classmate['Classmate']['login'])): ?>
                    <?php echo $this->Form->select('Classmate.'.$id.'.role', array(1 => 'User', 2 => 'Planner', 9 => 'Admin'), array('value' => $classmate['Classmate']['role'])); ?></td>
                <?php endif; ?>
            <td><?php echo $classmate['Classmate']['legitComments']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Form->end(__('Submit')); ?>