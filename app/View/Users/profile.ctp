<!--nocache-->
<?php $this->set('nickname', $user['User']['User_Nickname']); ?>

<div id="userbar">
	<div id="userdetails">
		<h1><?php echo ($user['User']['User_Nickname']); ?></h1> 
		<div id="statusbar" align="center">
			
			<?php if($user['User']['User_Status'] == NULL): ?>
            	<?php echo "Hi! I'm new to LifeWords!" ?>
            <?php endif; ?>
            
			<?php echo ($user['User']['User_Status']);?>
        
        </div>
    </div>

	<div id="profilepic">
	<?php $path = 'http://'.$_SERVER['SERVER_NAME'].'/lifewords/app/webroot';
		echo $this->Html->image($path.($user['User']['User_Profile_Photo']), array('border' => 0));
		?>
    </div>
</div>

<div id="cardslist">
    <?php foreach ($cards as $card): ?>
    <div class="cards">
    	<div class="carddetails">
        	<div class="cardview">
				<?php echo $this->Html->link(__('View Card'), array('action' => 'view', 'controller' => 'Cards',  $card['Card']['Card_ID'])); ?>
            </div>
            <div class="cardtext">
				<?php echo $card['Card']['Card_Text']?>
            </div>
        </div>
        
    	<div class="cardphoto">
        	<?php echo $this->Html->image($path.($card['Card']['Card_Photo']), array('border' => 0, 'width' => '150', 'height' => '150')); ?>
		</div>
	</div>
	<?php endforeach;?>
	
</div>
<!--/nocache-->