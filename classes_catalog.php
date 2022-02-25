<?php 
    class Item {
        protected string $name;
        protected string $price;
        protected string $imageUrl;
        protected int $weight;
        protected int $discount;
        protected bool $available;
        protected int $quantity;

        public function displayFruitPicture($url, $alt) {
                echo "<img src=${url} alt=${alt}>" ;
        }
        
        public function displayPrice(float $price) {
                echo "<br> <span class='price'> Price : ";
                formatPrice($price);
                echo " £ </span>";
        }

        public function formatPrice($price) {
                return number_format($price, 2, ",", " ") . " $";
        }
        

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        public function getPrice()
        {
                return $this->price;
        }

        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        public function getImageUrl()
        {
                return $this->imageUrl;
        }

        public function setImageUrl($imageUrl)
        {
                $this->imageUrl = $imageUrl;

                return $this;
        }

        public function getWeight()
        {
                return $this->weight;
        }

        public function setWeight($weight)
        {
                $this->weight = $weight;

                return $this;
        }

        public function getDiscount()
        {
                return $this->discount;
        }

        public function setDiscount($discount)
        {
                $this->discount = $discount;

                return $this;
        }

        public function getAvailable()
        {
                return $this->available;
        }

        public function setAvailable($available)
        {
                $this->available = $available;

                return $this;
        }

        public function getQuantity()
        {
                return $this->quantity;
        }

        public function setQuantity($quantity)
        {
                $this->quantity = $quantity;

                return $this;
        }
    }

    class Fruit extends Item {
        protected string $description;

        public function getDescription()
        {
                return $this->description;
        }

        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }
    }
            

    class Catalog {
        protected array $items;
        
        public function __construct($database) {
        $catalogDatasStatement = $database->query(
                "SELECT * FROM products"
        );
        $catalogDatas = $catalogDatasStatement->fetchAll(PDO::FETCH_ASSOC);
        $this->items = $catalogDatas;
        }

        public function getItems()
        {
                return $this->items;
        }
    }
?>