<?php
require_once 'models/Product.php';
require_once 'render.php';

class ProductController
{
    public function list()
    {
        // Obtener los productos desde la base de datos
        $products = Product::all();

        // Crear el objeto PhpRenderer
        $renderer = new PhpRenderer();

        // Cargar el contenido del archivo views/products.php
        $content = file_get_contents('views/products.php');

        // Generar el código HTML para la tabla de productos
        $productsTable = '';
        foreach ($products as $product) {
            $productsTable .= '<tr>';
            $productsTable .= '<td>' . $product['id'] . '</td>';
            $productsTable .= '<td>' . $product['description'] . '</td>';
            $productsTable .= '<td>' . $product['stock'] . '</td>';
            $productsTable .= '<td>' . $product['price'] . '</td>';
            $productsTable .= '</tr>';
        }

        // Reemplazar la cadena de texto especial por la tabla de productos
        $content = str_replace('{% PRODUCTS_TABLE %}', $productsTable, $content);

        // Renderizar la vista
        echo $renderer->render($content);
    }
}
