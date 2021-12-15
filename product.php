<?php
require "class/product.class.php";

$product = new Product();
$result = $product->getProducts();

exit(json_encode($result));