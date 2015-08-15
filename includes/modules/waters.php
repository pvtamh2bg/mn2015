<section id="main-wraper" class="row">
    <div id="sidebar" class="col-md-3">
        <?php require_once CNS_INCLUDES.'common/navigation.php'; ?>
    </div>
    <div id="main-content" class="col-md-9">
        <?php
        $water = new Waters();
        $datanewbuy = $water->memberFinal();
        $listnewbuy = $water->listMemberlastest();
        ?>
        <div class="col-md-6 memberfinal">
            <h4><i class="glyphicon glyphicon-bookmark memberfinalicon"></i> Người Mua Gần Đấy Nhất: <?php echo $datanewbuy['firstname'] .' '.$datanewbuy['lastname']; ?></h4><br>
            <ul class="list-unstyled">
                <li>Số Lượng: <?php echo $datanewbuy['soluong']; ?> </li>
                <li>Ngày Mua: <?php echo ($datanewbuy['created'] != '0000-00-00 00:00:00')?gmdate("H:i d/m/Y", strtotime($datanewbuy['created']) + 7*3600):'-';  ?></li>
            </ul>
        </div>
        <div class="col-md-6 listmember">
            <h4><i class="glyphicon glyphicon-th-list listmemberlastest"></i> Danh Sách Những người mua gần đây nhất</h4>
            <ol>
                <?php if( !empty($listnewbuy) && count($listnewbuy)){
                    foreach( $listnewbuy as $list ){ ?>
                       <li>
                           <span class="name">Tên: <?php echo $list['firstname'].' '. $list['lastname']; ?></span><br>
                           <span class="soluong">Số Lượng: <?php echo $list['soluong']; ?></span>&nbsp;&nbsp;&nbsp; <span class="created">Ngày Mua: <?php echo ($list['created'] != '0000-00-00 00:00:00')?gmdate("d/m/Y", strtotime($list['created']) + 7*3600):'-';  ?></span>
                       </li>
                <?php }
                } ?>
            </ol>
        </div>
    </div>
</section>
