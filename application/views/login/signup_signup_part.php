<!--=============================================
                  Signup part start
    ==============================================-->
    <section id="claim_part" class="client_bg client_bg2 sign_form_part">
        <div class="container text-center">
            <div class="row flow_sha d-none d-md-block">
                <div class="col-lg-12">
                    <div class="game_flow">
                        <div class="row m-0">
                            <div class="col-md-4 border_shadow">
                                <div class="game_text">
                                    <h2><span>0</span><span>1</span></h2>
                                    <h3>สมัครสมาชิก</h3>
                                    <p>สมัครง่าย ใช้เวลาเพียง 1 นาที</p>
                                </div>
                            </div>
                            <div class="col-md-4 border_shadow">
                                <div class="game_text">
                                    <h2>02</h2>
                                    <h3>ฝากเงิน</h3>
                                    <p>ฝากได้หลายช่องทาง เงินเข้าทันที</p>
                                </div>
                            </div>
                            <div class="col-md-4 border_shadow">
                                <div class="game_text">
                                    <h2>03</h2>
                                    <h3>สร้างผลกำไร</h3>
                                    <p>สร้างกำไรง่ายๆได้ทันที</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flow_sha d-md-none">
                <div class="col-lg-12">
                    <div class="game_flow">
                        <div class="row flow_slider">
                            <div class="col-lg-12 border_shadow">
                                <div class="game_text">
                                    <h2><span>0</span><span>1</span></h2>
                                    <h3>สมัครสมาชิก</h3>
                                    <p>สมัครง่าย ใช้เวลาเพียง 1 นาที</p>
                                </div>
                            </div>
                            <div class="col-lg-12 border_shadow">
                                <div class="game_text">
                                    <h2>02</h2>
                                    <h3>ฝากเงิน</h3>
                                    <p>ฝากได้หลายช่องทาง เงินเข้าทันที</p>
                                </div>
                            </div>
                            <div class="col-lg-12 border_shadow">
                                <div class="game_text">
                                    <h2>03</h2>
                                    <h3>สร้างผลกำไร</h3>
                                    <p>สร้างกำไรง่ายๆได้ทันที</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row signup_form_pad" style="margin-top: 30px;">
                <div class="col-lg-7 offset-lg-5">
                    <div class="main_signup">
                        <h2 style="color: red;"><?php echo $msg; ?></h2><br>
                        <h4>สมัครสมาชิก</h4>
                        <p style="margin-top: 15px;">สะดวก รวดเร็ว ทำกำไรได้ทันที</p>
                        <form id="form_signup" method="POST" action="<?php echo base_url(); ?>Login/signup_do">
                            <div class="signup_inner" style="padding-top:30px;">
                                
                                    <!--
                                    <div class="col sign_input_inner">
                                        <input type="text" placeholder="your full name">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    -->
                                <div class="sign_input_inner">
                                    <input type="text" id="txt_username" name="username" placeholder="โปรดระบุชื่อผู้ใช้งาน" required>
                                    <i class="fas fa-user"></i>
                                </div>
                                
                                <div class="sign_input_inner">
                                    <input type="email" id="txt_user_email" name="user_email" placeholder="โปรดระบุ e-mail ของคุณ" required>
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="sign_input_inner">
                                    <input type="password" id="txt_password" name="password" id="txt_password" placeholder="โปรดระบุรหัสผ่าน" required>
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="sign_input_inner">
                                    <input type="password" id="txt_repassword" placeholder="โปรดกรอกรหัสผ่านอีกครั้ง" required>
                                    <i class="fas fa-lock"></i>
                                </div>
                                <button type="button" onclick="valid_data()">สมัคร</button>
                                <p>เป็นสมาชิกอยู่แล้ว? <a href="<?php echo base_url(); ?>Login">เข้าสู่ระบบ</a></p>
                                <!--
                                <h6>
                                    <span>หรือลงทะเบียนสมาชิกด้วย</span>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-google"></i></a>
                                </h6>
                                -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=============================================
                    Signup part end
    ===========================================   -->