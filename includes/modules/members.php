<section id="main-wraper" class="row">
    <div id="sidebar" class="col-md-3">
        <?php require_once CNS_INCLUDES.'common/navigation.php'; ?>
    </div>
    <div id="main-content" class="col-md-9">
        <?php
        $member = new Members();
        $datas = $member->listAll();
        ?>
        <table class="table">
            <thead>
            <th>#</th>
            <th>Mã Sinh Viên</th>
            <th>Tên Thành Viên</th>
            <th>Lớp</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th colspan="2">Hành Động</th>
            </thead>
            <tbody>
            <?php
            $stt = 0;
            if( !empty($datas) && count($datas) ){
                foreach( $datas as $data){  $stt++; ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $data['masv']; ?></td>
                        <td><?php echo $data['firstname'].' '. $data['lastname']; ?></td>
                        <td><?php echo $data['class']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['address']; ?></td>
                        <td><a href="index.php?module=editMember&id=<?php echo $data['masv']; ?>">Edit</a></td>
                        <td><a href="index.php?module=delMember&id=<?php echo $data['masv']; ?>" onclick="return confirm('Bạn Chắc Chắn Muốn Xóa Thành viên này?');">Xóa</a></td>
                    </tr>
                <?php   }
            }else{
                echo "<tr><td colspan='8'>Không Có Thành viên nào!</td></tr> ";
            }
            ?>
            </tbody>

        </table>
    </div>
</section>
