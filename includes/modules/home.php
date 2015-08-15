<?php checkRole(); ?>
<section id="main-wraper" class="row">
    <div id="sidebar" class="col-md-3">
        <?php require_once CNS_INCLUDES.'common/navigation.php'; ?>
    </div>
    <div id="main-content" class="col-md-9">
       <h1 class="text-center">Wellcome to Water Manage System 2015</h1>
        <div class="acountDb col-md-6">
            <?php
             $user = new Users(); echo "<span class='text-center'>Tổng Số Tài Khoản Quản Lý: ".$user->countUser().'</span>';
            ?>
        </div>
        <div class="room-memberDb col-md-6">
            <?php
                $member = new Members();
                $data = $member->listAll();
                $count = count($data);
                echo "<span class='text-center'>Tổng Số Thành viên Quản Lý: ".$count.'</span>';
            ?>
            <ul class="">
                <?php foreach( $data as $mem ){
                    echo "<li>$mem[firstname] $mem[lastname]</li>";
                } ?>
            </ul>
        </div>
    </div>
</section>