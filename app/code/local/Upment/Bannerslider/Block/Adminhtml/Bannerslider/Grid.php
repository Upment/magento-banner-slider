<?php

/**
 * @category 	  Upment
 * @package   	Upment_Bannerslider
 * @copyright 	Copyright (c) 2019 Upment (https://www.upment.com/)
 */

/**
 * Bannerslider Grid Form Block
 *
 * @category 	Upment
 * @package 	Upment_Bannerslider
 * @author  	Upment
 */

class Upment_Bannerslider_Block_Adminhtml_Bannerslider_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
     {
         parent::__construct();

         $this->setDefaultSort('id');
         $this->setId('bannerslider_bannerslider_grid');
         $this->setDefaultDir('asc');
         $this->setSaveParametersInSession(true);
     }

     protected function _getCollectionClass()
    {
        return 'bannerslider/banner_collection';
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
       {

           $this->addColumn('id',
               array(
                   'header'=> $this->__('ID'),
                   'align' =>'right',
                   'width' => '50px',
                   'index' => 'id'
               )
           );

           $this->addColumn('banner_title',
               array(
                   'header'=> $this->__('Title'),
                   'index' => 'banner_title'
               )
           );

           $this->addColumn('desktop_image',
               array(
                   'header'=> $this->__('Desktop image'),
                   'index' => 'desktop_image'
               )
           );

           $this->addColumn('mobile_image',
               array(
                   'header'=> $this->__('Mobile image'),
                   'index' => 'mobile_image'
               )
           );

           $this->addColumn('link',
               array(
                   'header'=> $this->__('Link'),
                   'index' => 'link'
               )
           );

           $this->addColumn('animation',
               array(
                   'header'=> $this->__('Animation'),
                   'index' => 'animation',
                   'type'  => 'options',
                   'options' => array(
                       0 => 'fade',
                       1 => 'leftslide',
                       2 => 'rightslide',
                   ),
               )
           );

           $this->addColumn('delay',
               array(
                   'header'=> $this->__('Delay'),
                   'index' => 'delay'
               )
           );

           $this->addColumn('visible_in',
               array(
                   'header'=> $this->__('Store'),
                   'index' => 'visible_in'
               )
           );

           $this->addColumn('active',
               array(
                   'header'=> $this->__('Active'),
                   'index' => 'active',
                   'type'  => 'options',
                   'options' => array(
                       0 => 'yes',
                       1 => 'no',
                   ),
               )
           );

           $this->addColumn('action',
               array(
                   'header'=> Mage::helper('bannerslider')->__('Action'),
                   'width' => '50px',
                   'type'  => 'action',
                   'getter'=> 'getId',
                   'actions' => array(
                        array(
                            'caption' => Mage::helper('bannerslider')->__('Edit'),
                            'url'     => array('base' => '*/*/edit'),
                            'field'   => 'id'
                        )
                    ),
                   'filter'=> false,
                   'sortable' => false,
                   'index' => 'stores',
                   'is_system' => true,
              )
            );

           return parent::_prepareColumns();
       }

     public function getRowUrl($row) {
         return $this->getUrl('*/*/edit', array('id' => $row->getId()));
     }

}
