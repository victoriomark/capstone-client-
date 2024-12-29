<?php

namespace models;
require_once '../config/Connection.php';
class product extends \config\Connection
{
    public function store(string $productName, float $productPrice, string $productImage, string $category,string $description): void {
        // Prepare the SQL query
        $query = "INSERT INTO product (ProductName, Price, ProductImage, ProductCategory,description) VALUES (?, ?, ?, ?,?)";
        $connection = $this->Connect();
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sdsss", $productName, $productPrice, $productImage, $category,$description);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Product added successfully!']);
        }

    }

    public function showAllProducts(string $status): array
    {
        $conn = $this->Connect();

        $query = "SELECT ProductId, ProductImage, ProductName, ProductCategory, Price,description FROM product WHERE status = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        $stmt->close();
        return [];
    }

    public function showAllBaseOnCategoryAndStatus(string $status,string $category): array
    {
        $conn = $this->Connect();

        $query = "SELECT ProductId, ProductImage, ProductName, ProductCategory, Price,description FROM product WHERE status = ? AND ProductCategory = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $status,$category);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        $stmt->close();
        return [];
    }


    public function showBaseOnId($id):array
    {
        $conn = $this->Connect();
        $query = "SELECT * FROM product WHERE ProductId = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()){
           $data[] = $row;
        }
        $stmt->close();
        return $data;
    }

}






