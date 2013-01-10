	<h2><?php echo __('Sharings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('User_Email'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_ID'); ?></th>
            <th><?php echo $this->Paginator->sort('New'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($sharings as $sharing): ?>
	<tr>
		<td><?php echo h($sharing['Sharing']['User_Email']); ?>&nbsp;</td>
		<td><?php echo h($sharing['Sharing']['Card_ID']); ?>&nbsp;</td>
        <td><?php echo h($sharing['Sharing']['New']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sharing['Sharing']['Card_ID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sharing['Sharing']['Card_ID']), null, __('Are you sure you want to delete # %s?', $sharing['Sharing']['Card_ID'])); ?>
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
