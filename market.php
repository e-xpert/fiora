<?php


$yml = new YML();

$yml->name = 'Fi\'ora (Фиора)';
$yml->company = 'ООО «БРАВ»';
$yml->url = 'https://www.myfiora.com/';
$yml->currencies = array(
    array('id' => 'RUR', 'rate' => 1)
);
$yml->categories = array(
    array('id' => 1, 'parent_id' => 0, 'name' => 'Все товары'),
    array('id' => 2, 'parent_id' => 1, 'name' => 'Дом и дача'),
    array('id' => 3, 'parent_id' => 2, 'name' => 'Интерьер'),
    array('id' => 4, 'parent_id' => 3, 'name' => 'Вазы')
);
$yml->deliveryOptions = array();
$yml->cpa = 1;

echo $yml->generate();



class YML
{
    protected
        $date,
        $charset,
        $tags = array(),
        $allow = array();

    public function __construct()
    {
        $this->date = date("Y-m-d H:i:s");
        $this->charset = 'UTF-8';
    }

    public function generate()
    {
        header("Content-type: text/xml;charset=' . $this->charset . '");

        return '<?xml version="1.0" encoding="' . $this->charset . '"?>
            <yml_catalog date="' . $this->date . '">
                <shop>
                    <name>' . $this->tags['name'] . '</name>
                    <company>' . $this->tags['company'] . '</company>
                    <url>' . $this->tags['url'] . '</url>
                    <currencies>' . $this->tags['currencies'] . '</currencies>
                    <categories>' . $this->tags['categories'] . '</categories>
                    <delivery-options>' . $this->tags['deliveryOptions'] . '</delivery-options>
                    <cpa>' . $this->tags['cpa'] . '</cpa>
                    <offers>' . $this->tags['offers'] . '</offers>
                </shop>
            </yml_catalog>';
    }

    protected function currencies($currencies)
    {
        return array_reduce($currencies, function ($currencies, $currency) {
            return $currencies . '<currency id="' . $currency['id'] . '" rate="' . $currency['rate'] . '"/>';
        });
    }

    protected function categories($categories)
    {
        return array_reduce($categories, function ($categories, $category) {
            return $categories . '<category id="' . $category['id'] . '" parentId="' . $category['parent_id'] . '">' . $category['name'] . '</category>';
        });
    }

    protected function deliveryOptions($options)
    {
        return array_reduce($options, function ($options, $option) {

            $days = array_key_exists('days', $option) ? ' days="' . $option['days'] . '"' : '';
            $order_before = array_key_exists('order_before', $option) ? ' order-before="' . $option['order_before'] . '"' : '';

            return $options . '<option cost="' . $option['cost'] . '"'. $days . $order_before. '/>';
        });
    }

    protected function offers()
    {

    }


    public function __set($name, $value)
    {
        return $this->tags[$name] = method_exists($this, $name) ? $this->$name($value) : $value;
    }
}