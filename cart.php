<!--------------- header-section --------------->
<?php 
include("class.php");
$res= $db->displayCart();
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
                                        <span class="minus">
                                            -
                                        </span>
                                        <span class="number"><?php echo $row['qty']; ?></span>
                                        <span class="plus">
                                            +
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="table-wrapper wrapper-total">
                                <div class="table-wrapper-center">
                                    <h5 class="heading total-price">$10.00</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <span>
                                    <a href="function.php?id=<?php echo $row['id']; ?>&cmd=cartDelete">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                fill="#AAAAAA"></path>
                                        </svg>
                                        </a>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    <?php
                }
            }

?>

                        
                    </tbody>
                </table>
            </div>
            <div class="wishlist-btn cart-btn">
                <a href="empty-cart.php" class="clean-btn">Clear Cart</a>
                <a href="#" class="shop-btn update-btn">Update Cart</a>
                <a href="checkout.php" class="shop-btn">Proceed to Checkout</a>
            </div>
        </div>
    </section>
    <!--------------- cart-section-end---------------->

    <!--------------- footer-section--------------->
     <?php include("footer.php"); ?>
    <!--------------- footer-section-end--------------->

