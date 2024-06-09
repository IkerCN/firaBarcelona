document.addEventListener("DOMContentLoaded", function() {
    var checkboxes = document.querySelectorAll('input[name="categories[]"]');
    var storedCategories = JSON.parse(localStorage.getItem('selectedCategories')) || [];

    // Set initial state
    storedCategories.forEach(function(category) {
        var checkbox = document.querySelector('input[name="categories[]"][value="' + category + '"]');
        if (checkbox) checkbox.checked = true;
    });

    // Add event listeners
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', updateFilters);
    });

    // Initial filter application
    updateFilters();
});

function updateFilters() {
    var selectedCategories = Array.from(document.querySelectorAll('input[name="categories[]"]:checked')).map(checkbox => checkbox.value);
    localStorage.setItem('selectedCategories', JSON.stringify(selectedCategories));

    var products = document.querySelectorAll('.product');
    products.forEach(product => {
        var categoryId = product.classList[3];
        var categoryName = product.querySelector('.category-name');

        var isVisible = selectedCategories.length === 0 || selectedCategories.includes(categoryId);
        product.style.display = isVisible ? 'block' : 'none';
        if (categoryName) categoryName.style.display = isVisible ? 'block' : 'none';
    });
}
