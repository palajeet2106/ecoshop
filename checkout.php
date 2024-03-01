<?php
include("class.php");
include("header.php"); ?>
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
                            $country = $db ->displayCountry($row['country']);
                            $state = $db ->displayState($row['state']);
                            $city = $db ->displayCity($row['city']);
                    ?>
                              <div class="checkout-wrapper">
                                <div class="account-section billing-section box-shadows">
                                    <h5 class="wrapper-heading">Billing Details</h5>
                                    <div class="review-form">
                                        <div class=" account-inner-form">
                                            <div class="review-form-name">
                                                <label for="fname" class="form-label">First Name*</label>
                                                <input type="text" id="fname" class="form-control" value="<?php echo $row['firstName']; ?>">
                                            </div>
                                            <div class="review-form-name">
                                                <label for="lname" class="form-label">Last Name*</label>
                                                <input type="text" id="lname" class="form-control" value="<?php echo $row['lastName']; ?>">
                                            </div>
                                        </div>
                                        <div class=" account-inner-form">
                                            <div class="review-form-name">
                                                <label for="email" class="form-label">Email*</label>
                                                <input type="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">
                                            </div>
                                            <div class="review-form-name">
                                                <label for="phone" class="form-label">Phone*</label>
                                                <input type="tel" id="phone" class="form-control" value="<?php echo $row['contact']; ?>">
                                            </div>
                                        </div>
                                        <div class="review-form-name mt-1">
                                            <label for="country" class="form-label">Country*</label>
                                            <select id="country" name="country" class="form-select">
                                            <?php $res = $db ->country($row['country']);   ?>
                                                <option selected disabled ><?php echo $country['name']; ?></option>
                                            </select>
                                        </div>
                                        <div class="review-form-name mt-2">
                                            <label for="state" class="form-label">State*</label>
                                            <select id="state" name="state" class="form-select">
                                            <?php $res =  $db -> state($row['country'] , $row['state']); ?>
                                                <option selected disabled><?php echo $state['name']; ?></option>
                                            </select>
                                        </div>
                                        <div class="review-form-name mt-2 mb-2">
                                            <label for="city" class="form-label">city*</label>
                                            <select id="city" name="city" class="form-select">
                                            <?php $res = $db ->city($row['state'] , $row['city']  ) ?>
                                                <option selected disabled><?php echo $city['name']; ?></option>
                                            </select>
                                        </div>
                                        <div class="review-form-name address-form">
                                            <label for="address" class="form-label">Address*</label>
                                            <input type="text" id="address" class="form-control" value="<?php echo $row['address'];  ?>">
                                        </div>
                                        <div class=" account-inner-form city-inner-form">
                                            <div class="review-form-name">
                                                <label for="number" class="form-label">Postcode / ZIP*</label>
                                                <input type="number" id="number" class="form-control" value="<?php echo $row['pincode'] ; ?>">
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
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="remember">
                                                <label for="remember" class="form-label">
                                                    Create an account?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }


                    ?>

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
                                        <li>
                                            <div class="product-info">
                                                <h5 class="wrapper-heading">Apple Watch X1</h5>
                                                <p class="paragraph">64GB, Black, 44mm, Chain Belt</p>
                                            </div>
                                            <div class="price">
                                                <h5 class="wrapper-heading">$38</h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-info">
                                                <h5 class="wrapper-heading">Beats Wireless x1</h5>
                                                <p class="paragraph">64GB, Black, 44mm, Chain Belt</p>
                                            </div>
                                            <div class="price">
                                                <h5 class="wrapper-heading">$48</h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-info">
                                                <h5 class="wrapper-heading">Samsung Galaxy S10 x2</h5>
                                                <p class="paragraph">12GB RAM, 512GB, Dark Blue</p>
                                            </div>
                                            <div class="price">
                                                <h5 class="wrapper-heading">$279</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="subtotal product-total">
                                    <h5 class="wrapper-heading">SUBTOTAL</h5>
                                    <h5 class="wrapper-heading">$365</h5>
                                </div>
                                <div class="subtotal product-total">
                                    <ul class="product-list">
                                        <li>
                                            <div class="product-info">
                                                <p class="paragraph">SHIPPING</p>
                                                <h5 class="wrapper-heading">Free Shipping</h5>

                                            </div>
                                            <div class="price">
                                                <h5 class="wrapper-heading">+$0</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="subtotal total">
                                    <h5 class="wrapper-heading">TOTAL</h5>
                                    <h5 class="wrapper-heading price">$365</h5>
                                </div>
                                <div class="subtotal payment-type">
                                    <div class="checkbox-item">
                                        <input type="radio" id="bank" name="bank">
                                        <div class="bank">
                                            <h5 class="wrapper-heading">Direct Bank Transfer</h5>
                                            <p class="paragraph">Make your payment directly into our bank account.
                                                Please use
                                                <span class="inner-text">
                                                    your Order ID as the payment reference.
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="radio" id="cash" name="bank">
                                        <div class="cash">
                                            <h5 class="wrapper-heading">Cash on Delivery</h5>
                                        </div>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="radio" id="credit" name="bank">
                                        <div class="credit">
                                            <h5 class="wrapper-heading">Credit/Debit Cards or Paypal</h5>

                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="shop-btn">Place Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- checkout-section-end---------------->

<!--------------- footer-section--------------->
<?php include("footer.php"); ?>