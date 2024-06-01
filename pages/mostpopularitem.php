<?php
include '../config/dbConfig.php';  // Adjusted path to go up one level
include '../partials/header.php';  // Adjusted path to go up one level
include '../partials/navigation.php';  // Adjusted path to go up one level
?>

<!-- component -->
<div class="relative bg-yellow-50 min-h-screen"> <!-- Ensure it covers the full height of the screen -->
    <div class="container m-auto px-6 pt-32 md:px-12 lg:pt-[4.8rem] lg:px-7">
        <div class="flex items-center flex-wrap px-2 md:px-0">
            <div class="relative lg:w-6/12 lg:py-24 xl:py-32">
                <!-- Empty div preserved for structure -->
            </div>
            <div class="ml-auto -mb-24 lg:-mb-56 lg:w-6/12">
                <img src="https://tailus.io/sources/blocks/food-delivery/preview/images/food.webp" class="relative" alt="food illustration" loading="lazy" width="4500" height="4500">
            </div>
        </div>
    </div>
</div>

<?php
include '../partials/footer.php'; 
?>
