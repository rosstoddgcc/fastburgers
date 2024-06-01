<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';

if (isset($_GET['order_id'])) {
    $oid = htmlspecialchars($_GET['order_id']);
} else {
    die('Order ID not specified.');
}

// Prepare and execute the SQL query for order details
$orderdetails = $conn->prepare("SELECT
    o.order_id,
    o.order_date,
    c.customer_name,
    c.customer_tel,
    st.store_name,
    p.payment_type,
    o.menu_name,
    s.staff_firstname
FROM `order` o
LEFT JOIN customer c ON o.fk_customer_id = c.customer_id
LEFT JOIN menu_type m ON o.fk_menu_type_id = m.menu_type_id
LEFT JOIN payment p ON o.fk_payment_id = p.payment_id
LEFT JOIN staff s ON o.fk_staff_id = s.staff_id
LEFT JOIN store st ON o.fk_store_id = st.store_id
WHERE o.order_id = ?");
$orderdetails->bind_param("i", $oid);
$orderdetails->execute();
$orderdetails->store_result();
$orderdetails->bind_result($oid, $date, $customer, $custTel, $store, $payment_type, $menu, $staff);
$orderdetails->fetch();
$orderdetails->close();

// Prepare and execute the SQL query for order items
$orderitems = $conn->prepare("SELECT
    i.item_name,
    oi.quantity,
    i.item_cost
FROM order_items oi
LEFT JOIN item i ON oi.fk_item_id = i.item_id
WHERE oi.fk_order_id = ?");
$orderitems->bind_param("i", $oid);
$orderitems->execute();
$orderitems->store_result();
$orderitems->bind_result($item_name, $quantity, $item_cost);

?>

<!-- component -->
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col w-1/3 bg-white shadow-lg p-8 rounded-lg">
        <div class="flex flex-col mb-8">
            <h2 class="text-xl font-bold underline mb-4">Customer Details</h2>
            <p><span class="text-slate-600">Customer Name:</span> <?= htmlspecialchars($customer) ?></p>
            <p><span class="text-slate-600">Customer Tel:</span> <?= htmlspecialchars($custTel) ?></p>
        </div>
        <div class="flex flex-col mb-8">
            <h2 class="text-xl font-bold underline mb-4">Order Details</h2>
            <p><span class="text-slate-600">Order Number: </span> <?= htmlspecialchars($oid) ?></p>
            <p><span class="text-slate-600">Order Date: </span> <?= htmlspecialchars($date) ?></p>
            <p><span class="text-slate-600">Payment Type: </span> <?= htmlspecialchars($payment_type) ?></p>
            <p><span class="text-slate-600">Menu Type: </span> <?= htmlspecialchars($menu) ?></p>
        </div>
        <div class="flex flex-col mb-8">
            <h2 class="text-xl font-bold underline mb-4">Items Ordered</h2>
            <?php while ($orderitems->fetch()): ?>
                <?php $total_cost = $item_cost * $quantity;
                $total_cost = number_format($total_cost, 2); // Assuming you want to display 2 decimal places ?>          
                <p><span class="text-slate-600">Item Name:</span> <?= htmlspecialchars($item_name) ?></p>
                <p><span class="text-slate-600">Quantity:</span> <?= htmlspecialchars($quantity) ?></p>
                <p><span class="text-slate-600">Cost per Item:</span> <?= htmlspecialchars($item_cost) ?></p>
                <p><span class="text-slate-600">Total Cost:</span> <?= htmlspecialchars($total_cost) ?></p>
            <?php endwhile; ?>
            <?php $orderitems->close(); ?>
        </div>
        <div class="flex flex-col">
            <h2 class="text-xl font-bold underline mb-4">Store Details</h2>
            <p><span class="text-slate-600">Store Location: </span> <?= htmlspecialchars($store) ?></p>
        </div>
    </div>
</div>

<?php
$conn->close();
include '../partials/footer.php';
?>
