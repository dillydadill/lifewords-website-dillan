<!--nocache-->
<?php $this->set('nickname', $user['User']['User_Nickname']); ?>

<div id="userbar">
	<div id="userdetails">
		<h1><?php echo $user['User']['User_Nickname']; ?></h1> 
		<div id="statusbar" align="center">
        	<?php if($user['User']['User_Status'] == NULL): ?>
            	<?php echo "Hi! I'm new to LifeWords!" ?>
            <?php endif; ?>
			<?php echo $user['User']['User_Status'];?>
        </div>
    </div>
    <div id="profilepic">
		<?php $path = 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot';
		echo $this->Html->image($path.($user['User']['User_Profile_Photo']), array('border' => 0, 'width' => '200', 'height' => '200'));
		?>
    </div>
</div>

<div id="setting">
	General Settings
</div>
<div id="linebar"></div>
<div id="settingbar">
	<?php echo $this->Form->create('User', array('type' => 'file')); ?>

    <fieldset>
     	<?php
		echo $this->Form->input('User_Nickname');
		echo $this->Form->input('User_Status');
		echo $this->Form->input('User_Profile_Photo', array('type' => 'file'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<!--/nocache-->