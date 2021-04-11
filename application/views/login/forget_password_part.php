<!--=============================================
                  Login Forget part start
    ==============================================-->
    <section id="claim_part" class="client_bg client_bg2 sign_form_part login_form_part" style="padding-top: 0px; padding-left: 30px; padding-right:30px;">
            <div class="row signup_form_pad log_form_pad" style="margin-top: 0px; padding-top: 0px; padding-left: 30px; padding-right:30px;">
                <div class="col-lg-7 offset-lg-5" style="margin-top: 0px;padding-top: 0px;">
                    <div class="main_signup login_main">
                        <h2 style="color: red;"><?php echo $msg; ?></h2>
                        <!-- <h4>เข้าสู่ระบบ</h4> -->
                        <form method="POST" action="<?php echo base_url(); ?>Login/forget_password_do">
                            <div class="signup_inner log_inner">
                                <div class="sign_input_inner">
                                    <input type="email" id="txt_user_email" name="user_email" placeholder="โปรดระบุ e-mail ของคุณ" required>
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <button type="submit" onclick="valid_data()">กู้รหัสผ่าน</button>
                                <p class="log_acc_yet">ยังไม่ได้เป็นสมาชิก? <a href="<?php echo base_url(); ?>Login/signup">สมัครสมาชิก</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=============================================
                    Login Forget part end
    ===========================================   -->