<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('styles');
		echo $this->Html->script('less-1.3.3.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
		<div id="content">
			<h1>La Follette High School Class of 1989 Unofficial Homepage</h1>
			<div id="menu">
				<ul>
                    <li><?php echo $this->Html->link('Home', array('controller' => 'classmates', 'action' => 'index', 'admin' => false)); ?></li>
                    <?php if($logged_in == false): ?>
                        <li><?php echo $this->Html->link('Classmate Login', array('controller' => 'classmates', 'action' => 'login')); ?></li>
                        <li><?php echo $this->Html->link('Create Login', array('controller' => 'classmates', 'action' => 'email')); ?></li>
                    <?php endif; ?>
                    <?php if(isset($has_login)): ?>
                        <li><?php echo $this->Html->link('Profile', array('controller' => 'classmates', 'action' => 'edit', 'admin' => false)); ?></li>
                    <?php endif; ?>
                    <?php if($role == 9): ?>
                        <li><?php echo $this->Html->link('Administration', array('controller' => 'classmates', 'action' => 'index', 'admin' => true)); ?></li>
                    <?php endif; ?>
                    <?php if($logged_in == true): ?>
                        <li><?php echo $this->Html->link('Logout', array('controller' => 'classmates', 'action' => 'logout', 'admin' => false)); ?></li>
                    <?php endif; ?>
				</ul>
			</div>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<p>DESIGNED AND MAINTAINED BY KRIS (SHAWKEY) DOCKTER</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
