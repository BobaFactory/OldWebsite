<?php
	ini_set('display_errors', 1);
  session_start();
  $orders = (($_SESSION["cart"]));
  $descriptions = array('Black Milk Tea', 'Green Milk Tea', 'Chocolate Milk Tea', 'Coffee Milk Tea', 'Jasmine Milk Tea', 'Cantalope Milk Tea');
  for ($i=0; $i < 6; $i++) { 
     if($orders[$i] > 0) 
     {
      $total_orders = $total_orders + $orders[$i];
      }
    }
  $price = 3.50;
  $total_price = $total_orders * $price;
  $tax_rate = .0825;
  $tax = $total_price * $tax_rate;
  $final_price = $total_price + $tax;


  echo "<table class='order_summary'>";
    echo "<thead class='order_summary'>";
      echo "<td colspan='2'>Items</td>";
      echo '<td>Price</td>';
    echo '</thead>';
    echo "<tr><td colspan='3'><hr></td></tr>";
  // echo '<tr><br></tr>';
  
  for ($i=0; $i < 6; $i++) { 
  	if($orders[$i] != "0" && $orders[$i] > 0)
  	{
      $type_price = $orders[$i] * $price;
      echo "<tr class='order_summary'><td>".$orders[$i]."</td><td>".$descriptions[$i]."</td><td>$".number_format((float)$type_price, 2, '.', '')."</td></tr>";
  	}
  }
  echo "<tr><td colspan='3'><hr></td></tr>";
  echo "<tr class='order_summary'><td colspan='2'>Sub-Total</td><td>$".number_format((float)$total_price, 2, '.', '')."</td></tr>";
  echo "<tr class='order_summary'><td colspan='2'>Sales Tax</td><td>$".number_format((float)$tax, 2, '.', '')."</td></tr>";
  echo "<tr><td colspan='3'><hr></td></tr>";
  echo "<tr class='order_summary total'><td colspan='2'>Total</td><td><strong>$".number_format((float)$final_price, 2, '.', '')."</strong></td></tr>";
  echo '</table>';

?>

<input type="button" name="back" onclick="window.location.href = 'https://fall-2019.cs.utexas.edu/cs329e-mitra/boba/order.php';" value="Edit Order" >