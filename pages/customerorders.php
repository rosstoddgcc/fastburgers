<?php
include '../config/dbConfig.php';  
include '../partials/header.php';  
include '../partials/navigation.php';  

// Prepare and execute the SQL query
$orders = $conn->prepare("SELECT
o.order_id,
c.customer_name
FROM `order` o
INNER JOIN customer c ON o.fk_customer_id = c.customer_id
ORDER BY o.order_id ASC;
");

$orders->execute();
$orders->store_result();
$orders->bind_result($order_id, $customer_name);

?>

<!-- component -->
<div class="flex justify-center">
    <div class="w-6/12">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
            <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
                <div class="flex justify-between">
                    <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                        <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                            <div class="flex">
                                <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                    <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
            <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="w-1/6 px-6 py-4 border-b-2 border-gray-300 text-left leading-4 text-black text-lg tracking-wider">ID</th>
                            <th class="w-3/6 px-6 py-1 border-b-2 border-gray-300 text-left leading-4 text-black text-lg tracking-wider">Name</th>
                            <th class="w-1/6 px-3 py-1 border-b-2 border-gray-300 text-left leading-4 text-black text-lg tracking-wider">Order Details</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                    <?php while ($orders->fetch()): ?>
                        <tr class="border-b border-gray-300">
                            <td class="w-1/6 px-6 py-5 text-left leading-4 text-gray-900 text-lg font-medium"><?php echo htmlspecialchars($order_id); ?></td>
                            <td class="w-3/6 px-6 py-5 text-left leading-4 text-gray-900 text-lg font-medium"><?php echo htmlspecialchars($customer_name); ?></td>
                            <td class="w-1/6 px-3 py-5 text-left leading-4 text-gray-900">
                            <a href="orderdetails.php?order_id=<?php echo htmlspecialchars($order_id); ?>" class="bg-yellow-200 hover:bg-yellow-300 text-black font-bold py-2 px-4 rounded">
                                Order Details
                            </a>
                            </td>
                        </tr>
                        <tr class="h-4"></tr> <!-- Adding spacing between rows -->
                    <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
$orders->close();
$conn->close(); 
include '../partials/footer.php';  
?>
