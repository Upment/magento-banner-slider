<?php

/**
 * @category 	  Upment
 * @package   	Upment_Bannerslider
 * @copyright 	Copyright (c) 2019 Upment (https://www.upment.com/)
 */

/**
 * Bannerslider Edit Block
 *
 * @category 	Upment
 * @package 	Upment_Bannerslider
 * @author  	Upment
 */

class Upment_Bannerslider_Block_Adminhtml_Bannerslider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

  public function __construct()
  {
    parent::__construct();

    $this->_objectId = 'id';
    $this->_blockGroup = 'bannerslider';
    $this->_controller = 'adminhtml_bannerslider';

    $this->_updateButton('save', 'label', Mage::helper('bannerslider')->__('Save Banner'));
    $this->_updateButton('delete', 'label', Mage::helper('bannerslider')->__('Delete Banner'));

    $this->_addButton('saveandcontinue', array(
      'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
      'onclick'   => 'saveAndContinueEdit()',
      'class'     => 'save',
    ), -100);

    $this->_formScripts[] = "

      function saveAndContinueEdit(){
        editForm.submit($('edit_form').action+'back/edit/');
      }
    ";
 }
 public function getHeaderText()
 {
         if( Mage::registry('banner_data') && Mage::registry('banner_data')->getId() ) {
             return Mage::helper('bannerslider')->__("Edit Banner '%s'", $this->htmlEscape(Mage::registry('banner_data')->getBanner_title()));
         } else {
             return Mage::helper('bannerslider')->__('New Banner');
         }
 }
}
