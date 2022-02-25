<?php 
    function displayItem(Fruit $product) {
        return '<div class="card_' . $product->getName() . ' card_fruit">
                    <div class="fruit_name">' . $product->getName() . '</div>
                    <div class="fruit_price">' . $product->getPrice() . ' </div>
                    <img class="fruit_picture" src=' . $product->getImageUrl() . ' alt="' . $product->getName() . '_picture">  
                    <div class="fruit_description">'. $product->getDescription() . '</div>
                    <form method="POST" action=".\cart.php">
                        <input type="hidden" name="selectedFruit" value=' . $product->getName() . '>
                        Quantity : <input type="number" min="1" name="quantity" size="6" required>
                        <button type="submit"> ADD TO BAG</button>
                    </form>
                </div>';
    }

    function displayCatalog(Catalog $catalog) {
        foreach ($catalog->getItems() as $product) {
            $fruit= new Fruit();
            $fruit->setName($product["name"]);
            $fruit->setPrice($fruit->formatPrice($product["price"]));
            $fruit->setImageUrl($product["picture_url"]);
            $fruit->setDescription($product["description"]);
            echo displayItem($fruit);
        }
    }
?>