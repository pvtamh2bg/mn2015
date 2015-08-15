<section id="main-wraper" class="row">
    <div id="sidebar" class="col-md-3">
        <?php require_once CNS_INCLUDES.'common/navigation.php'; ?>
    </div>
    <div id="main-content" class="col-md-9">
        <?php
        if( Input::exist() ){
            $errors = [];
            $masv = htmlentities(trim(Input::get('masv')));
            $firstname = htmlentities(trim(Input::get('firstname')));
            $mail = filter_var(trim(Input::get('email')), FILTER_VALIDATE_EMAIL);
            $lastname = htmlentities(trim(Input::get('lastname')));
            $class = htmlentities(trim(Input::get('class')));
            $address = htmlentities(trim(Input::get('address')));
            $member = new Members();
            $rs = $member->insertMember( $masv, $firstname, $lastname, $mail, $class, $address );
            if( $rs ){
                header('location:index.php?module=members');
                exit();
            }else{
                $errors[] = 'Thành viên đã tồn tài! xin vui lòng nhập tài khoản khác!';
            }
        }
        ?>
        <h3>Thêm Thành Viên</h3>
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
            <div class="col-md-6">
                <label for="masv">Mã Sinh Viên(<span class="required">*</span>)</label>
                <input type="text" class="form-control" name="masv" id="masv" required="" value="<?php echo (Input::exist()) ? Input::get('masv') : ''; ?>">
            </div>
            <div class="col-md-6">
                <label for="email">Email(<span class="required">*</span>)</label>
                <input type="email" class="form-control" value="<?php echo (Input::exist()) ? Input::get('email') : ''; ?>" name="email" id="email" required="">
            </div>
            <div class="col-md-6">
                <label for="Firstname">First Name(<span class="required">*</span>)</label>
                <input type="text" class="form-control" name="firstname" id="firstname" required="" value="<?php echo (Input::exist()) ? Input::get('firstname') : ''; ?>">
            </div>
            <div class="col-md-6">
                <label for="class">Lớp(<span class="required">*</span>)</label>
                <input type="text" class="form-control" name="class" id="class" value="<?php echo (Input::exist()) ? Input::get('class') : ''; ?>" required="">
            </div>

            <div class="col-md-6">
                <label for="lastname">Last Name(<span class="required">*</span>)</label>
                <input type="text" class="form-control" value="<?php echo (Input::exist()) ? Input::get('lastname') : ''; ?>" name="lastname" id="lastname" required="">
            </div>
            <div class="col-md-6">
                <label for="address">Address(<span class="required">*</span>)</label>
                <input type="text" class="form-control" value="<?php echo (Input::exist()) ? Input::get('address') : ''; ?>" name="address" id="address" required="">
            </div>
            <div class="col-md-12">
                <input type="submit" name="addMember" id="addmember" value="Add Member" class="btn btn-primary"/>
            </div>
        </form>
    </div>
</section>
