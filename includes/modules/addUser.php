<section id="main-wraper" class="row">
    <div id="sidebar" class="col-md-3">
        <?php require_once CNS_INCLUDES.'common/navigation.php'; ?>
    </div>
    <div id="main-content" class="col-md-9">
        <?php
        if( Input::exist() ){
            $errors = [];
            $username = htmlentities(trim(Input::get('username')));
            $password = htmlentities(trim(Input::get('password')));
            $email = filter_var(trim(Input::get('email')), FILTER_VALIDATE_EMAIL);
            $repass = htmlentities(trim(Input::get('repassword')));
            $fullname = htmlentities(trim(Input::get('fullname')));
            $level = htmlentities(trim(Input::get('level')));
            if( $password !== $repass ){
                $errors[] = 'Mật Khẩu không khớp!';
            }else{
                if( strlen($password) < 8){
                    $errors[] = 'Mật khẩu phải lớn hơn 8 kí tự!';
                }else{
                    $user = new Users();
                    $rs = $user->insertUser( $username, $password, $email, $fullname, $level);
                    if( $rs ){
                        header('location:index.php?module=users');
                        exit();
                    }else{
                        $errors[] = 'Tài khoản đã tồn tài! xin vui lòng nhập tài khoản khác!';
                    }
                }
            }

        }
        ?>
        <h3>Thêm Tài Khoản</h3>
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
                <label for="username">Tên Tài Khoản(<span class="required">*</span>)</label>
                <input type="text" class="form-control" name="username" id="username" required="" value="<?php echo (Input::exist()) ? Input::get('username') : ''; ?>">
            </div>
            <div class="col-md-6">
                <label for="password">Mật Khẩu(<span class="required">*</span>)</label>
                <input type="password" class="form-control" name="password" id="password" required="" value="">
            </div>
            <div class="col-md-6">
                <label for="name">Nichk Name(<span class="required">*</span>)</label>
                <input type="text" class="form-control" value="<?php echo (Input::exist()) ? Input::get('fullname') : ''; ?>" name="fullname" id="fullname" required="">
            </div>
            <div class="col-md-6">
                <label for="password">Nhập Lại Mật Khẩu(<span class="required">*</span>)</label>
                <input type="password" class="form-control" name="repassword" id="repassword" required="">
            </div>
            <div class="col-md-6">
                <label for="password">Email(<span class="required">*</span>)</label>
                <input type="email" class="form-control" value="<?php echo (Input::exist()) ? Input::get('email') : ''; ?>" name="email" id="email" required="">
            </div>
            <div class="col-md-6">
                <label for="level">Chọn Quyền(<span class="required">*</span>)</label>
                <select name="level" id="level" class="form-control" required="">
                    <option value="">Chọn Quyền</option>
                    <option value="1">Member</option>
                    <option value="2">Admin</option>
                </select>
            </div>
            <div class="col-md-12">
                <input type="submit" name="addUser" id="addUser" value="Add User" class="btn btn-primary"/>
            </div>
        </form>
    </div>
</section>
