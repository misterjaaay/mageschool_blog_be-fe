<?php
// this file is not the same as ../Blogpost is Mage_Core_Model_Db_Abstract
class Jay_Blog_Model_Resource_Myposts extends Mage_Core_Model_Resource_Db_Abstract{
	protected function _construct(){
		$this->_init('jay_blog/posts', 'myblogpost_id'); //your package name + table(from entities) + primary key Ð²Ñ�ÐµÐ³Ð´Ð° ÑƒÐºÐ°Ð·Ñ‹Ð²Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¸Ð¼Ð°Ñ€Ð¸ ÐºÐµÐ¹
	}
}

