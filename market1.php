<?php


$yml = new YML();

$yml->name = 'Fi\'ora (Фиора)';
$yml->company = 'ООО «БРАВ»';
$yml->url = 'https://www.myfiora.com/';
$yml->currencies = array(
    array('currency' => null, 'attributes' => array('id' => 'RUR', 'rate' => 1))
);
$yml->categories = array(
    array('category' => 'Все товары', 'attributes' => array('id' => 1)),
    array('category' => 'Дом и дача', 'attributes' => array('id' => 2, 'parentId' => 1)),
    array('category' => 'Интерьер', 'attributes' => array('id' => 3, 'parentId' => 2)),
    array('category' => 'Вазы', 'attributes' => array('id' => 4, 'parentId' => 3))
);
//$yml->deliveryOptions = null;
$yml->cpa = 1;

echo $yml->generate();



class YML
{
    protected $date, $charset, $tags;

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
                <shop>' .
                    $this->tags['name'] .
                    $this->tags['company'] .
                    $this->tags['url'] .
                    $this->tags['currencies'] .
                    $this->tags['categories'] .
                    $this->tags['deliveryOptions'] .
                    $this->tags['cpa'] .
                    '<offers>' . $this->tags['offers'] . '</offers>
                </shop>
            </yml_catalog>';
    }

    protected function tag($name, $args)
    {
        $value = is_array($args) ? array_shift($args) : $args;

        if (is_array($args)) {

            $attributes = array_shift($args);

            $attributes = array_reduce(array_keys($attributes), function ($str, $name) use ($attributes) {
                return $str . " $name=\"$attributes[$name]\"";
            });
        }

        return "<$name$attributes" . ($value ? ">$value</$name>" : "/>") . "\n";
    }

    protected function tags($name, $items)
    {
        foreach ($items as $item) {
            $tags .= $this->tag(key($item), array(array_shift($item), array_shift($item)));
        }

        return $this->tag($name, $tags);
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

    public function __call($name, $value)
    {

        $this->tags[$name] = method_exists($this, $name) ? $this->$name($value) : $this->tag($name, $value);

        return $this;
    }

    public function __set($name, $args)
    {
        $this->tags[$name] = is_array($args) && is_array(reset($args)) ? $this->tags($name, $args) : $this->tag($name, $args);
    }
}




class YMLOffer
{
    protected $props, $tags;

    public function __construct($props)
    {
        $this->props = $props;
    }

    public function element()
    {

    }

    public function __call($name, $value)
    {
        var_dump($name, $value);
        $this->tags[$name] = method_exists($this, $name) ? $this->$name($value) : $value;

        return $this;
    }
}