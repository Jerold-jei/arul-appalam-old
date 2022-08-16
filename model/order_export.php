<?php 
// Load the database configuration file 
include_once '../db/config.php';
include_once '../model/order.php';
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "order-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('S NO', 'PRODUCT NAME', 'CATEGORY NAME', 'PRICE', 'QUANTITY', 'ORDER STATUS'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 


// Fetch records from database 
$query = $conn->query("SELECT * FROM orders ORDER BY order_id DESC"); 
if($query->num_rows > 0){ 
    $count = 1;
    // Output each row of the data 
    while($row = $query->fetch_assoc()){          
        $lineData = array($count, $row['product_name'], $row['category_name'], $row['price'], $row['quantity'], $row['status']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
        $count = $count + 1;
    } 
    
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;

?>