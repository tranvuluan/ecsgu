<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/Libclass.php';
?>
<?php
    if (isset($_POST['getProductHot'])) {
    ?>
        <h6 class="mb-0 text-uppercase">Sản phẩm bán chạy</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $LibClassModel = new LibClass();
                            $getProductHot = $LibClassModel->getProductHot();
                            if ($getProductHot) {
                                while ($row = $getProductHot->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['id_product'] ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td>Không có sản phẩm nào</td>
                                </tr>
                            <?php
                            }
                            ?>


                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

<?php
    if (isset($_POST['getProductNearlySoldOut'])) {
    ?>
        <h6 class="mb-0 text-uppercase">Sản phẩm sắp hết</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $LibClassModel = new LibClass();
                            $getProductNearlySoldOut = $LibClassModel->getProductNearlySoldout();
                            if ($getProductNearlySoldOut) {
                                while ($row2 = $getProductNearlySoldOut->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $row2['id_product'] ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td>Không có sản phẩm nào</td>
                                </tr>
                            <?php
                            }
                            ?>


                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    
    <?php
    if (isset($_POST['getProductSoldOut'])) {
    ?>
        <h6 class="mb-0 text-uppercase">Sản phẩm đã hết</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $LibClassModel = new LibClass();
                            $getProductSoldOut = $LibClassModel->getProductSoldout();
                            if ($getProductSoldOut) {
                                while ($row3 = $getProductSoldOut->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $row3['id_product'] ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td>Không có sản phẩm nào</td>
                                </tr>
                            <?php
                            }
                            ?>


                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    ?>