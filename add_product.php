<!-- หน้า add_product.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
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
    <h1 class='text-center text-2xl p-10'>Add <span class='bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-transparent bg-clip-text'>product</span></h1>

    <?php
    include 'db_connection.php'; // เชื่อมต่อฐานข้อมูล

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];

        $sql = "INSERT INTO products (product_name, product_price) VALUES ('$productName', $productPrice)";

        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully ";
            echo "<script>window.location.href = 'index.php';</script>"; // Redirect ไปยัง index.php
        } else {
            echo "Failed to add product : " . $conn->error;
        }
    }
    ?>

    <!-- แบบฟอร์ม HTML -->
    <form method="post" action="add_product.php">
        <div class='flex justify-center py-10'>
            <div>
                Product name : <input type="text" name="productName" required class='border rounded-md'>
                <br>
                <br>
                price : <input type="number" name="productPrice" required class='border rounded-md pr-2'>
            </div>
        </div>
        <div class='flex justify-center'>
            <input type="submit" value="Add product" class='bg-rose-500 rounded-full px-5 py-2 text-white hover:bg-rose-600 transition'>
        </div>
    </form>
    <div class='flex justify-center p-5 underline'>
        <a href="./index.php" class='transition'>
            Back Home
        </a>
    </div>
</body>
</html>
