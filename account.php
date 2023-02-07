<?php include('template_top.php'); ?>
<?php
if (empty($_SESSION)) {
    // header('Location:regis.php');
    echo '<script type="text/javascript"> window.location = "regis.php" </script>';
    die();
} else {
    $sid = $_SESSION['sid'];
    $sql = "SELECT * FROM `students` WHERE `sid` = '$sid'";
    $query = mysqli_query($mysql, $sql);
    $student = mysqli_fetch_object($query);

    $sql_type = "SELECT * FROM types WHERE code = '$student->type_code'";
    $query = mysqli_query($mysql, $sql_type);
    $result_type = mysqli_fetch_object($query);

    // $sql_type = "SELECT * FROM types";
    // $query_types = mysqli_query($mysql, $sql_type);

    // $types = array();
    // while ($row = mysqli_fetch_object($query_types)) {
    //     $types[$row->code] = $row->name;
    // }
}
?>

<div class="container">
    <!-- Start: Title -->
    <div style="padding-top: 10px;">
        <h4>ข้อมูลผู้สมัคร</h4>
        <div><span>ชื่อ - สกุล : </span><span><?php echo $student->prefix . $student->f_name . " " . $student->l_name; ?></span></div>
        <div><span>ห้อง : </span> <?php echo   '3/' . $student->room ?></span></div>
        <div><span>รหัสนักเรียน : </span><?php echo $student->sid ?></div>
        <div><span>เกรดเฉลี่ย : </span class="text-danger">5 เทอม <span class="text-danger"><?php echo $student->GPAX; ?></span>, คณิต <span class="text-danger"><?php echo $student->GPA_MAT; ?></span>, วิทย์ <span class="text-danger"><?php echo $student->GPA_SCI; ?></span></div>
        <div><span>ติด 0 ร มส มผ : </span> <?php echo ($student->ungrade == 0) ? '<span class="badge bg-success">ไม่มี</span>' : '<span class="badge bg-danger">มี</span>'; ?></div>
        <hr>
    </div><!-- End: Title -->

    <?php
    if ($student->type_code == "") {
    ?>

        <!-- Start: Intro -->
        <div>
            <h4>แนวปฏิบัติและข้อควรทราบ</h4>
            <p>.ในการสมัครเรียน (รอบโควตา) สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 3 โรงเรียนภูเขียว มีแนวปฏิบัติและข้อควรทราบ ดังนี้</p>
            <ul>
                <li>มีแผนการเรียนให้สมัครทั้งสิ้น 3 แผนการเรียน ดังนี้<ol>
                        <li>แผนการเรียนวิทยาศาสตร์ – คณิตศาสตร์</li>
                        <li>แผนการเรียนภาษาอังกฤษ – คณิตศาสตร์</li>
                        <li>แผนการเรียนการจัดการธุรกิจการค้าสมัยใหม่ : MOU CP ALL</li>
                    </ol>
                </li>
                <li>นักเรียน<strong><span style="color: rgb(255, 0, 0);">สามารถสมัครได้เพียง 1 แผนการเรียน</span></strong></li>
                <li>หากต้องการเปลี่ยนแปลงแผนการเรียนที่สมัครนักเรียนจะต้องส่งแบบฟอร์ม <a href="https://drive.google.com/file/d/17p5Unp99m6RwB53ny6BSSKGPxJb9n6fU/view?usp=sharing" target="_blank">นร.01.1</a> ที่ห้องวิชาการ โรงเรียนภูเขียว</li>
            </ul>
            <form method="post" action="pick.php">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1" name="agree" required=""><label class="form-check-label" for="formCheck-1">ข้าพเจ้ารับทราบข้อกำหนดและเงื่อนไขการสมัครเรียนรอบโควตาโรงเรียนภูเขียวดังที่ปรากฏด้านบนเรียนร้อยแล้ว</label></div>
                <div class="text-center" style="margin: 10px;"><button class="btn btn-primary" type="submit"><i class="far fa-edit"></i> สมัครเลย</button></div>
            </form>
        </div><!-- End: Intro -->
    <?php } else {  ?>
        <!-- Start: Enroll -->
        <div>
            <h4>แผนการเรียนที่สมัคร</h4>
            <p style="margin: 0;">
                <?php echo $result_type->name ?>
            <ul>
                <li>GPAX <?php echo ($result_type->min_GPAX > 0 ? " ตั้งแต่ " . $result_type->min_GPAX : ""); echo ($student->GPAX >= $result_type->min_GPAX ? " <span class='badge bg-success'>ผ่านเกณฑ์</span> " : " <span class='badge bg-danger'>ไม่ผ่านเกณฑ์</span> ");?></li>
                <li>GPA วิชาคณิตศาสตร์ <?php echo ($result_type->min_GPA_SCI > 0 ? " ตั้งแต่ " . $result_type->min_GPA_SCI : ""); echo ($student->GPA_SCI >= $result_type->min_GPA_SCI ? " <span class='badge bg-success'>ผ่านเกณฑ์</span> " : " <span class='badge bg-danger'>ไม่ผ่านเกณฑ์</span> ");?></li>
                <li>GPA วิชาคณิตศาสตร์ <?php echo ($result_type->min_GPA_MAT > 0 ? " ตั้งแต่ " . $result_type->min_GPA_MAT : ""); echo ($student->GPA_MAT >= $result_type->min_GPA_MAT ? " <span class='badge bg-success'>ผ่านเกณฑ์</span> " : " <span class='badge bg-danger'>ไม่ผ่านเกณฑ์</span> ");?></li>
                <li>ผลการเรียน ติด 0 ร มส มผ <?php echo ($student->ungrade == 0 ? " <span class='badge bg-success'>ไม่มี</span> " : " <span class='badge bg-danger'>มี</span> ");?></li>
            </ul>
            </p>
            <hr>
            <p>หากต้องการเปลี่ยนแปลงแผนการเรียนให้นักเรียนส่งแบบฟอร์ม <a href="https://drive.google.com/file/d/17p5Unp99m6RwB53ny6BSSKGPxJb9n6fU/view?usp=sharing" target="_blank">นร.01.1</a> ที่ห้องวิชาการ โรงเรียนภูเขียว</p>
        </div><!-- End: Enroll -->
    <?php } ?>
</div>
<?php include('template_bottom.php'); ?>