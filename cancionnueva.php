<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Añadir disco</title>
</head>
<body>
    <?php
        try {
            $dwes = "mysql:host=localhost;dbname=discografia";
            $conexion = new PDO($dwes, 'JuanDisco', 'ocgnmOU4jV8Vl5Gf');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    
        if($_POST){

            $stmt = $conexion->prepare("INSERT INTO cancion (titulo, album, posicion, duracion, genero,) VALUES (?, ?, ?, ?, ?, ?, ?)");
            // Bind
            $codigo = $_POST['codigo'];
            $titulo = $_POST['titulo'];
            $discografia = $_POST['discografia'];
            $formato = $_POST['formato'];
            $fechalanzamiento = $_POST['fl'];
            $fechacompra = $_POST['fc'];
            $precio = $_POST['precio'];
            $stmt->bindParam(1, $codigo);
            $stmt->bindParam(2, $titulo);
            $stmt->bindParam(3, $discografia);
            $stmt->bindParam(4, $formato);
            $stmt->bindParam(5, $fechalanzamiento);
            $stmt->bindParam(6, $fechacompra);
            $stmt->bindParam(7, $precio);
            echo '<br>';
            //echo $stmt;
            
            try {
            // Execute
            $stmt->execute();
                 } catch (PDOException $e){
            echo $e->getMessage();
            }
            //echo $stmt->errorCode();
            //print_r($stmt->errorInfo());
        }
    
    ?>
    
    <form name="formulario" action="#" method="post" >
        <div class="">
        <fieldset>
           <legend>Datos del album</legend>
        Codigo<input name="codigo" type="text" /><br>
        Titulo<input name="titulo" type="text" /><br>
        Discografica<input name="discografia" type="text" /><br>
        Formato <select name="formato" >
                <option value="vinilo">Vinilo</option> 
                <option value="cd">Cd</option> 
                <option value="dvd">DvD</option> 
                <option value="mp3">MP3</option> 
            </select><br/>
        Fecha de facturacion<input type="date" id="fl" name="fl"><br>
        Fecha de compra <input type="date" id="fc" name="fc"><br>
         Precio <input name="precio" type="text" /><br>
		
        </fieldset>
        

        <footer>
        <p id="botones">
        <button type="submit"></button>
        </p>
            </footer>
        </div>
    </form>
</body>
</html>