<?php
include 'db_connection.php'; // ไฟล์เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // สำหรับการแก้ไขสินค้า
    if (isset($_POST['editProduct'])) {
        $productId = $_POST['productId'];
        $newProductName = $_POST['newProductName'];
        $newProductPrice = $_POST['newProductPrice'];

        $sql = "UPDATE products SET product_name='$newProductName', product_price=$newProductPrice WHERE product_id=$productId";

        if ($conn->query($sql) === TRUE) {
            echo "แก้ไขสินค้าเรียบร้อยแล้ว";
        } else {
            echo "การแก้ไขสินค้าล้มเหลว: " . $conn->error;
        }
    }

    // สำหรับการลบสินค้า
    if (isset($_POST['deleteProduct'])) {
        $productId = $_POST['productId'];

        $sql = "DELETE FROM products WHERE product_id=$productId";

        if ($conn->query($sql) === TRUE) {
            echo "ลบสินค้าเรียบร้อยแล้ว";
        } else {
            echo "การลบสินค้าล้มเหลว: " . $conn->error;
        }
    }
}
?>
<!-- แบบฟอร์ม HTML สำหรับแก้ไขและลบสินค้า -->
<form method="post" action="edit_delete_product.php">
    ID สินค้าที่ต้องการแก้ไข: <input type="number" name="productId" required><br>
    ชื่อสินค้าใหม่ (สำหรับแก้ไข): <input type="text" name="newProductName"><br>
    ราคาใหม่ (สำหรับแก้ไข): <input type="number" name="newProductPrice"><br>
    <input type="submit" name="editProduct" value="แก้ไขสินค้า">
    <input type="submit" name="deleteProduct" value="ลบสินค้า">
</form>
