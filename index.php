<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajo Practico 1</title>
</head>

<body>
    <h2>hola</h2>
    <?php
    $titulo = "Hola Mundo ";
    echo "<h1>" . $titulo . "</h1>";
    ?>
    <!-- <php
        $arreglo = array(1,5,3,5,435,25,35,3);
        echo "<ul>";
        foreach ($arreglo as $elem)
            echo "<li>".$elem."<li>";
        echo "<ul>" 
            ?>
    > -->
    <form action="index.php" method="POST" >
        <input type="text" name="nombre" placeholder="nombre" required>
        <input type="number" name="edad" placeholder="edad" required>
        <input type="submit" id="enviar">
    </form>

    <?php
        if(isset($_POST["nombre"])){
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            echo "<p>usuario:" . $nombre . "</p>";
            echo "<p>edad:" . $edad . "</p>";
        }
    ?>
    <script src="main.js"></script>
</body>

</html>