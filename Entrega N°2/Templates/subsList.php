<?php
include_once 'Templates/header.phtml';


echo "<table class=table>
<thead>
  <tr>
  <th scope=>itipo_subscripcion_id</th>
  <th scope=>nombre_subscripcion</th>
  <th scope=>caracteristicas</th>
  <th scope=>precio</th>
  <th scope=>duracion</th>
  </tr>
  </thead>
  <tbody>";

foreach ($subscripciones as $subscripcion) {
    echo "
    <tr>
      <th scope=>$subscripcion->tipo_subscripcion_id</th>
      <td>$subscripcion->nombre_subscripcion</td>
      <td>$subscripcion->caracteristicas</td>
      <td>$subscripciones->precio</td>
      <td>$subscripciones->duracion</td>
    </tr>";
}

echo "</table>";
