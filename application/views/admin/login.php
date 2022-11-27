<style>
html, body{
    /*background: #1b1c1b;*/
    background-color: #1b1c1b;
    background-image: url(<?php echo base_url().'assets/images/login-backdrop.jpg' ?>);
    /*background-size: cover;*/
    background-repeat: no-repeat;
    background-position: center top;
    background-blend-mode: difference;
}
.login-h-img{
    margin: auto;
    margin-left: -200px;
    /*background: #fff;*/
    height: 500px;
    background: url(<?php echo base_url().'assets/images/login-side.jpg' ?>);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}

    </style>
    
        <div class=""> 
        <div class="row">
            <!-- <div class="col-lg-3 col-md-2"></div> -->
            <div class="col-lg-12 col-md-12 login-fl">
            <div class="col-lg-5 col-md-5 login-box">
                <div class="login-box1">
                <!-- <div class="col-lg-12 login-title">
                    <h2>LOGIN</h2>
                </div> -->
                <?php if($this->session->flashdata('Login_Failed')){ ?>
                    <div class="col-lg-12 login-title login_valid">
                        <p><?php echo $this->session->flashdata('Login_Failed'); ?></p>
                    </div>
                <?php } ?>
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <div style="text-align: center;font-size: 20px;color: red;padding-bottom: 20px;">
                            <?php echo $this->session->flashdata('login_res');  ?>
                        </div>
                        <?php
                            if(!empty($success_msg)){
                                echo '<p class="alert alert-success">'.$success_msg.'</p>';
                            } elseif(!empty($error_msg)){ 
                                echo '<p class="alert alert-danger">'.$error_msg.'</p>';
                            }
                        ?>
                        <?php if(!empty(validation_errors())){ echo "<div class='alert alert-danger'>".validation_errors().'</div>'; } ?>
                        <form method="post" action="<?=base_url();?>login_process" id="login_form">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="password" name="password" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                
                                <div class="col-lg-12 login-btm login-button">
                                    <input type="submit" value="submit" class="btn btn-outline-primary" name="loginSubmit">
                                </div>
                                <!-- <div class="register_btn">
                                    <a href="<?=base_url();?>register">Register here</a>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-2"></div> -->
            </div>
            </div>
            <div class="col-lg-10 col-md-10 login-h-img">
                <!-- <img src="https://images.wallpaperscraft.com/image/cube_shape_3d_144105_1920x1080.jpg" alt=""> -->
            </div>
        </div>
        </div>
    </div>
