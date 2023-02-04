<?php include('template_top.php'); ?>
    <div class="d-flex align-items-center" id="regis" style="min-height: 50vh;padding-top: 10px;padding-bottom: 10px;">
        <div class="container" data-aos="fade-up" style="max-width: 400px;border-color: var(--red);">
            <div class="text-center"><img src="assets/img/logo%20square.png" width="100" height="100"></div>
            <h3 class="text-center" style="margin-top: 10px;">เข้าสู่ระบบ</h3>
            <form method="post">
                <!-- Start: Fields -->
                <div style="margin-bottom: 10px;">
                    <fieldset>
                        <legend class="fs-5" style="margin-top: 5px;">เลขประจำตัวนักเรียน</legend><input class="form-control" type="text" style="border-width: 2px;border-color: rgb(0,0,0);color: rgb(0,0,0);border-radius: 0px;box-shadow: 3px 3px rgba(242,107,138,0.45);" name="sid" placeholder="ระบุรหัสนักเรียน" pattern="[0-9]{5,5}" minlength="5" maxlength="5" required="">
                    </fieldset>
                    <fieldset>
                        <legend class="fs-5" style="margin-top: 5px;">เลขประจำตัวประชาชน</legend><input class="form-control" type="text" style="border-width: 2px;border-color: rgb(0,0,0);color: rgb(0,0,0);border-radius: 0px;box-shadow: 3px 3px rgba(242,107,138,0.45);" name="sid" placeholder="ระบุรหัสนักเรียน" pattern="[0-9]{5,5}" minlength="5" maxlength="5" required="">
                    </fieldset>
                </div><!-- End: Fields -->
                <!-- Start: Button -->
                <div class="text-end d-flex justify-content-end"><a class="btn btn-success" role="button" data-aos="zoom-in" data-aos-delay="300" href="account.php"><i class="far fa-check-circle"></i>&nbsp;ตกลง</a><button class="btn btn-warning" data-aos="fade" data-aos-delay="600" type="reset" style="margin-left: 10px;"><i class="far fa-times-circle"></i>&nbsp;ยกเลิก</button></div><!-- End: Button -->
            </form>
        </div>
    </div>
<?php include('template_bottom.php'); ?>