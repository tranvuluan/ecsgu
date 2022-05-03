<?php 
    
?>

<div class="tab-pane fade show active" id="tab-product-all">
    <div class="row">
        <?php $showproduct = $productModel->getProducts();
        if ($showproduct) {
            while ($row = $showproduct->fetch_assoc()) {
        ?>
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up" data-aos-delay="200">
                    <!-- Single Prodect -->
                    <div class="product">
                        <div class="thumb">
                            <a href="<?php echo 'product-details.php?id_product=' . $row['id_product'] ?>" class="image">
                                <img src="<?php echo $row['image'] ?>" alt="Product" />
                                <img class="hover-image" src="<?php echo $row['image'] ?>" alt="Product" />
                            </a>
                            <span class="badges">
                                <span class="new">New</span>
                            </span>
                            <div class="actions">
                                <a href="wishlist.php" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a>
                                <a href="#" onclick="viewDetailModal()" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                            </div>
                            <!-- <a href="#" onclick="addToCart('<?php print $row['id_product'] ?>')" title="Add To Cart" class=" add-to-cart">Add
                                                        To Cart</a> -->
                        </div>
                        <div class="content">
                            <span class="ratings">
                                <span class="rating-wrap">
                                    <span class="star" style="width: 100%"></span>
                                </span>
                                <span class="rating-num">( 5 Review )</span>
                            </span>
                            <h5 class="title"><a href="product-details.php"><?php echo $row['name'] ?>
                                </a>
                            </h5>
                            <span class="price">
                                <span class="new"><?php echo $row['price'] ?></span>
                            </span>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>