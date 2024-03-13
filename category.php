
<?php 
include "class.php";
include "header.php" ;
    
    if(isset($_REQUEST['id'])){
        $res= $db->getProductsByCategory($_REQUEST['id']);
    }else{

    }

?>
    <!--------------- header-section-end --------------->

    <!--------------- products-sidebar-section--------------->
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3">
                    <div class="sidebar" data-aos="fade-right">
                        <div class="sidebar-section box-shadows">
                            <div class="sidebar-wrapper">
                                <h3 class="wrapper-heading">Product Categories</h3>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="veg" name="veg">
                                            <label for="veg">Vegetable</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="fruits" name="fruits">
                                            <label for="fruits">Fruits</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="juice" name="juice">
                                            <label for="juice">Juice</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="meat" name="meat">
                                            <label for="meat">Meat</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="smoothie" name="smoothie">
                                            <label for="smoothie">Smoothie</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="bread" name="bread">
                                            <label for="bread">Bread</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="seaf" name="seaf">
                                            <label for="seaf">Sea Foods</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="petf" name="petf">
                                            <label for="petf">Pet Foods</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="grooming" name="grooming">
                                            <label for="grooming">Milk & Drinks</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="drinks" name="drinks">
                                            <label for="drinks">Drinks</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="protein" name="protein">
                                            <label for="protein">Protein</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper sidebar-range">
                                <h3 class="wrapper-heading">Price Range</h3>
                                <div class="price-slide range-slider">
                                    <div class="price">
                                        <div class="range-slider style-1">
                                            <div id="slider-tooltips" class="slider-range mb-3"></div>
                                            <span class="example-val" id="slider-margin-value-min"></span>
                                            <span>-</span>
                                            <span class="example-val" id="slider-margin-value-max"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h3 class="wrapper-heading">Brands</h3>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="thread" name="thread">
                                            <label for="thread">Refined Threads
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="ethereal" name="ethereal">
                                            <label for="ethereal">Ethereal Chic</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="yellow" name="yellow">
                                            <label for="yellow">Yellow</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="esctasy" name="esctasy">
                                            <label for="esctasy">Esctasy</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="urban" name="urban">
                                            <label for="urban">Urban Hive</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="velvet" name="velvet">
                                            <label for="velvet">Velvet Vista</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="boldly" name="boldly">
                                            <label for="boldly">Boldly Blue</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="minted" name="minted">
                                            <label for="minted">Minted Mode</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="ensemble" name="ensemble">
                                            <label for="ensemble">Eclectic Ensemble</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="attire" name="attire">
                                            <label for="attire">BraveAlchemy Attire</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="couture" name="couture">
                                            <label for="couture">Cascade Couture</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h3 class="wrapper-heading">Weight</h3>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="small" name="small">
                                            <label for="small">500gm</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="medium" name="medium">
                                            <label for="medium">1kg</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="large" name="large">
                                            <label for="large">2kg</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="xl" name="xl">
                                            <label for="xl">5kg</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="2xl" name="2xl">
                                            <label for="2xl">10kg</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-shop-section">
                            <span class="wrapper-subtitle">TRENDY</span>
                            <h3 class="wrapper-heading">Best wireless Shoes</h3>
                            <a href="seller-sidebar.php" class="shop-btn deal-btn">Shop Now
                                <span>
                                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                            transform="rotate(45 1.45312 0.914062)" />
                                        <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                            transform="rotate(135 8 7.45703)" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="product-sidebar-section" data-aos="fade-up">
                        <div class="row g-5">
                            <div class="col-lg-12">
                                <div class="product-sorting-section box-shadows">
                                    <div class="result">
                                        <p>Showing <span>1–16 of 66 results</span></p>
                                    </div>
                                    <div class="product-sorting">
                                        <span class="product-sort">Sort by:</span>
                                        <div id="allitem">
                                            <div class="product-list" onclick="selectBoxHandler('allitem')">
                                                <span class="default item-text">Default</span>
                                                <span>
                                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1L5 5L9 1" stroke="#9A9A9A" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="slectbox-body" style="display: none;">
                                                <div class="clickAway position-fixed"
                                                    onclick="selectBoxHandler('allitem')"></div>
                                                <ul class="country-options">
                                                    <li class="all-option"><span class="option-text item-text">Vegetable
                                                        </span></li>
                                                    <li class="all-option"><span
                                                            class="option-text item-text">Fruits</span>
                                                    </li>
                                                    <li class="all-option"><span
                                                            class="option-text item-text">Juice</span>
                                                    </li>
                                                    <li class="all-option"><span
                                                            class="option-text item-text">Meat</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                while($row=mysqli_fetch_assoc($res)){
                                    ?>
                                           <div class="col-xl-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <a href="product-info.php?id=<?php echo $row['id']; ?>"><img src="admin/<?php echo $row['featuredPhoto'];?>"
                                            alt="product-img" style="height: 230px !important; width : 250px !important;"></a>
                                    
                                    </div>
                                    <div class="product-info">
                                        
                                        <div class="product-description">
                                            <a href="product-info.php" class="product-details"><?php echo $row['productName'];?>
                                            </a>
                                            <div class="price">
                                                <span class="price-cut"></span>
                                                <span class="new-price">₹ <?php echo $row['productPrice'];?></span>
                                            </div>
                                        </div>
                                        <div class="product-cart-btn">
                                            <!-- <a href="cart.php" class="product-btn">
                                                <span class="btn-text">Add To Cart</span>
                                            </a> -->
                                            <form method="post" action="function.php">
                                            <input type="hidden" name="pid" value="<?php echo $row['id'];?>">
                                            <button type="submit" name="btnaddcart" class="product-btn"> 
                                         Add To Cart
                                        </button>
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <?php
                                }

                            ?>
                         
                        

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- products-sidebar-section-end--------------->

    <!--------------- footer-section--------------->
    <?php include("footer.php");  ?>
    <!--------------- footer-section-end--------------->


