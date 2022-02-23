<?php 
    function displayItem(Item $product) {
        return '<div class="card_' . $product->getName() . ' card_fruit">
                    <div class="fruit_name">' . $product->getName() . '</div>
                    <div class="fruit_price">' . $product->getPrice() . ' </div>
                    <img class="fruit_picture" src=' . $product->getImageUrl() . ' alt="' . $product->getName() . '_picture">  
                    <form method="POST" action=".\cart.php">
                        <input type="hidden" name="selectedFruit" value=' . $product->getName() . '>
                        Quantity : <input type="number" min="1" name="quantity" size="6" required>
                        <button type="submit"> ADD TO BAG</button>
                    </form>
                </div>';
    }

    function displayCatalog(Catalog $catalog) {
        foreach ($catalog->getItems() as $fruit) {
            $item = new Item();
            $item->setName($fruit["name"]);
            $item->setPrice($item->formatPrice($fruit["price"]));
            $item->setImageUrl($fruit["picture_url"]);
            echo displayItem($item);
        }
    }
?>