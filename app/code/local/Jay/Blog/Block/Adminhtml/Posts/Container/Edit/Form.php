<?php
class Jay_Blog_Block_Adminhtml_Posts_Container_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
	protected function _prepareForm() {
		if (Mage::getSingleton ( 'adminhtml/session' )->getExampleData ()) {
			$data = Mage::getSingleton ( 'adminhtml/session' )->getExamplelData ();
			Mage::getSingleton ( 'adminhtml/session' )->getExampleData ( null );
		} elseif (Mage::registry ( 'data' )) {
			$data = Mage::registry ( 'data' )->getData ();
		} else {
			$data = array ();
		}
		
		$form = new Varien_Data_Form ( array (
				'id' => 'edit_form',
				'action' => $this->getUrl ( '*/*/save', array (
						'id' => $this->getRequest ()->getParam ( 'id' ) 
				) ),
				'method' => 'post',
				'enctype' => 'multipart/form-data' 
		) );
		
		$form->setUseContainer ( true );
		$helper = Mage::helper ( 'jay_blog' );
		$this->setForm ( $form );
		
		$fieldset = $form->addFieldset ( 'blog_form', array (
				'legend' => $helper->__ ( 'Post Content' ) 
		) );
		
		$fieldset->addField ( 'product_id', 'text', array (
				'label' => $helper->__ ( 'Product Id' ),
				'header' => 'product_id',
				'align' => 'right',
				'width' => '50px',
				'index' => 'product_id',
				'note' => $helper->__ ( 'The name of the example.' ) 
		) );
		
		$fieldset->addField ( 'title', 'text', array (
				'label' => $helper->__ ( 'Title' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'title',
				'note' => $helper->__ ( 'The name of the example.' ) 
		) );
		
		$fieldset->addField ( 'post_category', 'text', array (
				'label' => $helper->__ ( 'Category' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'post_category',
				'note' => $helper->__ ( 'The name of the example.' ) 
		) );
		$fieldset->addField ( 'post_content', 'textarea', array (
				'label' => $helper->__ ( 'Content' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'post_content',
				'note' => $helper->__ ( 'The name of the example.' ) 
		) );
		
		$fieldset->addField('enabled', 'radios', array(
          'label'     => $helper->__('Enabled'),
          'name'      => 'enabled',
          'value'  => '0',
          'values' => array(
                            array('value'=>'0','label'=>'Hide Post <br /><br />'),
                            array('value'=>'1','label'=>'Show Post '),
                       ),
          'disabled' => false,
          'readonly' => false,
          'tabindex' => 1
        ));
		$fieldset->addField ( 'post_image', 'file', array (
				'label' => $helper->__ ( 'Image' ),
				'name' => 'post_image',
				'note' => $helper->__ ( 'The name of the example.' ) 
		) );
		$form->setValues ( $data );
		
		return parent::_prepareForm ();
	}
}