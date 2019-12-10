<?php

/**
 * @category 	  Upment
 * @package   	Upment_Bannerslider
 * @copyright 	Copyright (c) 2019 Upment (https://www.upment.com/)
 */

/**
 * Bannerslider Helper
 *
 * @category 	Upment
 * @package 	Upment_Bannerslider
 * @author  	Upment
 */


class Upment_Bannerslider_Helper_Data extends Mage_Core_Helper_Abstract
{

  /**
   * Upload image to media/upment_banner
   *
   * @param string $image_type
   * @return string
   */
  public static function uploadBannerImage($image_type) {
      $banner_image_path = Mage::getBaseDir('media');
      $image = '';
      if (isset($_FILES[$image_type]['name']) && $_FILES[$image_type]['name'] != '') {

          try {
              $uploader = new Varien_File_Uploader($image_type);
              $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
              $uploader->setAllowRenameFiles(true);
              $uploader->setFilesDispersion(false);
              $uploader->save($banner_image_path . DS . 'upment_banner', $uploader->getCorrectFileName($_FILES[$image_type]['name']));

              $image = 'upment_banner' . DS . $uploader->getUploadedFileName();

          } catch (Exception $e) {

          }
      }

      return $image;
  }

  /**
   * Delete image from media/upment_banner folder
   *
   * @param string $image
   * @return string
   */
  public function deleteImageFile($image) {
        if (!$image) {
            return;
        }
        $name = $image;
        $banner_image_path = Mage::getBaseDir('media') . DS .  $name;

        if (!file_exists($banner_image_path)) {
            return;
        }

        try {
            unlink($banner_image_path);
        } catch (Exception $exc) {
            return $exc->getTraceAsString();
        }
  }

  /**
   * Get path to media folder
   *
   * @param string $image
   * @return string
   */
  public function getImages($image) {
        return Mage::getBaseUrl('media') . '/' . $image;
  }

  /**
   * Get animation type based on animationIndex
   *
   * @param string $animationIndex
   * @return string
   */
  public function getAnimationType($animationIndex){
      if ($animationIndex == '0'){
          $animation = 'fade-banner';
        }
      elseif ($animationIndex == '1') {
          $animation = 'leftslide-banner';
        }
      elseif ($animationIndex == '2') {
          $animation = 'rightslide-banner';
        }
      return $animation;
  }
}
