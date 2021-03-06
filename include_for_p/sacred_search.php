<?php
    $sacredSelectAll = new shopSacredObj();

?>



<div class="container mt-4 mb-4">
    <div class="card">
        <div class="card-header ">
            <h3 class="text-center"><b><i class="fas fa-search text-warning"></i> ค้นหาวัตถุมงคล
            </h3>
        </div>
        <div class="card-body pt-4 min-vh-100">
            <div class="row d-flex justify-content-center">
                <?php
                
                if(isset($_POST['search']) && !empty($_POST['search'])){

/*-------------------------- Show Search SacredOBJ ------------------------- */


                        $SearchSObj = $_POST['search'];
                        $sqlSearch = $sacredSelectAll->runQuery("SELECT * FROM product WHERE product_name LIKE '%$SearchSObj%' or product_type LIKE '%$SearchSObj%'");
                        if($sqlSearch){
                            $row = mysqli_num_rows($sqlSearch);
                            if($row < 1){
                                ?>
                <h5 class="textbill-primary font-weight-bold">
                    <?php echo"ไม่พบวัตถุมงคล ' $SearchSObj ' ที่ท่านค้นหา"; ?>
                </h5>
                <?php
                            }else{
                            ?>
                <div class=" pl-5 pr-5 col-md-12 alert alert-primary">
                    <text class="font-weight-bold">ผลการค้นหา : </text><text
                        class="text-secondary"><?php echo $SearchSObj;?></text>

                </div>
                <?php
                                while($fetchSeach = mysqli_fetch_array($sqlSearch)){
                                    ?>




                <div class="card col-md-3 m-2 p-3">
                    <a class="card"
                        href="index.php?p=readSacredObj&id4readSacredObj=<?php echo $fetchSeach['id_product']; ?>">
                        <?php
                            $pic =explode(',', $fetchSeach['product_cover']) ;
                        ?>
                        <img id="picSize" src="image/product/<?php echo $pic[0]; ?>"
                            title="คลิกเพื่อดูรายละเอียดวัตถุมงคล">
                    </a>

                    <div>
                        <p class="mb-1 mt-1" id="name_shop_card"><?php echo $fetchSeach['product_name']; ?></p>
                    </div>
                    <small class="font-weight-bold">หมวดหมู่ : <?php echo $fetchSeach['product_type'] ?></small>
                    <small class="font-weight-bold">คงเหลือ : <?php echo $fetchSeach['product_qty'] ?> ชิ้น</small>

                    <div class=" p-0 pr-2 pl-2 mb-0 mt-2">
                        <strong class="d-flex d-inline">
                            <h4 class="mb-1 mt-1 text-right text-success font-weight-bold" id="name_shop_card">
                                <?php echo number_format($fetchSeach['product_price']); ?>
                                <text class="text-danger">฿</text>
                            </h4>
                        </strong>
                    </div>

                </div>
                <?php
                                }
                            }
                        }else{
                            echo"Can't Search data";
                        }

/* -------------------------------------------------------------------------- */


}           
                    ?>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip('show');

});
</script>

