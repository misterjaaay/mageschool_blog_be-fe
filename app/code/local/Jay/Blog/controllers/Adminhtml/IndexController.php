<?php
class Jay_Blog_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action {
	/**
	 * Index action
	 */
	public function indexAction() {
		$this->loadLayout ()->_setActiveMenu ( 'jay_blog' );
		$this->_addContent ( $this->getLayout ()->createBlock ( 'jay_blog/adminhtml_posts_container' ) );
		$this->renderLayout ();
	}
	public function gridAction() {
		$this->loadLayout ()->_setActiveMenu ( 'jay_blog' );
		$this->getResponse ()->setBody ( $this->getLayout ()->createBlock ( 'jay_blog/adminhtml_posts_container_grid' )->toHtml () );
	}
	public function massDeleteAction() {
		$news = $this->getRequest ()->getParam ( 'news', null );
		
		if (is_array ( $news ) && sizeof ( $news ) > 0) {
			try {
				foreach ( $news as $id ) {
					Mage::getModel ( 'jay_blog/myposts' )->setId ( $id )->delete ();
				}
				$this->_getSession ()->addSuccess ( $this->__ ( 'Total of %d post(s) have been deleted', sizeof ( $news ) ) );
			} catch ( Exception $e ) {
				$this->_getSession ()->addError ( $e->getMessage () );
			}
		} else {
			$this->_getSession ()->addError ( $this->__ ( 'Please select post' ) );
		}
		$this->_redirect ( '*/*' );
	}
	public function newAction() {
		$this->_forward ( 'edit' );
	}
	public function editAction() {
		$id = $this->getRequest ()->getParam ( 'myblogpost_id', null );
		$model = Mage::getModel ( 'jay_blog/myposts' );
		if ($id) {
			$model->load ( ( int ) $id );
			if ($model->getId ()) {
				$data = Mage::getSingleton ( 'adminhtml/session' )->getFormData ( true );
				if ($data) {
					$model->setData ( $data )->setId ( $id );
				}
			} else {
				Mage::getSingleton ( 'adminhtml/session' )->addError ( 'Does not exist' );
				$this->_redirect ( '*/*/' );
			}
			Mage::register ( 'data', $model );
		}
		$this->loadLayout ()->_setActiveMenu ( 'jay_blog' );
		$this->_addContent ( $this->getLayout ()->createBlock ( 'jay_blog/adminhtml_posts_container_edit' ) );
		$this->renderLayout ();
	}
	public function saveAction() {
		if ($data = $this->getRequest ()->getPost ()) {
			$model = Mage::getModel ( 'jay_blog/myposts' );
			try {
				$id = $this->getRequest ()->getParam ( 'id' );
				$model->setData ( $data );
				Mage::getSingleton ( 'adminhtml/session' )->setFormData ( $data );
				if ($id) {
					$model->setId ( $id );
				}
				$model->save ();
				if (! $model->getId ()) {
					Mage::throwException ( 'Error saving record' );
				}
				Mage::getSingleton ( 'adminhtml/session' )->addSuccess ( 'Record was successfully saved.' );
				Mage::getSingleton ( 'adminhtml/session' )->setFormData ( false );
				$this->_redirect ( '*/*/' );
			} catch ( Exception $e ) {
				Mage::getSingleton ( 'adminhtml/session' )->addError ( $e->getMessage () );
				$this->_redirect ( '*/*/' );
			}
		}
		Mage::getSingleton ( 'adminhtml/session' )->addError ( 'No data found to save' );
		$this->_redirect ( '*/*/' );
	}
	public function deleteAction() {
		if ($id = $this->getRequest ()->getParam ( 'id' )) {
			try {
				$model = Mage::getModel ( 'jay_blog/myposts' );
				$model->setId ( $id );
				$model->delete ();
				Mage::getSingleton ( 'adminhtml/session' )->addSuccess ( 'The record has been deleted.' );
				$this->_redirect ( '*/*/' );
			} catch ( Exception $e ) {
				Mage::getSingleton ( 'adminhtml/session' )->addError ( $e->getMessage () );
				$this->_redirect ( '*/*/edit', array (
						'id' => $id 
				) );
			}
		}
		Mage::getSingleton ( 'adminhtml/session' )->addError ( 'Unable to find the record to delete.' );
		$this->_redirect ( '*/*/' );
	}
}