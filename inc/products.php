<?php

/*
 * Returns a the full list of products
 * @return   array           the full list of products in the products table
 */
function get_products_all(){

    require(ROOT_PATH . "inc/database.php");


    try{
        $result = $db->query("SELECT sku, name, img, price, paypal FROM products ORDER BY sku");
    } catch (Exception $e){
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $products = $result->fetchAll(PDO::FETCH_ASSOC);
    return $products;

}

/*
 * Returns a specific product based on the value of the product_id passed in
 * @param    int             the product_id of the specific shirt we are trying to retrieve
 * @return   array           the array of values including size of the product retrieved
 */

function get_products($product_id){
    require(ROOT_PATH . "inc/database.php");

    try{
        $result = $db->prepare("SELECT sku, name, img, price, paypal FROM products WHERE sku = ?");
        $result->bindParam(1, $product_id);
        $result->execute();
    } catch (Exception $e){
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $product = $result->fetch(PDO::FETCH_ASSOC);

    //if the product doesnt exist, we return false
    if ($product == false) return $product;

    try{
        $result = $db->prepare("SELECT size FROM products_sizes INNER JOIN sizes ON products_sizes.size_id = sizes.id WHERE product_sku = ?");
        $result->bindParam(1, $product_id);
        $result->execute();
    } catch (Exception $e){
        echo "Data could not be retrieved from the database.";
        exit;
    }

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $product["sizes"][] = $row["size"];
    }    

    return $product;
}

/*
 * Returns the number of items in the products table
 * @return   int          the number of items in the product table
 */
function get_products_count(){
    require(ROOT_PATH . "inc/database.php");

    try{
        $result = $db->query("SELECT COUNT(sku) FROM products");
    } catch (Exception $e){
        echo "Data could not be retrieved from the database.";
        exit;
    }

    return intval($result->fetchColumn(0));

}

/*
 * Returns a specified subset of products, based on the values received,
 * using the order of the elements in the array .
 * @param    int             the position of the first product in the requested subset 
 * @param    int             the position of the last product in the requested subset 
 * @return   array           the list of products that correspond to the start and end positions
 */
function get_products_subset($positionStart, $positionEnd) {

    $offset = $positionStart - 1;
    $rows = $positionEnd - $positionStart + 1;

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->prepare("SELECT name, price, img, sku, paypal FROM products ORDER BY sku LIMIT ?, ?");
        $results->bindParam(1,$offset,PDO::PARAM_INT);
        $results->bindParam(2,$rows,PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $subset = $results->fetchAll(PDO::FETCH_ASSOC);

    return $subset;
}

/*
 * Returns a specified subset of products (the 4 latest shirts)
 * @return   array           the list of products that are contain the greatest sku
 */

function get_recent_shirts(){

    require(ROOT_PATH . "inc/database.php");


    try{
        $result = $db->query("SELECT sku, name, img, price, paypal FROM products ORDER BY sku DESC LIMIT 4");
    } catch (Exception $e){
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $products = $result->fetchAll(PDO::FETCH_ASSOC);
    return $products;

}

/*
 * Returns a specified subset of products, based on the search_term value recieved
 * @param    search_term     the search string entered by the user
 * @return   array           the list of products that correspond to the start and end positions
 */
function get_products_search($search_term){
    require(ROOT_PATH . "inc/database.php");

    try{
        $result = $db->prepare("SELECT sku, name, img, price, paypal FROM products WHERE name LIKE ?");
        $result->bindValue(1, '%' . $search_term . '%');
        $result->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $products = $result->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

?>