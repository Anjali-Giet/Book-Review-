<?php
include 'db.php';

$book_title = $_POST['book_title'];
$book_author = $_POST['book_author'];
$rating = $_POST['rating'];
$review = $_POST['review'];

// Prepare and execute the SQL statement to insert the book
$stmt = $conn->prepare("INSERT INTO books (title, author) VALUES (?, ?)");
$stmt->bind_param("ss", $book_title, $book_author);

if ($stmt->execute()) {
    $book_id = $conn->insert_id;
    $stmt->close();

    // Verify the user_id exists
    $user_id = 1; // Adjust as necessary for your application
    $user_check_stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $user_check_stmt->bind_param("i", $user_id);
    $user_check_stmt->execute();
    $user_check_stmt->store_result();

    if ($user_check_stmt->num_rows > 0) {
        $user_check_stmt->close();

        // Prepare and execute the SQL statement to insert the review
        $stmt = $conn->prepare("INSERT INTO reviews (user_id, book_id, rating, review) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiis", $user_id, $book_id, $rating, $review);

        if ($stmt->execute()) {
            echo "New review created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: user_id $user_id does not exist.";
    }
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
