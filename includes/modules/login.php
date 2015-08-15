<?php
    if( isset($_POST['login'])) {
        $username = $passwd = $errors = '';
        if( $_POST['username'] !== '' ){
            $username= htmlentities( trim($_POST['username']));
        }else
            $errors[]='Vui lòng nhập Tên đăng nhập!';
        if( $_POST['password'] !== '' ){
            $passwd= htmlentities( trim($_POST['password']));
        }else
            $errors[]='Vui lòng nhập Password!';
        if( $username && $passwd ) {
            $user = new Users();
            $login = $user->login($username, $passwd);
            if ($login) {
                header( 'location:index.php?module=home');
                exit();
            } else {
               $errors[] = 'Sai tài khoản hoặc mật khẩu';
            }
        }
    }
?>
    <section role="main" class="login-content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="loginform">
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
                    <form action="" method="post" role="form" class="form-horizontal">
                        <h3 class="text-center">Đăng nhập Hệ thống</h3>
                        <div class="items">
                            <label for="Username" class="sr-only">Tài khoản</label>
                            <input type="text" class="form-control" name="username" id="username" value="" placeholder="Tài khoản"/>
                        </div>
                        <div class="items">
                            <label for="Password" class="sr-only">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="passowd" value="" placeholder="Mật khẩu"/>
                        </div>
                        <div class="action text-center">
                            <input type="submit" class="btn btn-primary form-control" name="login" value="Login"/>
                            <a href="#" title="A link" class="btn-link btn-default">Quên mật khẩu</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

