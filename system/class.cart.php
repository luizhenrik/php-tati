<?php

class Cart{

    public $id_product;
    public $qtd_product;

    public function __construct(){
    }
    
    public function setArrayValueFromKeys(&$array, $keys, $value) {
        $keys = explode('][', trim($keys, '[]'));
        $reference = &$array;
        foreach ($keys as $key) {
            if (!array_key_exists($key, $reference)) {
                $reference[$key] = [];
            }
            $reference = &$reference[$key];
        }
        $reference = $value;
    }

    public function new_product($id_product, $qtd_product = 1, $id_frete = 1){
        $this->setArrayValueFromKeys($_SESSION['test'], "[$id_product][id_product]", $id_product);
        $this->setArrayValueFromKeys($_SESSION['test'], "[$id_product][qtd_product]", $qtd_product);
    }


    public function product_exists($id_product){
        if(!isset($_SESSION['test'][$id_product])){
            $_SESSION['test'][$id_product] = (array)$this;
        }
        
        $this->product_qtd_exists($id_product);
    }
    
    public function product_qtd_exists($id_product){
        if(!isset($_SESSION['test'][$id_product]['id_product'])){
            $this->new_product($id_product);
        }else{
            $this->add_product($id_product);
        }
    }

    public function del_product($id_product){
        unset($_SESSION['test'][$id_product]);
        return $_SESSION['test'];
    }

    public function remove_product($id_product){
        $qtd_product_subtract = ($_SESSION['test'][$id_product]['qtd_product'] <= 1) ? 1 : $_SESSION['test'][$id_product]['qtd_product'] - 1;
        $this->setArrayValueFromKeys($_SESSION['test'], "[$id_product][qtd_product]", $qtd_product_subtract);
    }
    
    public function add_product($id_product){
        $qtd_product_sum = $_SESSION['test'][$id_product]['qtd_product'] + 1;
        $this->setArrayValueFromKeys($_SESSION['test'], "[$id_product][qtd_product]", $qtd_product_sum);
    }

    public function truncate_cart(){
        unset($_SESSION['test']);
    }
}
