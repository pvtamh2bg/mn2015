<section id="main-wraper" class="row">
    <div id="sidebar" class="col-md-3">
        <?php require_once CNS_INCLUDES.'common/navigation.php'; ?>
    </div>
    <div id="main-content" class="col-md-9">
        <?php
           $user = new Users();
           $datas = $user->listAll();
        ?>
        <table class="table">
            <thead>
                <th>STT</th>
                <th>Tên Tài Khoản</th>
                <th>Mật Khẩu</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Ngày Tạo</th>
                <th colspan="2">Hành Động</th>
            </thead>
            <tbody class="table-hover">
                <?php
                $stt = 0;
                    if( !empty($datas) && count($datas) ){
                        foreach( $datas as $data){  $stt++; ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['passwd']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['fullname']; ?></td>
                                <td><?php echo ($data['created'] != '0000-00-00 00:00:00')?gmdate("H:i d/m/Y", strtotime($data['created']) + 7*3600):'-';  ?></td>
                                <td><a href="index.php?module=editUser&id=<?php echo $data['user_id']; ?>">Edit</a></td>
                                <td><a href="index.php?module=delUser&id=<?php echo $data['user_id']; ?>" onclick="return confirm('Bạn Chắc Chắn Muốn Xóa Tài Khoản này?');">Xóa</a></td>
                            </tr>
                     <?php   }
                    }
                ?>
            </tbody>

        </table>
    </div>
</section>
