<?php

/**
 * @category 	  Upment
 * @package   	Upment_Bannerslider
 * @copyright 	Copyright (c) 2019 Upment (https://www.upment.com/)
 */

/**
 * Bannerslider Model
 *
 * @category 	Upment
 * @package 	Upment_Bannerslider
 * @author  	Upment
 */


class Upment_Bannerslider_Model_Banner extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
       $this->_init("bannerslider/banner");
    }
}
