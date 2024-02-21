<?php include("header.php"); ?>
    <!--------------- header-section-end --------------->

    <!--------------- login-section--------------->
    <section class="login product footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-xs-12">
                        <div class="review-form box-shadows">
                            <div class="review-form-text">
                                <h5 class="comment-title">Create Account</h5>
                                <img src="assets/images/homepage-one/vector-line.png" alt="img">
                            </div>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="fname" class="form-label">First Name*</label>
                                    <input type="text" id="fname" class="form-control" placeholder="First Name">
                                </div>
                                <div class="review-form-name">
                                    <label for="lname" class="form-label">Last Name*</label>
                                    <input type="text" id="lname" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" id="email" class="form-control" placeholder="user@gmail.com">
                                </div>
                            </div>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="cpass" class="form-label">Password*</label>
                                    <input type="password" id="cpass" class="form-control" placeholder="*****">
                                </div>
                                <div class="review-form-name">
                                    <label for="rpass" class="form-label">Retype Password*</label>
                                    <input type="password" id="rpass" class="form-control" placeholder="******">
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
                                <a href="#" class="shop-btn">Create an Account</a>
                                <span class="shop-account">Already have an account ?<a href="login.php">Log
                                        In</a></span>
                            </div>
                        </div>
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