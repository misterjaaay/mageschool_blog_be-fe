<?php
$tickets = array(
		array(
				'title' => 'Broken cart',
				'category' => 'Unable to add items to cart.',
				'content' => 'Unable to add items to cart.',
		),
		array(
				'title' => 'Broken cart1',
				'category' => 'Unable to add items to cart.',
				'content' => 'Unable to add items to cart.',
		),
		array(
				'title' => 'Broken cart2',
				'category' => 'Unable to add items to cart.',
				'content' => 'Unable to add items to cart.',
		),
);

foreach ($tickets as $ticket) {
	Mage::getModel('jay_blog/posts')
	->setData($ticket)
	->save();
}