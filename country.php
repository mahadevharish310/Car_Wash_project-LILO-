




<?php include("connect.php");?>

<!doctype html>
<html>
<head><script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
<div class="">
    <label>Country :</label>
    <select name="country" id="country">
      <option value=''>------- Select --------</option>
      <?php 
      $sql = "select * from country.countries";
      $res = mysqli_query($conn, $sql);
      if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_object($res)) {
          echo "<option value='".$row->id."'>".$row->country."</option>";
        }
      }
      ?>
    </select>
    
    <label>State :</label>
    <select name="state" id="state"><option>------- Select --------</option></select>
</div>
</body>
</html>