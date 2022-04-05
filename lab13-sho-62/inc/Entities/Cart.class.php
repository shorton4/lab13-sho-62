<?php

// +----+-----------+-------+
// | id | product   | price |
// +----+-----------+-------+
// |  1 | Product 1 |   1.5 |
// |  2 | Product 2 |     5 |
// |  3 | Product 3 |   7.5 |
// |  4 | Product 4 |  4.43 |
// +----+-----------+-------+

class Cart{

    private int $id = 0;
    private string $product = "";
    private float $price = 0.0;

    //setters
    public function setId(int $nid) { $this->id = $nid; }
    public function setProduct(int $nproduct) { $this->product = $nproduct; }
    public function setPrice(int $nprice) { $this->price = $nprice; }

    //getters
    public function getId() { return $this->id; }
    public function getProduct() { return $this->product; }
    public function getPrice() { return $this->price; }
}

?>