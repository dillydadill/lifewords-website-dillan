<!--nocache-->
<?php $this->set('nickname', $user['User']['User_Nickname']); ?>

<div id="cardslist">
    <?php foreach ($cards as $card): ?>
    <div class="cards">
    	<div class="carddetails">
        	<div class="cardview">
				<?php echo $this->Html->link(__('View Card'), array('action' => 'view', 'controller' => 'Cards',  $card['Card']['Card_ID'])); ?>
            </div>
            <div class="sharecardsender">
            	<?php echo $card['Card']['Card_Text']?>
            </div>
            <div class="sharecarddate">
            	Sent by <?php echo $card['Card']['Card_Owner']?>
            </div>
            <div class="sharecarddate">
            	Received on <?php echo $card['Card']['Card_Date']?>
            </div>
            <div class="sharecardtext">
            </div>
        </div>
        
    	<div class="cardphoto">
        	<?php echo $this->Html->image(($card['Card']['Card_Photo']), array('border' => 0, 'width' => '150', 'height' => '150')); ?>
		</div>
	</div>
	<?php endforeach;?>
	
</div>
<!--/nocache-->