<?php

// This is page calls DB changes of Admin Status from AdminStatus.php

require('../Config/db.php');

$sql=mysqli_query($mysqli, "UPDATE users SET admin='".$_POST['val']."' WHERE id='".$_POST['id']."'");

if($sql)
{
    $q=mysqli_query(mysqli, "SELECT * FROM users WHERE id='".$_POST['id']."' ");
    $data=mysqli_fetch_assoc($sql);
    echo $data['$admin'];
}

?>