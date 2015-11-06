<?php
class Jay_Blog_Block_JayBlock extends Mage_Core_Block_Template {
	public function getwelcome() {
		return 'This is ' . $this->getLayout ()->getBlock ( 'head' )->getTitle ();
	}
	public function getPosts() {
// 		echo get_class ( Mage::getModel ( 'jay_blog/posts' ) );
		$blogpostCollection = Mage::getModel ( 'jay_blog/myposts' )->getCollection ();
		$blogpostCollection->setOrder ( 'myblogpost_id', 'DESC' )->addFieldToFilter('enabled', array('eq'=>'1'))->getSelect()->limit(20);
		return $blogpostCollection;
	}
	
}

