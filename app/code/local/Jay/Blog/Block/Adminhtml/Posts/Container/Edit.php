<?php
class Jay_Blog_Block_Adminhtml_Posts_Container_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
	public function __construct() {
		parent::__construct ();
		$this->_objectId = 'id';
		$this->_blockGroup = 'jay_blog';
		$this->_controller = 'adminhtml_posts_container';
		$this->_mode = 'edit';
		$this->_updateButton ( 'save', 'label', 'Save Post' );
		$this->_addButton('save_and_continue', array(
			'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
			'onclick' => 'saveAndContinueEdit()',
			'class' => 'save',
	), -100);
	$this->_updateButton('save', 'label', Mage::helper('jay_blog')->__('Save Example'));

	$this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('form_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edit_form');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
	}
	public function getHeaderText() {
	if (Mage::registry('data') && Mage::registry('data')->getId())
	{
		return Mage::helper('jay_blog')->__('Edit Example "%s"', $this->htmlEscape(Mage::registry('data')->getName()));
	} else {
		return Mage::helper('jay_blog')->__('New Example');
	}
	}
}
