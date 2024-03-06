<!--------------- header-section --------------->
<?php 
include("class.php");
if(isset($_SESSION['userid'])){
    $res= $db->displayCart();
}else{
    ?>
        <script>
            alert("Please Login");
            window.location.href="login.php"
        </script>
    <?php
}
include("header.php"); 
?>
    <!--------------- header-section-end --------------->

    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.php">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Cart</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Cart</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- cart-section---------------->
    <section class="product-cart product footer-padding">
        <div class="container">
            <div class="cart-section">
                <table>
                    <tbody>
                        <tr class="table-row table-top-row">
                            <td class="table-wrapper wrapper-product">
                                <h5 class="table-heading">PRODUCT</h5>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">PRICE</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">QUANTITY</h5>
                                </div>
                            </td>
                            <td class="table-wrapper wrapper-total">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">TOTAL</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">ACTION</h5>
                                </div>
                            </td>
                        </tr>

                        <?php

            if(mysqli_num_rows($res)>0){
                while($row= mysqli_fetch_assoc($res)){
                    $data= mysqli_fetch_assoc($db->viewProducts($row['productid']));
                    ?>
                        <tr class="table-row ticket-row">
                            <td class="table-wrapper wrapper-product">
                                <div class="wrapper">
                                    <div class="wrapper-img">
                                        <img src="admin/<?php echo $data['featuredPhoto'] ?>" alt="img">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading"><?php echo $data['productName']; ?></h5>
                                    </div>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="heading main-price">₹ <?php echo $data['productPrice']; ?></h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <div class="quantity">
                                        <span id="qtyminus<?php echo $data['id'];?>">
                                            -
                                        </span>
                                        <span id="qty<?php echo $data['id'];?>"><?php echo $row['qty']; ?></span>
                                        <span id="qtyplus<?php echo $data['id'];?>">
                                            +
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="table-wrapper wrapper-total">
                                <div class="table-wrapper-center">
                                    <input type="hidden" id="price<?php echo $row['id'];?>" value="<?php echo $data['productPrice'];?>">
                                    

                                    <h5 class="heading total-price" id="total<?php echo $data['id'];?>">
                                    ₹ <?php  echo $data['productPrice']*$row['qty'];?>
                                </h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    
                                    <a class="btn btn-danger" href="function.php?id=<?php echo $row['id']; ?>&cmd=cartDelete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    
                                    <a class="btn btn-warning  m-1" href="#" id="updatecart<?php echo $row['id'];?>"><i class=" fa fa-pencil"></i></a>
                                </div>
                            </td>
                        </tr>

                        
                            <script>
                                $(function(){

                                    var qty= parseInt($('#qty<?php echo $data['id'];?>').text())
                                    if(qty==1){
                                            $('#qtyminus<?php echo $data['id'];?>').hide()
                                    }else{
                                            $('#qtyminus<?php echo $data['id'];?>').show()
                                    }

                                    $('#qtyplus<?php echo $data['id'];?>').click(function(){

                                        qty+=1
                                        $('#qty<?php echo $data['id'];?>').text(qty)
                                        var price=$("#price<?php echo $row['id'];?>").val()
                                        $("#total<?php echo $data['id'];?>").text('₹'+price*qty)

                                        if(qty==1){
                                                $('#qtyminus<?php echo $data['id'];?>').hide()
                                        }else{
                                                $('#qtyminus<?php echo $data['id'];?>').show()
                                        }
                                    
                                    })

                                    $('#qtyminus<?php echo $data['id'];?>').click(function(){
                                        
                                        qty-=1
                                        $('#qty<?php echo $data['id'];?>').text(qty)
                                        var price=$("#price<?php echo $row['id'];?>").val()
                                        $("#total<?php echo $data['id'];?>").text('₹'+price*qty)

                                        if(qty==1){
                                            $('#qtyminus<?php echo $data['id'];?>').hide()
                                        }else{
                                                $('#qtyminus<?php echo $data['id'];?>').show()
                                        }

                                    })


                                    $("#updatecart<?php echo $row['id'];?>").click(function(){
                                    
                                        $.ajax({
                                            url: "function.php",
                                            type: "POST",
                                            data: {'qty': qty, 'item': '<?php echo $row['id'];?>', 'cmd': 'updatecart' },
                                            success: function(res){
                                                alert(res);

                                            }

                                        })
                                    })





                                })
                            </script>
                    <?php
                }
            }else{
                ?>

                    <tr>
                        <th colspan="5" class="alert alert-danger" style="font-size:17px">Cart is Empty. Please Continue Shopping...</th>
                    </tr>
<?php
            }

?>

                        
                    </tbody>
                </table>
            </div>
            <div class="wishlist-btn cart-btn">
                <!-- <a href="empty-cart.php" class="clean-btn">Clear Cart</a>-->
                <a href="index.php" class="shop-btn ">Continue Shopping</a>
                <a href="checkout.php" class="shop-btn">Proceed to Checkout</a>
            </div>
        </div>
    </section>
    <!--------------- cart-section-end---------------->

    <!--------------- footer-section--------------->
     <?php include("footer.php"); ?>

    <!--------------- footer-section-end--------------->

