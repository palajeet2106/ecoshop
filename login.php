<?php include("header.php");  ?>
    <!--------------- header-section-end --------------->

    <!--------------- login-section --------------->
    <section class="login product footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="login-form">
                            <div class="review-form  box-shadows">
                                <div class="review-form-text">
                                    <h5 class="comment-title">Log In</h5>
                                    <img src="assets/images/homepage-one/vector-line.png" alt="img">
                                </div>
                                <div class="review-inner-form ">
                                    
                                <form method="POST" action="function.php">

                                    <div class="review-form-name">
                                        <label for="email" class="form-label">Email Address**</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="review-form-name">
                                        <label for="password" class="form-label">Password*</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="password">
                                    </div>
                                    <div class="review-form-name checkbox">
                                        <div class="checkbox-item">
                                            <input type="checkbox">
                                            <span class="address">
                                                Remember Me</span>
                                        </div>
                                        <div class="forget-pass">
                                            <p>Forgot password?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="login-btn text-center">
                                    <button type="submit" name="btnlogin" class="shop-btn">Log In</button>
                                    <span class="shop-account">Dont't have an account ?<a
                                            href="create-account.php">Sign Up
                                            Free</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-img">
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