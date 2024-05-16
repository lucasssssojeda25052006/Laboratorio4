<?php include("header.php"); ?>
<?php include("funciones.php")?>
<h2>Generador de Dígitos Verificadores</h2>
<form action="" method="post">
    <label for="primeros_siete">Ingrese los primeros 7 números de la cédula:</label>
    <input type="text" name="primeros_siete" required>
    <button type="submit" name="generar_digito">Generar Dígito Verificador</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generar_digito"])) {
    $primeros_siete = $_POST["primeros_siete"];
    $digito_verificador = generarDigitoVerificador($primeros_siete);
    echo "<p>El dígito verificador correspondiente es: $digito_verificador</p>";
}
?>
<?php include("footer.php"); ?>
