<?php
require 'vendor/autoload.php';
require_once("conexion.php");

use Imagine\Image\Box;
use Imagine\Gd\Font;
use Imagine\Image\Point;
use Imagine\Image\ImageInterface;
use Imagine\Image\Metadata\ExifMetadataReader;

$imagine = new Imagine\Gd\Imagine();
$palette = new Imagine\Image\Palette\RGB();
$conexion = new Conexion();

$consulta = "SELECT id_inventario, silueta, tipo, referencia, descripcion, marca, color, (tallau + talla6 + talla26) AS u_6_26, (tallas + talla8 + talla28) AS s_8_28, (tallam + talla10 + talla30) AS m_10_30, (tallal + talla12 + talla32) AS l_12_32, (tallaxl + talla14 + talla34) AS xl_14_34, (talla16 + talla36) AS t16_26, (talla18 + talla38) AS t18_38, talla20, tallaest,(talla6 + talla8 + talla10 + talla12 + talla14 + talla16 + talla18 + talla20 + talla26 + talla28 + talla30 + talla32 + talla34 + talla36 + talla38 + tallas + tallam + tallal + tallaxl + tallau + tallaest) AS total, precio, precio_mayor, confirma_imagen_subida FROM `inventarios_productos` where estado = 'EXISTENCIA' AND bodega = 'BODEGA CUCUTA'";
$modules = $conexion->query($consulta)->fetchAll();
foreach ($modules as $key){
    //print_r($key); //Confirmacion de traida de datos

    if($key['confirma_imagen_subida'] === 1){
        //print_r($key); //Confirmacion de referencias que tienen imagenes

        if($key['total'] > 3){
            //print_r($key); //Confirmacion de Stock en referencias que sea mayor a 3

            if($key['tipo'] === 'JEANS'){
                //print_r($key); //Confirmacion de tipo de prendas solo jeans

                if($key['marca'] === ''){



                }
            }
        }
    }
}


$options = array(
    'resolution-units' => ImageInterface::RESOLUTION_PIXELSPERINCH,
    'resolution-x' => 1293,
    'resolution-y' => 1953,
    'jpeg_quality' => 30,
);

$image = $imagine->open('233.jpg')
    ->resize(new Box(662, 970));  // Redimencionar imagen
    //->show('jpg')  // Mostrar imagen

// Cuadro blanco en imagen
$image->draw()
    ->rectangle(new Point(40, 920), new Point(360, 870), $image->palette()->color('#FFF'), true);

// Escribir tallas
$image->draw()
    ->text('XL - 12 - 12 - 12 - 12 - 12 - 12 - 12',new Font('Helvetica.ttf',16,$image->palette()->color('#DF589C')), new Point(38, 877));

    
$image->save('image.jpg', $options); // Guardar imagen

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asdat</title>
</head>
<body>
    <img style="" src="2.jpg" alt="">
    <img style="border-width: 1px;border-style: dashed;border-color: black;padding:10px;" src="image.jpg" alt="">
</body>
</html>