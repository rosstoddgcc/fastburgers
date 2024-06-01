<?php
include 'config/dbConfig.php';
include 'partials/header.php';
include 'partials/navigation.php';
?>
<!-- component -->
<div class="relative bg-yellow-50 min-h-screen flex flex-col justify-center"> <!-- Adjusted to flex layout -->
    <div class="container mx-auto px-6 pt-20 md:pt-32 md:px-12 lg:px-7"> <!-- Adjusted padding top -->
        <div class="flex flex-col md:flex-row items-center justify-center md:justify-between md:gap-12"> <!-- Adjusted alignment -->
            <div class="lg:w-6/12 lg:py-24 xl:py-32 text-center md:text-left md:w-full"> <!-- Adjusted width and text alignment -->
                <h1 class="font-bold text-4xl text-yellow-900 md:text-5xl lg:w-10/12">
                    <span style="color: black;">Management</span><br>Order System
                </h1>
                <form action="" class="w-full mt-8 md:w-auto"> <!-- Adjusted form width -->
                    <div class="relative flex p-1 rounded-full bg-white border border-yellow-200 shadow-md md:p-2">
                        <select class="hidden p-3 rounded-full bg-transparent md:block md:p-4" name="domain" id="domain">
                            <option value="" selected>Please select an option.....</option>
                            <option value="customerorders">Customer orders</option>
                            <option value="stafforders">Display the member of staff that took the most orders</option>
                            <option value="mostpopularitem">Display the most popular item</option>
                            <option value="staffshifts">Staff Shifts</option>
                        </select>
                        <button type="button" id="searchButton" title="Search Database" class="ml-auto py-3 px-6 rounded-full text-center transition bg-gradient-to-b from-yellow-200 to-yellow-300 hover:to-red-300 active:from-yellow-400 focus:from-red-400 md:px-12">
                            <span class="hidden text-yellow-900 font-semibold md:block">
                                Search
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto text-yellow-900 md:hidden" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </form>
                <h1 class="font-bold text-4xl text-yellow-900 md:text-5xl lg:w-10/12 mt-8">
                    <span>Select Query</span>
                </h1>
            </div>
            <div class="mt-8 md:mt-0 lg:w-6/12"> <!-- Adjusted margin top -->
                <img src="https://tailus.io/sources/blocks/food-delivery/preview/images/food.webp" class="relative" alt="food illustration" loading="lazy" width="4500" height="4500">
            </div>
        </div>
    </div>
</div>

<?php
include 'partials/footer.php';
?>
<!-- JavaScript to handle the redirection -->
<script>
document.getElementById('searchButton').addEventListener('click', function() {
    var selectedValue = document.getElementById('domain').value;
    var url;

    switch (selectedValue) {
        case 'customerorders':
            url = 'pages/customerorders.php';
            break;
        case 'stafforders':
            url = 'pages/stafforders.php';
            break;
            case 'mostpopularitem':
            url = 'pages/mostpopularitem.php';
            break;
        case 'staffshifts':
            url = 'pages/staffshifts.php';
            break;
        default:
            url = 'index.php'; // Default page if no match is found
    }

    // Redirect to the selected URL
    window.location.href = url;
});
</script>
