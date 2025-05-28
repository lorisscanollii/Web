// script.js

document.addEventListener('DOMContentLoaded', function () {
    // Confirm deletion with custom prompt (alternative to inline confirm in HTML)
    const deleteLinks = document.querySelectorAll('a[href*="delete_product.php"]');

    deleteLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            const confirmed = confirm('Are you sure you want to delete this product?');
            if (!confirmed) {
                event.preventDefault();
            }
        });
    });

    // Example of dynamic alert
    const alertBox = document.querySelector('.alert');
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 3000); // hide after 3 seconds
    }
});
