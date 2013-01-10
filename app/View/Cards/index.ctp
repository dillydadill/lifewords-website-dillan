	<h2><?php echo __('Cards'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Card_ID'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Text'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Photo'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Music'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Music_StartTime'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Music_Length'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Effect'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Effect_StartTime'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Effect_Length'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Voice'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Voice_StartTime'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Voice_Length'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Length'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Date'); ?></th>
			<th><?php echo $this->Paginator->sort('Card_Owner'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cards as $card): ?>
    <tr>
		<td><?php echo h($card['Card']['Card_ID']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Text']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Photo']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Music']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Music_StartTime']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Music_Length']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Effect']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Effect_StartTime']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Effect_Length']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Voice']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Voice_StartTime']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Voice_Length']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Length']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Date']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['Card_Owner']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $card['Card']['Card_ID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $card['Card']['Card_ID']), null, __('Are you sure you want to delete # %s?', $card['Card']['Card_ID'])); ?>
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
