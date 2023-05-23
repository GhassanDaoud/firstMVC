<?php
class Product
{
    protected $pro_id, $pro_name, $pro_price;

    public function set_id($pro_id)
    {
        $this->pro_id = $pro_id;
    }

    public function get_id()
    {
        return $this->pro_id;
    }

    public function set_name($pro_name)
    {
        $this->pro_name = $pro_name;
    }

    public function get_name()
    {
        return $this->pro_name;
    }

    public function set_price($pro_price)
    {
        $this->pro_price = $pro_price;
    }

    public function get_price()
    {
        return $this->pro_price;
    }
}
