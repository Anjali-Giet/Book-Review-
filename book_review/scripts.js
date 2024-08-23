document.addEventListener("DOMContentLoaded", function() {
    fetch('get_reviews.php')
        .then(response => response.json())
        .then(data => {
            let reviewsDiv = document.getElementById('reviews');
            data.forEach(review => {
                let reviewElement = document.createElement('div');
                reviewElement.innerHTML = `<h3>${review.title} by ${review.author}</h3>
                                           <p>Rating: ${review.rating}</p>
                                           <p>${review.review}</p>`;
                reviewsDiv.appendChild(reviewElement);
            });
        });
});
