<?php
include("class.php");
include("header.php");

?>
<!--------------- header-section-end --------------->

<!--------------- login-section--------------->
<section class="login product footer-padding">
    <div class="container">
        <div class="login-section account-section">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xs-12">
                    <form action="function.php" method="post" enctype="multipart/form-data">
                        <div class="review-form box-shadows" style="height: 1000px;">
                            <div class="review-form-text">
                                <h5 class="comment-title">Create Account</h5>
                                <img src="assets/images/homepage-one/vector-line.png" alt="img">
                            </div>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="username" class="form-label">Username*</label>
                                    <input type="text" name="username" class="form-control" placeholder="username">
                                </div>
                                <div class="review-form-name">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" name="email" class="form-control" placeholder="user@gmail.com">
                                </div>
                            </div>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="firstName" class="form-label">First Name*</label>
                                    <input type="text" name="firstName" class="form-control" placeholder="First Name">
                                </div>
                                <div class="review-form-name">
                                    <label for="lastName" class="form-label">Last Name*</label>
                                    <input type="text" name="lastName" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="contact" class="form-label">Contact*</label>
                                    <input type="number" name="contact" class="form-control" placeholder="Enter Contact">
                                </div>
                                <div class="review-form-name">
                                    <label for="pic" class="form-label">Photo*</label>
                                    <input type="file" name="pic" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="review-form-name mt-1">
                                <label for="country" class="form-label">Country*</label>
                                <select id="country" name="country" class="form-select">
                                    <option selected disabled>--Select Country--</option>
                                    <?php $res = $db ->country($cid); 
                                           
                                    ?>
                                </select>
                            </div>
                            <div class="review-form-name mt-2">
                                <label for="state" class="form-label">State*</label>
                                <select id="state" name="state" class="form-select">
                                    <option selected disabled>--Select state--</option>
                                </select>
                            </div>
                            <div class="review-form-name mt-2 mb-2">
                                <label for="city" class="form-label">city*</label>
                                <select id="city" name="city" class="form-select">
                                    <option selected disabled>--Select city--</option>
                                </select>
                            </div>
                            <div class=" account-inner-form mt-3">
                                <div class="review-form-name">
                                    <label for="text" class="form-label">Address*</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address">
                                </div>
                                <div class="review-form-name">
                                    <label for="pinCode" class="form-label">Pin Code*</label>
                                    <input type="number" name="pinCode" class="form-control" placeholder="Enter PinCode">
                                </div>
                            </div>

                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="password" class="form-label">Password*</label>
                                    <input type="password" name="password" class="form-control" placeholder="*****">
                                </div>
                                <div class="review-form-name">
                                    <label for="confirmPassword" class="form-label">Retype Password*</label>
                                    <input type="password" name="confirmPassword" class="form-control" placeholder="******">
                                </div>
                            </div>
         
                            <div class="review-form-name checkbox">
                                <div class="checkbox-item">
                                    <input type="checkbox">
                                    <p class="remember">
                                        I agree all terms and condition in <span class="inner-text">EcoShop.</span></p>
                                </div>
                            </div> 
                            <div class="login-btn text-center">
                                <!-- <a href="#" class="shop-btn">Create an Account</a> -->
                                <input type="submit" name="submit" class="shop-btn" value="Create an Account">

                                <span class="shop-account">Already have an account ?<a href="login.php">Log
                                        In</a></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-xs-12 d-none d-lg-block">
                    <div class="account-img">
                        <img src="assets/images/homepage-one/account-img.webp" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- login-section-end --------------->

<!--------------- footer-section--------------->
<?php include("footer.php");  ?>

<script>
    $(function(){
        $("#country").change(function(){
            let cid = $("#country").val();
            $.ajax({
                url : "function.php",
                method : "POST",
                data : {cid : cid , cmd : "getState"},
                success : function(res){
                    $("#state").html(res);
                }
            })
        })
        $("#state").change(function(){
            let sid = $("#state").val();
            $.ajax({
                url : "function.php",
                method : "POST",
                data : {sid : sid , cmd : "getCity"},
                success : function(res){
                    $("#city").html(res);
                }
            })
        })
    })
</script>