<?php

class Cart{

    public $id_product;
    public $qtd_product;
    public $id_frete;

    public function __construct(){
        
    }
    
    public function new_product($id_product, $qtd_product = 1, $id_frete = 1){
        $this->setArrayValueFromKeys($_SESSION['test'], "[$id_product][id_product]", $id_product);
        $this->setArrayValueFromKeys($_SESSION['test'], "[$id_product][qtd_product]", $qtd_product);
        $this->setArrayValueFromKeys($_SESSION['test'], "[$id_product][id_frete]", $id_frete);
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

    public function product_exists($id_product){
        if($_SESSION['test'][$id_product] == NULL){
            $_SESSION['test'][$id_product] = (array)$this;
        }
        // var_dump($_SESSION['test'][$id_product]);
        if($_SESSION['test'][$id_product]['id_product'] == NULL){
            // echo 'é null';
            $this->new_product($id_product);
        }else{
            // echo 'não é null' . "\n";
            $qtd_product_sum = $_SESSION['test'][$id_product]['qtd_product'] + 1;
            $this->setArrayValueFromKeys($_SESSION['test'], "[$id_product][qtd_product]", $qtd_product_sum);
        }
        var_dump($_SESSION['test']);
    }

    public function delete_product($product){}

    public function list_frete(){}

    public function selected_frete($frete_selecionado){}
}