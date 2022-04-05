<?php 
$path = dirname(__FILE__);
require_once($path.'/../../class/position.php');

if (isset($_GET['get_permission']) && isset($_GET['position'])) {
    $PositionModel = new Position();
    $id_position = $_GET['id_position'];
    $positions = $PositionModel->getPositions();
    if ($positions) {
?>
        


<?
    }
    
}
else {
    $id_position = 0;
}


?>