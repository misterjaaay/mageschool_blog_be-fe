<?php
class Jay_Blog_IndexController extends Mage_Core_Controller_Front_Action {
	
	/**
	 * Index action
	 */
	public function indexAction() {
		$this->loadLayout ();
		$this->renderLayout ();
	}
	
	public function viewAction() {
		$post = Mage::app ()->getRequest ()->getPost ();
		Mage::getModel('jay_blog/myposts')
			->setTitle($post['title'])
			->setPostCategory($post['category'])
			->setPostContent($post['content'])
		->save();
		$this->_redirectReferer();
	}
}

