<?php
$Nombre=$_POST["n"];
$Detalle=$_POST["d"];
$Precio=$_POST["p"];
$Stock=$_POST["s"];
$Categoria=$_POST["c"];

$tamanoArchivo = $_FILES['f']['size'];

$imagenSubida = fopen($_FILES['f']['tmp_name'], 'r');
$binariosImagen = fread($imagenSubida, $tamanoArchivo);

/*$imagen=$_FILES['f'];*/
include_once '../Controladores/conexion.php';
$date=new Conexion();
$conexion=$date->Conectar();
$final=$conexion->quote($binariosImagen);


include_once '../Controladores/CRUDProductos.php';

$producto = new CRUDProductos();
$agregar = $producto->Agregar($Nombre,$Detalle,$binariosImagen,$Categoria,$Stock,$Precio);
if ($agregar) {
    echo 1;
}
else{
    echo 0;
}
?>