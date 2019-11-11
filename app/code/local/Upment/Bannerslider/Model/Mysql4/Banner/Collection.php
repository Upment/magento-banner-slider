<?php

/**
 * @category 	  Upment
 * @package 	  Upment_Bannerslider
 * @copyright 	Copyright (c) 2019 Upment (https://www.upment.com/)
 */

/**
 * Bannerslider Resource Collection Model
 *
 * @category 	Upment
 * @package 	Upment_Bannerslider
 * @author  	Upment
 */


class Upment_Bannerslider_Model_Mysql4_Banner_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
		public function _construct()
    {
			$this->_init("bannerslider/banner");
		}
}
