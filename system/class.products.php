<?php
include("extend.base.php");
class Products extends Base{

    public function product_exists($nome_do_produto){
        $result = $this->database->query("SELECT `nome` FROM `produto` WHERE `nome` = '$nome_do_produto'");
        if ($result->num_rows > 0) {
            $exist = true;
        } else {
            $exist = false;
        }
        return $exist;
        $conn->close();
    }

    public function getAll(){
        $result = $this->database->query("SELECT * FROM `produtos` WHERE 1");
        return $result;
        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while($row = $result->fetch_assoc()) {
        //         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        //     }
        // } else {
        //     return "Nenhum produto cadastrado";
        // }
        $conn->close();
    }



}