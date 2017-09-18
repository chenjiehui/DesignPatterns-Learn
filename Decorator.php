<?php
/**
 *装饰器模式
 */
abstract class Land
{
	abstract function cost();
}

class Room extends Land
{
	private $money = 1000;
	public function cost()
	{
	    return $this->money;
	}
}

//装饰器
abstract class RoomDecorator extends Land
{
    protected $land;
    public function __construct(Land $land)
    {
    	$this->land = $land;
    }
}

class LivingRoom extends RoomDecorator
{
    public function cost()
    {
        return $this->land->cost()+200;
    }
}


class DiningRoom extends RoomDecorator
{
    public function cost()
    {
        return $this->land->cost()+100;
    }
}

$livingRoomCost = new LivingRoom(new Room());
echo $livingRoomCost->cost(); //输出1200

$diningRoomCost = new DiningRoom(new Room());
echo $diningRoomCost->cost(); //输出1100

$livingDining = new DiningRoom(new LivingRoom(new Room()));
echo $livingDining->cost(); //输出1300