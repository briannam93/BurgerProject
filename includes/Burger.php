<?php
/**
 * 
 * @package FoodTruck
 * @author Damien and Brianna
 * @version 0.1 2016/07/25
 * @link http://damiendev.net/sm16/demo.project2
 * @license http://www.apache.org/licenses/LICENSE-2.0
/**
* Burger class, stores Burger
*
* I love Burgers!
*
*<code>
* $myBurger = new Burger('Bacon','Description',9.99);
*</code>
*
* @todo none
*/
class Burger
{
    public $Type = '';
    public $Description = '';
    public $Price = 8.99;
    
    
    
    
  /**
   * Loads burger data
   *
   * More detail about description
   *
   *<code>
   * $myBurger = new Burger('Bacon','Fries',9.99);
   *</code>
   *
   * @param string $Type What kind of burger it is
   * @param string $Size How large the burger is
   * @return float $Price Cost of the burger
   * @todo none
   */
    public function __construct($Type,$Description,$Price)
    {
        $this->Type = $Type;
        $this->Description = $Description;
        $this->Price = $Price;
        
        
    }//end constructor
}//end burger class

