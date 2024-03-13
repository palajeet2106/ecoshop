<?php
include("class.php");
include("header.php");



if(isset($_REQUEST['pid'])){
    $summary = $db->ordersummary($_REQUEST['pid']);

    if (mysqli_num_rows($summary) == 0) {
    ?>
        <script>
            window.location.href = "index.php";
        </script>

    <?php
    }
}
?>
<!--------------- header-section-end --------------->

<!--------------- blog-tittle-section---------------->
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="index.php">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Checkout</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Checkout</h1>
        </div>
    </div>
</section>
<!--------------- blog-tittle-section-end---------------->

<!--------------- checkout-section---------------->
<section class="checkout product footer-padding">
    <div class="container">
        <div class="checkout-section">
            <div class="row gy-5 gy-lg-0">
                <div class="col-lg-6">
                    <?php
                    $res = $db->displayUser();
                    if (mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            // $country = $db ->displayCountry($row['country']);
                            // $state = $db ->displayState($row['state']);
                            // $city = $db ->displayCity($row['city']);
                    ?>
                            <form action="function.php" method="post">
                                <div class="checkout-wrapper">
                                    <div class="account-section billing-section box-shadows">
                                        <h5 class="wrapper-heading">Billing Details</h5>
                                        <div class="review-form">
                                            <div class=" account-inner-form">
                                                <div class="review-form-name">
                                                    <label for="customerid" class="form-label">Customer Id*</label>
                                                    <input type="text" id="customerid" name="customerid" class="form-control" value="<?php echo $row['customerid']; ?>">
                                                </div>
                                                
                                            </div>
                                            <div class=" account-inner-form">
                                                <div class="review-form-name">
                                                    <label for="firstName" class="form-label">First Name*</label>
                                                    <input type="text" id="firstName" name="firstName" class="form-control" value="<?php echo $row['firstName']; ?>">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="lastName" class="form-label">Last Name*</label>
                                                    <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo $row['lastName']; ?>">
                                                </div>
                                            </div>
                                            <div class=" account-inner-form">
                                                <div class="review-form-name">
                                                    <label for="email" class="form-label">Email*</label>
                                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                                </div>
                                                <div class="review-form-name">
                                                    <label for="contact" class="form-label">contact*</label>
                                                    <input type="number" id="contact" name="contact" class="form-control" value="<?php echo $row['contact']; ?>">
                                                </div>
                                            </div>
                                            <div class="review-form-name mt-1">
                                                <label for="country" class="form-label">Country*</label>
                                                <select id="country" name="country" class="form-select">
                                                    <?php $res = $db->country($row['country'])   ?>
                                                </select>
                                            </div>
                                            <div class="review-form-name mt-2">
                                                <label for="state" class="form-label">State*</label>
                                                <select id="state" name="state" class="form-select">
                                                    <?php
                                                    $res =  $db->state($row['country'], $row['state']); ?>
                                                </select>
                                            </div>
                                            <div class="review-form-name mt-2 mb-2">
                                                <label for="city" class="form-label">city*</label>
                                                <select id="city" name="city" class="form-select">
                                                    <?php $res = $db->city($row['state'], $row['city']) ?>
                                                </select>
                                            </div>
                                            <div class="review-form-name address-form">
                                                <label for="address" class="form-label">Address*</label>
                                                <input type="text" id="address" name="address" class="form-control" value="<?php echo $row['address'];  ?>">
                                            </div>
                                            <div class=" account-inner-form city-inner-form">
                                                <div class="review-form-name">
                                                    <label for="pinCode" class="form-label">Postcode / ZIP*</label>
                                                    <input type="number" id="pinCode" name="pinCode" class="form-control" value="<?php echo $row['pincode']; ?>">
                                                </div>
                                            </div>


                                            <div class="review-form-name checkbox">
                                                <div class="checkbox-item">
                                                    <input type="checkbox" id="account">
                                                    <label for="account" class="form-label">
                                                        Create an account?</label>
                                                </div>
                                            </div>
                                            <div class="review-form-name shipping">
                                                <h5 class="wrapper-heading">Shipping Address</h5>
                                                <!-- <input type="submit" name="update" id="update" value="edit" class = "btn btn-warning"> -->
                                                <input type="hidden" name="userId" value="<?php echo $row['id']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                </div>
                <div class="col-lg-6">
                    <div class="checkout-wrapper">
                        <div class="account-section billing-section box-shadows">
                            <h5 class="wrapper-heading">Order Summary</h5>
                            <div class="order-summery ">
                                <div class="subtotal product-total">
                                    <h5 class="wrapper-heading">PRODUCT</h5>
                                    <h5 class="wrapper-heading">TOTAL</h5>
                                </div>
                                <hr>
                                <div class="subtotal product-total">

                                    <ul class="product-list">
                                        <?php

                                        $sum = 0;
                                        while ($smrow = mysqli_fetch_assoc($summary)) {
                                            $cartid = $smrow['cartid'];
                                            
                                            $product = mysqli_fetch_assoc($db->viewProducts($smrow['productid']));

                                            $sum += $smrow['qty'] * $product['productPrice'];
                                            if ($sum >= 1000) {
                                                $sc = 0;
                                            } else {
                                                $sc = 100;
                                            }

                                            $netamount = $sum + $sc;
                                        ?>
                                            <li class="card shadow p-4">
                                                <div class="product-info">
                                                    <h5 class="wrapper-heading"><?php echo $product['productName'] . ' X ' . $smrow['qty']; ?></h5>

                                                    <!-- <p class="paragraph">64GB, Black, 44mm, Chain Belt</p> -->
                                                </div>
                                                <div class="price">
                                                <input type="hidden" name="pids[]" value="<?php echo $smrow['productid'];?>">
                                                    <h5 class="wrapper-heading">₹ <?php echo $smrow['qty'] * $product['productPrice']; ?></h5>
                                                </div>
                                            </li>

                                        <?php
                                        }



                                        ?>


                                    </ul>
                                </div>
                                <hr>
                                <div class="subtotal product-total">
                                    <h5 class="wrapper-heading">SUBTOTAL</h5>
                                    <h5 class="wrapper-heading">₹ <?php echo $sum; ?></h5>
                                </div>
                                <div class="subtotal product-total">
                                    <ul class="product-list">
                                        <li>
                                            <div class="product-info">
                                                <p class="paragraph">SHIPPING</p>
                                                <h5 class="wrapper-heading">Free Shipping</h5>

                                            </div>
                                            <div class="price">
                                                <h5 class="wrapper-heading">+<?php echo $sc; ?></h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="subtotal total">
                                    <h5 class="wrapper-heading">TOTAL</h5>
                                    <h5 class="wrapper-heading price">₹ <?php echo $netamount; ?></h5>
                                </div>
                                <div class="subtotal payment-type">

                                    <div class="checkbox-item">
                                        <input type="radio" id="cash" name="paymentmode" value="COD">
                                        <div class="cash">
                                            <h5 class="wrapper-heading">Cash on Delivery</h5>
                                        </div>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="radio" id="credit" name="paymentmode" value="ONLINE">
                                        <div class="credit">
                                            <h5 class="wrapper-heading">Credit/Debit Cards/UPI/WALLET</h5>

                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="orderid" value="<?php echo "ORD" . rand(11111, 999999) ?>">
                                <input type="hidden" name="cartid" value="<?php echo $cartid; ?>">
                                
                                <input type="hidden" name="netamount" value="<?php echo $netamount; ?>">

                                <input type="submit" name="btnorder" id="update" value="Place Order Now" class="shop-btn">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
        <?php
                        }
                    }

        ?>
            </div>
        </div>
    </div>
</section>
<!--------------- checkout-section-end---------------->

<!--------------- footer-section--------------->
<?php include("footer.php"); ?>

<script>
    $(function() {
        $("#country").change(function() {
            let cid = $("#country").val();
            $.ajax({
                url: "function.php",
                method: "POST",
                data: {
                    cid: cid,
                    cmd: "getState"
                },
                success: function(res) {
                    $("#state").html(res);
                }
            })
        })
        $("#state").change(function() {
            let sid = $("#state").val();
            $.ajax({
                url: "function.php",
                method: "POST",
                data: {
                    sid: sid,
                    cmd: "getCity"
                },
                success: function(res) {
                    $("#city").html(res);
                }
            })
        })
    })
</script>