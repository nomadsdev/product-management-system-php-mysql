<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product management system</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <h1 class='text-center text-3xl p-10'>Product management <span class='bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-transparent bg-clip-text'>system</span></h1>

    <?php
    include 'db_connection.php'; // เชื่อมต่อฐานข้อมูล

    // ดึงข้อมูลสินค้าจากฐานข้อมูล
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='flex justify-center pb-10'>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["product_name"] . " - price : $" . $row["product_price"] . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "Product not found";
    }
    ?>

    <div class='flex justify-center'>
        <p><a href="add_product.php" class='bg-rose-500 rounded-full px-5 py-2 text-white hover:bg-rose-600 transition'>Add product</a></p>
    </div>
</body>
</html>
