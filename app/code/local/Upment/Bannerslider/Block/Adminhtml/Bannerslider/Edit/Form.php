<?php

/**
 * @category 	  Upment
 * @package 	  Upment_Bannerslider
 * @copyright 	Copyright (c) 2019 Upment (https://www.upment.com/)
 */

/**
 * Bannerslider Edit Form Block
 *
 * @category 	Upment
 * @package 	Upment_Bannerslider
 * @author  	Upment
 */

class Upment_Bannerslider_Block_Adminhtml_Bannerslider_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form(array(
                                      'id'      => 'edit_form',
                                      'action'  => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                                      'method'  => 'post',
                                      'enctype' => 'multipart/form-data'
                                   )
      );

      $form->setUseContainer(true);
      $this->setForm($form);
      return parent::_prepareForm();
  }
}
