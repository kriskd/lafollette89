<table>
    <?php foreach($classmates as $classmate): ?>
        <tr>
            <td><?php echo $classmate['Classmate']['formerLastName']; ?></td>
            <td><?php echo $classmate['Classmate']['currentLastName']; ?></td>
            <td><?php echo $classmate['Classmate']['firstName']; ?></td>
            <td><?php echo $classmate['Classmate']['email']; ?></td>
            <td><?php echo $classmate['Classmate']['display']; ?></td>
            <td><?php echo $classmate['Classmate']['role']; ?></td>
            <td><?php echo $classmate['Classmate']['legitComments']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>