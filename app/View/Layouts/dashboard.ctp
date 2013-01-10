<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('dashboard');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div id="wrap">
    <div id="dashboard">
	    <div id="logo">
    		LifeWords
        </div>
            
		<div id="navpanel">
            <?php echo $this->Html->link('Home', array('action' => 'profile', 'controller' => 'users')) ?> | <?php echo $this->Html->link('Shared Cards', array('action' => 'share', 'controller' => 'users')) ?> | <?php echo $this->Html->link('Settings', array('action' => 'settings', $user['User']['User_ID'], 'controller' => 'users')) ?> | <?php echo $this->Form->postLink('Logout', array('action' => 'logout', 'controller' => 'users'), null, 'Are you sure you want to log out?') ?>
        </div>
        
        <div id="namebar">
        		Hi <?php echo $nickname; ?>!
        </div>        
        
        <div id="imagebar">
        	<?php echo $this->Html->image('logosmall.png', array('height'=>'50'))?>
        </div>
    
    </div>
    

    	<div id="content">
        	<?php echo $this->fetch('content'); ?>
    	</div>    
	<div id="floater"></div>
    
    <div id="footer" align="center">
		© Copyright 2012, Simpledudes. All Rights Reserved.
    </div>
</div>  
</body>
</html>
