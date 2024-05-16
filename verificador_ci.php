<?php include("header.php"); ?>
<?php include("funciones.php")?>
<h2>Comprobador de Cédulas de Identidad Uruguaya</h2>
<form action="" method="post">
    <label for="ci">Ingrese el número de cédula:</label>
    <input type="text" name="ci" required>
    <button type="submit" name="verificar_ci">Verificar</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["verificar_ci"])) {
    $ci = $_POST["ci"];
    if (validarCI($ci)) {
        echo "<p>La cédula $ci es válida.</p>";
    } else {
        echo "<p>La cédula $ci no es válida.</p>";
    }
}
?>
<?php include("footer.php"); ?>
