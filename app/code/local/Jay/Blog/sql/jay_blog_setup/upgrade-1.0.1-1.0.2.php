<?php
// echo 'Running This Upgrade: '.get_class($this)."\n <br /> \n";
// die("Exit for now");

$installer = $this;
$installer->startSetup();
$installer->getConnection()

->addColumn($installer->getTable('jay_blog/posts'), 'product_id', array(
		'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
		'nullable' => false,
		'comment' => 'Sub title'
));
$installer->endSetup();