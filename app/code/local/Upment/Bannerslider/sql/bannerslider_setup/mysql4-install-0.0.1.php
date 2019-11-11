<?php

/**
 * @category 	  Upment
 * @package 	  Upment_Bannerslider
 * @copyright 	Copyright (c) 2019 Upment (https://www.upment.com/)
 */

/**
 * Bannerslider SQL Setup
 *
 * @category 	Upment
 * @package 	Upment_Bannerslider
 * @author  	Upment
 */

$installer = $this;
$installer->startSetup();

/**
 * Create upment_banner table
 */

$installer->run("
DROP TABLE IF EXISTS {$this->getTable('upment_banner')};
CREATE TABLE {$this->getTable('upment_banner')} (
  `id` int(11) unsigned NOT NULL auto_increment,
  `banner_title` varchar(80) NOT NULL,
  `desktop_image` varchar(255) NOT NULL,
  `mobile_image` varchar(255) NOT NULL,
  `delay` smallint(6) NOT NULL,
  `link` varchar(255),
  `animation` varchar(80),
  `visible_in` varchar(255),
  `active` varchar(10),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->run($sql);

$installer->endSetup();
