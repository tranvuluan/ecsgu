<div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
        <div class="inner">
            <div class="head">
                <span class="title">Wishlist</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll" id="wishlist_items">
                <?php 
                    $path = dirname(__FILE__);
                    require_once $path . '/../process/wishlist.php';
                ?>
            </div>
            <div class="foot">
                <div class="buttons">
                    <a href="wishlist.php" class="btn btn-dark btn-hover-primary mt-30px">view wishlist</a>
                </div>
            </div>
        </div>
    </div>