<?php
include '../config/dbConfig.php';  
include '../partials/header.php';  
include '../partials/navigation.php';  

$staff = $conn->prepare("SELECT 
s.staff_firstname,
s.staff_surname,
s.staff_shift
FROM `order` o
LEFT JOIN staff s ON o.fk_staff_id = s.staff_id
GROUP BY s.staff_id, s.staff_firstname, s.staff_surname, s.staff_shift;
");

$staff->execute();
$staff->store_result();
$staff->bind_result($firstName, $surname, $shift);
?>

<style>
  /* Adjustments for fixed navigation */
  .content-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 70px; /* Height of the navigation bar */
  }

  .table-container {
    width: 90%; /* Adjust as needed */
    overflow-x: auto;
    margin-top: 20px; /* Added margin-top */
  }
</style>

<div class="content-wrapper">
  <div class="table-container">
    <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-lg" style="max-height: 800px;">
      <table class="min-w-full">
        <thead>
          <tr>
            <th class="w-1/3 px-4 py-4 border-b-2 border-gray-300 text-left leading-4 text-black text-lg font-bold tracking-wider">Firstname</th>
            <th class="w-1/3 px-4 py-4 border-b-2 border-gray-300 text-left leading-4 text-black text-lg font-bold tracking-wider">Surname</th>
            <th class="w-1/3 px-4 py-4 border-b-2 border-gray-300 text-left leading-4 text-black text-lg font-bold tracking-wider">Shift</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <?php while ($staff->fetch()): ?>
            <tr class="border-b border-gray-300">
              <td class="w-1/3 px-4 py-4 text-left leading-4 text-gray-900 text-lg font-medium"><?php echo htmlspecialchars($firstName); ?></td>
              <td class="w-1/3 px-4 py-4 text-left leading-4 text-gray-900 text-lg font-medium"><?php echo htmlspecialchars($surname); ?></td>
              <td class="w-1/3 px-4 py-4 text-left leading-4 text-gray-900 text-lg font-medium"><?php echo htmlspecialchars($shift); ?></td>
            </tr>
            <tr class="h-4"></tr> <!-- Adding spacing between rows -->
          <?php endwhile ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
$staff->close();
$conn->close(); 
include '../partials/footer.php';  
?>
