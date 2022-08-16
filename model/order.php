<?php
$query ="SELECT orders.*, customers.*, payments.payment_status 
         FROM orders, customers, payments
         Where orders.customer_id = customers.customer_id 
         AND customers.customer_id = payments.customer_id 
         ORDER BY order_id DESC";

         $result3 = $conn->query($query);
         $orders_count = mysqli_num_rows( $result3 );
         $orders = mysqli_fetch_all($result3, MYSQLI_ASSOC);

     
      
      
                      
          // if(unlink($fetchRecords['image_path']))
          // {
          //   $liveSqlQQ = "DELETE from category where category_id = $id";
          //   $rsDelete = mysqli_query($conn, $liveSqlQQ);	
            
          //   if($rsDelete)
          //   {
          //       echo "Record deleted successfully";
          //             header("Location: ../admin/category.php");
          //     //exit();
          //   }else
          //     {
          //   $displayErrMessage = "Sorry, Unable to delete Image";
          //     }
         
          //     }else{
          //         echo "No Image";
          // }
         
          
      
    
?>