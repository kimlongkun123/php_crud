<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php

    include ("function.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container-fluid p-5 bg-dark">
        <h1 class="text-center text-light">Product Data</h1>
        <!-- Button trigger modal -->
        <button type="button" id="btn-open-add" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Add Product
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input type="hidden" name="code" id="code">
                            <label for="">Title:</label>
                            <input type="text" name="title" id="title" class="form-control my-2" placeholder="Title:">
                            <label for="">Qty:</label>
                            <input type="number" name="qty" id="qty" class="form-control my-2" placeholder="Qty:">
                            <label for="">Price:</label>
                            <input type="text" name="price" id="price" class="form-control my-2" placeholder="Price:">
                            <label for="">Discount:</label>
                            <select name="discount" id="discount" class="form-select my-2">
                                <option value="0">0%</option>
                                <option value="5">5%</option>
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                            </select>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="Submit" name="btn-buy" id="buy" class="btn btn-primary">Buy</button>
                                <button type="Submit" name="btn-update" id="update" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Delete -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <h3>Are you sure you want to delete? </h3>
            <input type="text" name="del_code" id="del_code">
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                <button type="submit" name="btn-delete" class="btn btn-danger">Yes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


    <table class="table table-hover table-dark text-center">
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Total</th>
            <th>Payment</th>
            <th>Action</th>
        </tr>
        <?php GetData(); ?>
    </table>
</body>
<!-- <script src="script.js"></script> -->
<script>
    $(document).ready(function(){//syntax jquery
    // alert(123);
        $("#btn-open-add").click(function(){
            // alert(123);
            $('#update').hide();//display none
            $('#buy').show();// display block

            $('#code').val('');
            $('#title').val('');
            $('#qty').val('');
            $('#price').val('');
            $('#discount').val(0);
        });


        $('body').on('click','#btn-open-update',function(){
            // alert(123);
            $('#update').show();
            $('#buy').hide();
            var code  = $(this).parents('tr').find('td').eq(0).text();
            var title = $(this).parents('tr').find('td').eq(1).text();
            var qty   = $(this).parents('tr').find('td').eq(2).text();
            var price = $(this).parents('tr').find('td').eq(3).text();
            var dis   = $(this).parents('tr').find('td').eq(4).text();

            // alert(code+title+qty+price+dis);
            $('#code').val(code);
            $('#title').val(title);
            $('#qty').val(qty);
            $('#price').val(price);
            $('#discount').val(dis);
        });

        $('body').on('click','#btn-open-delete',function(){
            var code  = $(this).parents('tr').find('td').eq(0).text();
            $('#del_code').val(code);
        })  

    });
</script>
</html>