<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Review Platform</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Book Review Platform</h1>
    <div id="reviews"></div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('get_reviews.php')
            .then(response => response.json())
            .then(data => {
                console.log('Fetched data:', data);  // Debugging line
                let reviewsDiv = document.getElementById('reviews');
                data.forEach(review => {
                    let reviewElement = document.createElement('div');
                    reviewElement.innerHTML = `<h3>${review.title} by ${review.author}</h3>
                                               <p>Rating: ${review.rating}</p>
                                               <p>${review.review}</p>`;
                    reviewsDiv.appendChild(reviewElement);
                });
            })
            .catch(error => console.error('Error fetching reviews:', error));
    });
    </script>
</body>
</html>
