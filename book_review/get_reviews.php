<?php
include 'db.php';

$sql = "SELECT b.title, b.author, r.rating, r.review FROM reviews r JOIN books b ON r.book_id = b.id";
$result = $conn->query($sql);

$reviews = [];
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

echo json_encode($reviews);

$conn->close();
?>
