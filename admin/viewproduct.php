<?php
require "sidebar.php";?>
<div class="container mx-auto mb-2">
<h1>VIEW PRODUCTS</h1></div>
<div class="container">

<table id="dtBasicExample" class="table" width="100%">
  <thead>
   
      <th class="th-sm">Product name
      </th>
      <th class="th-sm">Product Category
      </th>
      <th class="th-sm">Link
      </th>
      <th class="th-sm">Availability
      </th>
      <th class="th-sm">Launch Date-time
      </th>
      <th class="th-sm">monthly charges</th>
      <th class="th-sm">yearly charges</th>
      <th class="th-sm">description</th>
	  <th class="th-sm">Action
      </th>
    </tr>
  </thead>
  <tbody>
  <?php
  require_once('../ProductClass.php');
  $product=new Products();
  $sql=$product->showpro_details();
  while($rows=mysqli_fetch_assoc($sql)){
   echo "<tr>";
   echo "<td>".$rows['prod_name']."</td>";
	  echo "<td>";
	  $s=$product->name($rows['prod_parent_id']);
	  echo $s['prod_name'];
	  echo "</td>";
	  
      echo "<td>".$rows['html']."</td>";
      $desc=json_decode($rows['description']);
	  echo "<td>";
	  if($rows['prod_available']==1){echo "available";}else{echo "not available";}
	  echo "</td>";
      echo "<td>".$rows['prod_launch_date']."</td>";
      echo "<td>".$rows['mon_price']."</td>";
      echo "<td>".$rows['annual_price']."</td>";
      echo "<td>";
      echo "<ul>";
      echo "<li> webspace : $desc->webspace";
      echo "<li> bandwidth : $desc->bandwidth";
      echo "<li> free domain : $desc->free_domain";
      echo "<li> support : $desc->support";
      echo "<li> mailbox : $desc->mailbox";
      echo "</ul>";
      echo "</td>";
	  echo "<td><a href='editproduct.php?id=".$rows['id']."' ><img src='edit.png'> </a>";
	  echo " <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='deleteproduct.php?id=".$rows['prod_id']."' > <img src='delete.png'></a></td>";
	echo "</tr>";
  }
    ?>
  </tbody>
<!--   <tfoot>
  <th class="th-sm">Category
      </th>
      <th class="th-sm">Sub Category
      </th>
      <th class="th-sm">Link
      </th>
      <th class="th-sm">Availability
      </th>
      <th class="th-sm">Launch Date-time
      </th>
      <th class="th-sm">monthly charges</th>
      <th class="th-sm">yearly charges</th>
      <th class="th-sm">description</th>
      <th class="th-sm">actions</td>
    </tr>
  </tfoot> -->
</table>

</div>

<?php require "footer.php"; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
  $('#dtBasicExample').dataTable();
});
  </script>
require "footer.php";
?>