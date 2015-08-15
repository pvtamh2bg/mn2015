<section id="main-wraper" class="row">
    <div id="sidebar" class="col-md-3">
        <?php require_once CNS_INCLUDES.'common/navigation.php'; ?>
    </div>
    <div id="main-content" class="col-md-9">
        <?php
        if( Input::exist() ){
            $errors = [];
            $masv = htmlentities(trim(Input::get('masv')));
            $soluong = htmlentities(trim(Input::get('soluong')));
            $descript = htmlentities(trim(Input::get('description')));
            $water = new Waters();
            $rs = $water->addWater( $masv, $soluong, $descript  );
            if( $rs ){
                header('location:index.php?module=waters');
                exit();
            }else{
                $errors[] = 'Xin Vui lòng xem lại các trường nhập!';
            }
        }
        ?>
        <h3>Thêm Lượt Mua Nước</h3>
        <div class="section-errors">
            <ul class="list-unstyled">
                <?php if( !empty($errors)){
                    foreach($errors as $error ){
                        echo "<li>$error</li>";
                    }
                }
                ?>
            </ul>
        </div>
        <form action="#" method="post" role="form" class="form-horizontal">
            <div class="col-md-12">
                <label for="masv">Người Mua(<span class="required">*</span>)</label>
                <?php 
                   $member = new Members();
                   $datas = $member->listAll();
                ?>
                <select name="masv" id="masv" class="form-control">
                    <option value="">Chọn Người Mua</option>
                    <?php foreach($datas as $data ) { echo "<option value='$data[masv]'>$data[firstname] $data[lastname]</option>"; }?>
                </select>
            </div>
            <div class="col-md-12">
                <label for="soluong">Số Lượng(<span class="required">*</span>)</label>
                <input type="number" class="form-control" value="<?php echo (Input::exist()) ? Input::get('soluong') : ''; ?>" name="soluong" id="soluong" required="">
            </div>
            <div class="col-md-12">
                <label for="description">Miêu tả</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?php echo (Input::exist()) ? Input::get('description') : ''; ?></textarea>
            </div>
            <div class="col-md-12">
                <input type="submit" name="addWater" id="addWater" value="Add Water" class="btn btn-primary"/>
            </div>
        </form>
    </div>
</section>
