<?php
// Conexión a la base de datos (ajusta las credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ziontech_produc_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Consulta SQL para obtener los datos de la tabla de productos
$sql = "SELECT Nombre, Marca, Modelo, Descripcion, Categoria, Precio FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de precios - Zion Tech</title>
  <style>
    /* Estilos generales */
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f1;
    }

    /* Encabezado */
    header {
      background-color: #007bff;
      color: white;
      padding: 20px 0;
    }

    /* Tabla de precios */
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #f0f0f0;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #007bff;
    }

    th {
      background-color: #299CAB;
      color: white;
    }

    /* Botón */
    button {
      background-color: #40B8C8;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      justify-content: center;
	  text-align: center;
	   display: block;
	   margin: 0 auto;
	   text-align: center;
    }

    /* Pie de página */
    footer {
      text-align: center;
      background-color: #06405E;
      color: white;
      padding: 10px 0;
    }
  </style>
</head>
<body>
  <h1>Lista de precios - Zion Tech</h1>
  <table>
    <tr>
      <th>Producto</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Descripción</th>
      <th>Categoría</th>
      <th>Precio</th>
    </tr>
    <?php
    // Mostrar los datos de la tabla de productos
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Nombre"] . "</td><td>" . $row["Marca"] . "</td><td>" . $row["Modelo"] . "</td><td>" . $row["Descripcion"] . "</td><td>" . $row["Categoria"] . "</td><td>" . $row["Precio"] . "</td></tr>";
      }
    } else {
      echo "<tr><td colspan='6'>No hay productos disponibles.</td></tr>";
    }
    ?>
  </table>
  <button onclick="window.print()">Imprimir lista de precios</button>


  <footer>
    <p>&copy; 2024 Zion Tech. Todos los derechos reservados.</p>
  </footer>
</body>
</html>

<?php
// Cierra la conexión
$conn->close();
?>
