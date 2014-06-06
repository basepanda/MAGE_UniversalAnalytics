<?php
class BasePanda_UniversalAnalytics_Helper_Data extends Mage_Core_Helper_Abstract {
	const CONFIG_GA_ID = 'basepanda_universalanalytics/default/gaid';

	public function getGaId($store = null) {
		return Mage::getStoreConfig(self::CONFIG_GA_ID, $store);
	}
}