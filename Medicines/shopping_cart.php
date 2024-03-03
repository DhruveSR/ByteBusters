<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- //<link rel="stylesheet" href="shopping.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../table.css?<?php echo time(); ?>" />
</head>
<body>
<?php
    include_once('db_medicines.php');
    
    $sql = "SELECT * FROM shopping_cart";

    $result = $con->query($sql);

?>
<table>
	<tr>
	<th>SNo</th>
	<th>Name</th>
	<th>Packet</th>
	<th>No of reviews</th>
	<th>Rating</th>
	<th>Price</th>
    <th>No of Pieces</th>
    <th>Action</th>
	</tr>
	<?php
    $i = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="<?php if(isset($classname)) echo $classname;?>">
            <td><?php echo $i+1; ?></td>
            <td><?php echo $row["Name"]; ?></td>
            <td><?php echo $row["Packet"]; ?></td>
            <td><?php echo $row["No_of_rating"]; ?></td>
            <td><?php echo $row["Rating"]; ?></td>
            <td><?php echo $row["Price"]; ?></td>
            <td><?php echo $row["No_of_pieces"]; ?></td>
            <td><a href="delete_from_cart.php?medi_id=<?php echo $row["Medicine_ID"]; ?>">Delete</a></td>
            </tr>
            <?php
            $i++;
        }
    }
    $con->close();
?>
</table>
<a href=#>Buy</a>
</body>
</html>