<div style=" text-align:center; padding-top:10%;">
		<?php echo $this->Html->image('logo1.png',array(
                'border'=>'0', 
                'width'=>'150',
                'height'=>'175'
            )); ?>
     </div>
<div align="center">
    <div id="signup">
        <p><?php echo $this->Form->create('User'); ?></p>
        <div id="fields" align="center">
            <?php echo $this->Form->input('User_Email', array('placeholder' => 'Email','label' => false)); ?>
            <?php echo $this->Form->input('User_Password', array('placeholder' => 'Password','type' => 'password', 'label' => false)); ?>
            <?php echo $this->Form->input('User_Password_Confirmation', array('placeholder'=> 'Confirmation','type' => 'password', 'label' => false)); ?>
            <?php echo $this->Form->input('User_Nickname', array('placeholder' => 'Nickname','label' => false)); ?>
        </div>
    
        
        
        
            <?php echo $this->Form->end(__('Sign Up!')); ?>
        
        
    </div>
</div>
<div id="footer">Copyright © 2012 Simpledudes. All rights reserved.</div>