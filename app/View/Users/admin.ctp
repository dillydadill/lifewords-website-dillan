<h2><?php echo __('Admin Dashboard'); ?></h2>


	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('User_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('User_Email'); ?></th>
			<th><?php echo $this->Paginator->sort('User_Password'); ?></th>
			<th><?php echo $this->Paginator->sort('User_Status'); ?></th>
			<th><?php echo $this->Paginator->sort('User_Nickname'); ?></th>
			<th><?php echo $this->Paginator->sort('User_Profile_Photo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['User_ID']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['User_Email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['User_Password']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['User_Status']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['User_Nickname']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['User_Profile_Photo']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['User_ID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['User_ID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['User_ID']), null, __('Are you sure you want to delete # %s?', $user['User']['User_ID'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
