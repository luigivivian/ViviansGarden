<?php
/**
 * Created by PhpStorm.
 * User: luigi
 * Date: 16/05/18
 * Time: 14:57
 */

include_once 'Classes/Planta.php';
$p = new Planta();
$data = $p->getPlantas();
echo json_encode($data);