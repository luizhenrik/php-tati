<?php
include("extend.base.php");
class Products extends Base{

    public function product_exists_name($nome_do_produto){
        $result = $this->database->query("SELECT `nome` FROM `produtos` WHERE `Nome` = '$nome_do_produto'");
        if ($result->num_rows > 0) {
            $exist = true;
        } else {
            $exist = false;
        }
        return $exist;
        $conn->close();
    }

    public function product_exists_id($id){
        $result = $this->database->query("SELECT `id` FROM `produtos` WHERE `id` = '$id'");
        if ($result->num_rows > 0) {
            $exist = true;
        } else {
            $exist = false;
        }
        return $exist;
        $conn->close();
    }

    public function getAll(){
        $result = $this->database->query("SELECT * FROM `produtos`");
        return $result;
        $this->database->close();
    }

    public function add($name,$price){
        $result = $this->database->query("INSERT INTO `produtos`(`id`, `nome`, `valor`) VALUES (NULL,'$name','$price')");
        return $result;
        $this->database->close();
    }

    public function delete($id){
        $result = $this->database->query("DELETE FROM `produtos` WHERE `id`='$id'");
        return $result;
        $this->database->close();
    }



}