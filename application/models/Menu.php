<?php

/*
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Menu extends CI_Model {

    protected $xml = null;

    // Constructor
    public function __construct() {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH . 'menu.xml');
    }


    // retrieve a list of patties, to populate a dropdown, for instance
    function patties()
    {
        $patties = [];

        foreach( $this->xml->patties->patty as $patty )
        {
            $patties[] = (string) $patty;
        }

        return $patties;
    }

    // retrieve a patty record, perhaps for pricing
    function getPatty($code)
    {
        foreach( $this->xml->patties->patty as $patty )
        {
            if( $patty['code'] == $code )
            {
                $result['code'] = (string) $patty['code'];
                $result['price'] = (string) $patty['price'];
                $result['name'] = (string) $patty;

                return $result;
            }
        }

        return 1;
    }

    // Get names of all cheeses as Array
    function cheeses()
    {
        $cheeses = [];

        foreach( $this->xml->cheeses->cheese as $cheese )
        {
            $cheeses[] = (string) $cheese;
        }

        return $cheeses;
    }

    // Retrieve cheese record, returns 1 if not found.
    function getCheese($code)
    {
        foreach( $this->xml->cheeses->cheese as $cheese )
        {
            if( $cheese['code'] == $code )
            {
                $result['code'] = (string) $cheese['code'];
                $result['price'] = (string) $cheese['price'];
                $result['name'] = (string) $cheese;

                return $result;
            }
        }

        return 1;
    }

    // Returns array of toppings from menu XML
    function toppings()
    {
        $toppings = [];

        foreach( $this->xml->toppings->topping as $topping )
        {
            $toppings[] = (string) $topping;
        }

        return $toppings;
    }

    // Retrive topping record, returns 1 if not found.
    function getTopping( $code )
    {
        foreach( $this->xml->toppings->topping as $topping )
        {
            if( $topping['code'] == $code )
            {
                $result['code'] = (string) $topping['code'];
                $result['price'] = (string) $topping['price'];
                $result['name'] = (string) $topping;

                return $result;
            }
        }

        return 1;
    }

    function sauces()
    {
        $sauces = [];

        foreach( $this->xml->sauces->sauce as $sauce )
        {
            $sauces[] = (string) $sauce;
        }

        return $sauces;
    }

    // Retrive sauce record, returns 1 if not found.
    function getSauce( $code )
    {
        foreach( $this->xml->sauces->sauce as $sauce )
        {
            if( $sauce['code'] == $code )
            {
                $result['code'] = (string) $sauce['code'];
                $result['price'] = (string) $sauce['price'];
                $result['name'] = (string) $sauce;

                return $result;
            }
        }

        return 1;
    }

}
