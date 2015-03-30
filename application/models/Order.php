<?php

/**
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *	Order model Barker Bob's Burger Bar
 *
 *	@author 	Aarin Smith
 *  @copyright 	2015, Aarin Smith
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++
 */
class Order extends CI_MODEL
{
	protected $xml = null;

	public function __construct()
	{
		parent::__construct();
	}

	public function init( $order )
	{
		$this->xml = simplexml_load_file(DATAPATH . $order);
	}

	public function customer()
	{
		return (string) $this->xml->customer;
	}

	public function getCustomer($order)
	{
		$this->init($order);

		return $this->customer();
	}

	public function type()
	{
		return $this->xml['type'];
	}

	public function getItems()
	{
		$result = [];

		foreach( $this->xml->burger as $order )
		{
			$temp = [];
			$temp[$order['code']]['patty'] = $this->menu->getPatty((string)$order->patty['type']);
			$temp[$order['code']]['topCheese'] = $this->menu->getCheese((string)$order->cheeses['top']);
			$temp[$order['code']]['botCheese'] = $this->menu->getCheese((string)$order->cheeses['bottom']);

			foreach( $order->topping as $topping )
			{
				$temp[$order['code']]['toppings'][] = $this->menu->getTopping((string)$topping['type']);
			}

			foreach( $order->sauce as $sauce )
			{
				$temp[$order['code']]['sauces'][] = $this->menu->getSauce((string)$sauce['type']);
			}

			$result[] = $temp;
		}

		return $result;
	}

	public function getTotal()
	{

	}

}