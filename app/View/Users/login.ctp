
	<div style=" text-align:center; padding-top:10%;">
		<?php echo $this->Html->image('logo1.png',array(
                'border'=>'0', 
                'width'=>'150',
                'height'=>'175'
            )); ?>
     </div>
	


	<?php echo $this->Form->create('User'); ?>
  
    	<div id="fields" align="center">
			
            <div id="signup">
                <div style="margin-top:5px;">
                <?php
                echo $this->Form->input('User_Email', array('placeholder' => 'Email','label' => false));
                ?>
                </div>
                <?php
                echo $this->Form->input('User_Password', array('placeholder' => 'Password','type' => 'password','label' => false));
                 ?>
			</div>
    	</div>
        
        
    <div align="center">
        <?php echo $this->Form->end(__('Log In!')); ?>
        
        
        
		<?php echo $this->Html->image('signup.png',array(
            'border'=>'0', 
            'width'=>'150',
            'height'=>'30', 
            'url' => array('action' => 'signup')
        )); ?>   
      
    </div>
    
    <div id="footer">Copyright © 2012 Simpledudes. All rights reserved.</div>