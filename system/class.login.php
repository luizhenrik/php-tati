<?php
include("extend.base.php");
class Login extends Base{

    public function user_exists($username){
        $result = $this->database->query("SELECT `usuario` FROM `usuarios` WHERE `usuario` = '$username'");
        if ($result->num_rows > 0) {
            $exist = true;
        } else {
            $exist = false;
        }
        return $exist;
        $conn->close();
    }
    
    public function pass_exists($password){
        $result = $this->database->query("SELECT `senha` FROM `usuarios` WHERE `senha` = md5('$password')");
        if ($result->num_rows > 0) {
            $exist = true;
        } else {
            $exist = false;
        }
        return $exist;
        $conn->close();
    }
}