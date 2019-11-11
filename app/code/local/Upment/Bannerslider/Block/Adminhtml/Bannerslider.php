<?php

/**
 * @category   	Upment
 * @package   	Upment_Bannerslider
 * @copyright 	Copyright (c) 2019 Upment (https://www.upment.com/)
 */

/**
 * Bannerslider Adminhtml Block
 *
 * @category 	Upment
 * @package 	Upment_Bannerslider
 * @author  	Upment
 */

class Upment_Bannerslider_Block_Adminhtml_Bannerslider extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_blockGroup = 'bannerslider';
  $this->_controller = 'adminhtml_bannerslider';
	$this->_headerText = $this->__('Banner Slider');
	$this->_addButtonLabel = $this->__('New Banner');

	parent::__construct();
	}

}
