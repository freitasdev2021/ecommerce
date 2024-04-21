<?php
class Microlins{
    public static function DB(){
        return mysqli_connect('127.0.0.1','root','','microlinsIpatinga');
    }
}