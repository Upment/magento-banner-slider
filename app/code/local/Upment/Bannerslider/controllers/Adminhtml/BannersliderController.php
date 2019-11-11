<?php
/**
 * @category   	Upment
 * @package 	  Upment_Bannerslider
 * @copyright 	Copyright (c) 2019 Upment (https://www.upment.com/)
 */

/**
 * Bannerslider Index Controller
 *
 * @category 	Upment
 * @package 	Upment_Bannerslider
 * @author  	Upment
 */

class Upment_Bannerslider_Adminhtml_BannersliderController extends Mage_Adminhtml_Controller_Action
{

	protected function _isAllowed()
    {
        return true;
    }

		protected function _initAction() {
				$this->loadLayout()
								->_setActiveMenu('bannerslider/banner')
								->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
				return $this;
		}

		public function indexAction() {
				$this->_initAction()
								->renderLayout();
		}


	public function editAction()
		{
    $id = $this->getRequest()->getParam("id");
    $model = Mage::getModel("bannerslider/banner")->load($id);

		$data = Mage::getSingleton('adminhtml/session')->getFormData(true);

		if ($model->getId() || $id == 0) {
				$data = Mage::getSingleton('adminhtml/session')->getFormData(true);

				if (!empty($data)){
						$model->setData($data);
					}

				Mage::register('banner_data', $model);

				$this->loadLayout();
				$this->_setActiveMenu('bannerslider/banner');

				$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
				$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

				$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
				$this->_addContent($this->getLayout()->createBlock('bannerslider/adminhtml_bannerslider_edit'))
								->_addLeft($this->getLayout()->createBlock('bannerslider/adminhtml_bannerslider_edit_tabs'));

				$this->renderLayout();
		} else {
				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bannerslider')->__('Item does not exist'));
				$this->_redirect('*/*/');
		}
	}

	public function newAction() {
				$this->_forward('edit');
	}

	public function saveAction() {
			if ($data = $this->getRequest()->getPost()) {

					$type = 'desktop_image';

					if (isset($data[$type]['delete'])) {
							Mage::helper('bannerslider')->deleteImageFile($data[$type]['value']);
					}
					$image = Mage::helper('bannerslider')->uploadBannerImage($type);
					if ($image || (isset($data[$type]['delete']) && $data[$type]['delete'])) {
							$data[$type] = $image;
					} else {
							unset($data[$type]);
					}

					$type = 'mobile_image';
					if (isset($data[$type]['delete'])) {
							Mage::helper('bannerslider')->deleteImageFile($data[$type]['value']);
					}
					$image = Mage::helper('bannerslider')->uploadBannerImage($type);
					if ($image || (isset($data[$type]['delete']) && $data[$type]['delete'])) {
							$data[$type] = $image;
					} else {
							unset($data[$type]);
					}



					try {
						$storeIds = $data['visible_in'];
						$data['visible_in'] = implode(',', $storeIds);

						$model = Mage::getModel('bannerslider/banner')->addData($data)->setId($this->getRequest()->getParam('id'))->save();
						Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('bannerslider')->__('Banner was successfully saved'));
						Mage::getSingleton('adminhtml/session')->setFormData(false);

						if ($this->getRequest()->getParam('back')) {
									$this->_redirect('*/*/edit', array('id' => $model->getId()));
									return;
						}
							$this->_redirect('*/*/');
							return;
					} catch (Exception $e) {
							Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
							Mage::getSingleton('adminhtml/session')->setFormData($data);
							$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
							return;
					}
			}
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bannerslider')->__('Unable to find banner to save'));
			$this->_redirect('*/*/');
	}

	public function deleteAction() {
			if ($this->getRequest()->getParam('id') > 0) {
					try {
							$model = Mage::getModel('bannerslider/banner')->load($this->getRequest()->getParam('id'));
	            $desktop_image = $model->getDesktop_image();
						  $mobile_image = $model->getMobile_image();
							Mage::helper('bannerslider')->deleteImageFile($desktop_image);
							Mage::helper('bannerslider')->deleteImageFile($mobile_image);

	            $model->delete();

							Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Banner was successfully deleted'));
							$this->_redirect('*/*/');
					} catch (Exception $e) {
							Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
							$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
					}
			}
			$this->_redirect('*/*/');
	}

}
