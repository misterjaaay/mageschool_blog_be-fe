<?php
/*
 * "1. При добавлении товара в корзину - умножать количество добавляемого товара на число указанное в админке (system configuration)
* 2. При добавлении поста с фронтенд части - отправлять емейл о новом посте на емейл, указанный в админке (system configuration)"
 * */
class Jay_Blog_Model_Observer{
	public function doubleQty($observer) {
		$event = $observer->getEvent ();
		$qty = $event->getQty();
		$product = $event->getQuoteItem()->setQty($qty*3);
		return $observer;
	}
	
	public function sendEmail($observer)
	{
		$orderIds = $observer->getData('order_ids');
		
		echo "<pre>";
		print_r($orderIds);
		echo "</pre>";
// 		foreach($orderIds as $_orderId){
// 			$order = Mage::getModel('sales/order')->load($_orderId);
// 			try {
// 				$order->sendNewOrderEmail();
// 				Mage::log('email sent');
// 			} catch (Exception $e) {
// 				Mage::logException($e);
// 				}
// 		}
		return $observer;
		
	}
}

