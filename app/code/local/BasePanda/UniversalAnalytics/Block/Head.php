<?php
class BasePanda_UniversalAnalytics_Block_Head extends Mage_Core_Block_Template {

	protected function _construct() {
		parent::_construct();
		$this->setTemplate('basepanda/universalanalytics/head.phtml');
	}

	public function getGaId() {
		return Mage::helper('basepanda_universalanalytics')->getGaId();
	}

}
