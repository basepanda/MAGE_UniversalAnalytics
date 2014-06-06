<?php

class BasePanda_UniversalAnalytics_Block_Checkout_Onepage_Success extends Mage_Core_Block_Template
{

    public function getTransactionDetails()
    {
        $order = $this->getOrder();
        $details = array();
        $details['id'] = $order->getIncrementId();
        $details['revenue'] = $order->getGrandTotal();
        $details['shipping'] = $order->getShippingAmount();
        $details['tax'] = $order->getTaxAmount();
        $details['currency'] = $order->getOrderCurrencyCode();

        if ($order && $order->getId()) {
            $json = json_encode($details);
            return html_entity_decode($json);
        }
        return;
    }

    public function getOrder()
    {
        $lastOrderId = Mage::getSingleton('checkout/session')->getLastOrderId();
        $order = Mage::getSingleton('sales/order')->load($lastOrderId);
        return $order;
    }

    public function getTransactionItems()
    {
        $order = $this->getOrder();
        $itemDetails = array();
        $items = $order->getAllItems();
        foreach ($items as $item):
            $details = array();
            $details['id'] = $order->getIncrementId();
            $details['name'] = $item->getName();
            $details['sku'] = $item->getSku();
            $details['price'] = $item->getPrice();
            $details['quantity'] = $item->getQtyOrdered();
            $itemDetails[] = html_entity_decode(json_encode($details));
        endforeach;
        return $itemDetails;
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('basepanda/universalanalytics/checkout/onepage/success.phtml');
    }

}