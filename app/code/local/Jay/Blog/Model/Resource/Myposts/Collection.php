<?php
class Jay_Blog_Model_Resource_Myposts_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract{
	public function _construct(){
		$this->_init('jay_blog/myposts');
	}
}
