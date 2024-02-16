document.addEventListener("DOMContentLoaded", function () {
    // Retrieve stored categories from localStorage
    var storedCategories = JSON.parse(localStorage.getItem('selectedCategories')) || [];

    // Set the initial state of checkboxes based on localStorage
    storedCategories.forEach(function (category) {
        var checkbox = document.querySelector('input[name="categories[]"][value="' + category + '"]');
        if (checkbox) {
            checkbox.checked = true;
        }
    });

    // Attach an event listener to checkboxes
    var checkboxes = document.querySelectorAll('input[name="categories[]"]');
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            // Update stored categories in localStorage
            var selectedCategories = Array.from(document.querySelectorAll('input[name="categories[]"]:checked')).map(checkbox => checkbox.value);
            localStorage.setItem('selectedCategories', JSON.stringify(selectedCategories));

            // Show/hide products and category names based on selected categories
            var products = document.querySelectorAll('.product');
            products.forEach(product => {
                var categoryId = product.classList[3]; // Assuming the class containing the category name is the fourth class
                var categoryName = product.querySelector('.category-name'); // Assuming the category name is inside an element with class 'category-name'

                if (selectedCategories.length === 0 || selectedCategories.includes(categoryId)) {
                    product.style.display = 'block';
                    if (categoryName) {
                        categoryName.style.display = 'block';
                    }
                } else {
                    product.style.display = 'none';
                    if (categoryName) {
                        categoryName.style.display = 'none';
                    }
                }
            });
        });
    });
});
