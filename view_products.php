<?php
include 'db_connection.php'; // ไฟล์เชื่อมต่อฐานข้อมูล

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["product_id"] . " - Product name : " . $row["product_name"] . " price : " . $row["product_price"] . "<br>";
    }
} else {
    echo "ไม่พบสินค้า";
}
?>
