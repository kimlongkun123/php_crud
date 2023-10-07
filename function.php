
<?php 

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "php_2_5";
    $connection = new mysqli($hostname,$username,$password,$database);
    // if($connection == true){
    //     echo "Success";
    // }

    function Insert(){
        global $connection;
        if(isset($_POST['btn-buy'])){
            // echo 123;
            $title = $_POST['title'];
            $qty   = $_POST['qty'];
            $price = $_POST['price'];
            $dis   = $_POST['discount'];

            // echo $title.$qty.$price.$dis;

            if(!empty($title) && !empty($qty) && !empty($price)){
                $total = $qty * $price;
                $payment = $total -  ($total * $dis/100);

                $sql = "INSERT INTO `tbl_product` (`title`,`qty`,`price`,`total`,`discount`,`payment`) VALUES('$title','$qty','$price','$total','$dis','$payment')";

                $result = $connection->query($sql);
                if($result){
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal("Success", "Data Insert Success", "success")
                            });
                        </script>
                    ';
                }

            }
            else{
                echo '
                <script>
                    $(document).ready(function(){
                        swal("Error", "Data Can not Insert", "error")
                    });
                </script>
            ';
            }
        }
    }
    Insert();

    function GetData(){
        global $connection;
        $sql = "SELECT * FROM `tbl_product`";
        $result = $connection->query($sql);
        while($row  = mysqli_fetch_assoc($result)){
            echo '
            <tr>
                <td>'.$row['code'].'</td>
                <td>'.$row['title'].'</td>
                <td>'.$row['qty'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['discount'].'</td>
                <td>'.$row['total'].'</td>
                <td>'.$row['payment'].'</td>
                <td>
                    <button class="btn btn-warning" id="btn-open-update" data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        ';
        }
    }
    

?>