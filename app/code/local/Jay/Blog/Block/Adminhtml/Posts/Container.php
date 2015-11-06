<?php
class Jay_Blog_Block_Adminhtml_Posts_Container extends Mage_Adminhtml_Block_Widget_Grid_Container {
	public function __construct() {
		$this->_blockGroup = 'jay_blog'; // should be named after the extension
		$this->_controller = 'adminhtml_posts_container';
		$this->_headerText = 'Posts'; // defines the text for the header of the grid container
		$this->_addButtonLabel = 'Add New Post'; // lets you change the label of the button used to add a record.
		parent::__construct ();
		
	}
}