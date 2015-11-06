<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup ();
$table = $installer->getConnection ()->newTable ( $installer->getTable ( 'jay_blog/posts' ) )
->addColumn ( 'myblogpost_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array (
		'unsigned' => true,
		'nullable' => false,
		'primary' => true,
		'identity' => true 
), 'Primary Key' )
->addColumn (
		'title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array (
		'nullable' => false 
), 'Method Title' )
->addColumn (
		'post_content', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array (
		'nullable' => false 
), 'content' )
->addColumn (
		'post_category', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array (
				'nullable' => false
		), 'category' )
->addColumn ( 
		'created at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array (
		'nullable' => false 
), 'created at' )
->setComment ( 
		'jay_blog/myposts Table - my first install script' );

$installer->getConnection ()->createTable ( $table );
$installer->endSetup ();

