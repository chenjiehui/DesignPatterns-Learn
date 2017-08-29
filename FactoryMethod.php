<?php
/**
 * 工厂方法模式
 **/

interface People
{
    public function say();
}
class Man implements People
{
    public function say()
    {
        echo 'this is a man';
    }
}
class Women implements People
{
    public function say()
    {
        echo 'this is a women';
    }
}
//与简单工厂模式相比。区别在于，此处将对象的创建抽象成一个接口
interface CreatePeople
{
    public function create();
}
class FactoryMan implements CreatePeople
{
    public function create()
    {
        return new Man();
    }
}
class FactoryWomen implements CreatePeople
{
    public function create()
    {
        return new Women();
    }
}
class  Client
{
    // 具体生产对象并执行对象方法测试
    public function test() {
        $factory = new FactoryMan();
        $man = $factory->create();
        $man->say();
        $factory = new FactoryWomen();
        $man = $factory->create();
        $man->say();
    }
}
// 执行
$demo = new Client();
$demo->test();