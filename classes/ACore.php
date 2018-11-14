<?php 
abstract class ACore {

    protected $db;
    public function __construct(){
        $this->db = mysql_connect(HOST,USER,PASSWORD);
        if(!$this->db) {
            exit("Ошибка соединения с базой данных".mysql_error());
        }
        if (!mysql_select_db(DB,$this->db)) {
            exit("Нет такой базы данных".mysql_error());
        }
        mysql_query("SET NAMES 'UTF8'");

    }
    protected function get_header() {
        include "header.php";
    }

    public function get_body(){

        if (isset($_GET['action']) && method_exists($this, $_GET['action']))  $action = $_GET['action'];
        else $action = 'actionDefault';

        if (!isset($this->actionType[$action]) || $this->actionType[$action] == 'html') $this->get_header();
        $this->{$action}();
    }


}
?>