<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <h1>Submit a Book Review</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="submit_review.php">Submit Review</a></li>
                <li><a href="reviews.php">View Reviews</a></li>
            </ul>
        </nav>
    </header>
    <form action="submit_review.php" method="post">
        <input type="text" name="book_title" placeholder="Book Title" required>
        <input type="text" name="book_author" placeholder="Book Author" required>
        <input type="number" name="rating" min="1" max="5" placeholder="Rating (1-5)" required>
        <textarea name="review" placeholder="Write your review here" required></textarea>
        <button type="submit">Submit Review</button>
    </form>
</body>
</html>
