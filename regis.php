<?php include('template_top.php'); ?>
<?php
if (!empty($_SESSION)) {
    // header('Location:account.php');
    echo '<script type="text/javascript"> window.location = "account.php" </script>';
    die();
}
?>
<div class="d-flex align-items-center" id="regis" style="min-height: 50vh;padding-top: 10px;padding-bottom: 15px;">
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
                    <legend class="fs-5" style="margin-top: 5px;">เลขประจำตัวประชาชน</legend><input class="form-control" type="text" style="border-width: 2px;border-color: rgb(0,0,0);color: rgb(0,0,0);border-radius: 0px;box-shadow: 3px 3px rgba(242,107,138,0.45);" name="cid" placeholder="เลขประจำตัวประชาชน" pattern="[0-9]{13,13}" minlength="13" maxlength="13" required="">
                </fieldset>
            </div><!-- End: Fields -->
            <div class="text-center pt-2 pb-3 text-danger">
                <?php
                if (count($_POST) > 0) {
                    $sid = $_POST['sid'];
                    $cid = $_POST['cid'];
                    $sql = "SELECT * FROM students WHERE `sid` = " . mysqli_real_escape_string($mysql, $sid) . " AND `cid` = " . mysqli_real_escape_string($mysql, $cid);

                    $result = mysqli_query($mysql, $sql);
                    if ($result->num_rows > 0) {
                        $_SESSION['sid'] = $_POST['sid'];
                        session_write_close();
                        echo '<script type="text/javascript"> window.location = "account.php" </script>';
                    } else {
                        echo 'รหัสนักเรียน หรือรหัสประชาชนไม่ถูกต้อง';
                    }
                }
                ?>
            </div>
            <!-- Start: Button -->
            <div class="text-end d-flex justify-content-end"><button class="btn btn-success" type="submit" role="button" data-aos="zoom-in" data-aos-delay="300"><i class="far fa-check-circle"></i>&nbsp;ตกลง</button><button class="btn btn-warning" data-aos="fade" data-aos-delay="600" type="reset" style="margin-left: 10px;"><i class="far fa-times-circle"></i>&nbsp;ยกเลิก</button></div><!-- End: Button -->
        </form>
    </div>
</div>


<?php include('template_bottom.php'); ?>