<table>
    <tr>
       <th>Former Last Name</th>
       <th>Current Last Name</th>
       <th>First Name</th>
       <th>Email</th>
       <th>Display</th>
       <th>Role</th>
       <th>Comments</th>
    </tr>
    <?php echo $this->Form->create('Classmate'); ?>
    <?php foreach($classmates as $classmate): ?>
        <tr>
            <td><?php echo $classmate['Classmate']['formerLastName']; ?></td>
            <td><?php echo $classmate['Classmate']['currentLastName']; ?></td>
            <td><?php echo $classmate['Classmate']['firstName']; ?></td>
            <td><?php echo $classmate['Classmate']['email']; ?></td>
            <td>
                <?php echo $this->Form->select('Classmate.display', array('No', 'Yes'), array('value' => $classmate['Classmate']['display'])); ?>
            </td>
            <td><?php echo $this->Form->select('Classmate.role', array(1 => 'User', 2 => 'Planner', 9 => 'Admin'), array('value' => $classmate['Classmate']['role'])); ?></td>
            <td><?php echo $classmate['Classmate']['legitComments']; ?></td>
        </tr>
    <?php endforeach; ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</table>