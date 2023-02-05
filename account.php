<?php include('template_top.php'); ?>
<?php
if (empty($_SESSION)) {
    header('Location:regis.php');
} else {
    $sid = $_SESSION['sid'];
    $sql = "SELECT `sid`, `room`, `no`, `prefix`, `f_name`, `l_name`, `GPAX`, `GAP_MAT`, `GPA_SCI`, `ungrade`, `type_code`  FROM students
    WHERE `sid` = $sid";
    $student = mysqli_fetch_object(query($sql));
    $type = $student->type_code;
}
?>
<div class="container">
    <!-- Start: Title -->
    <div style="padding-top: 10px;">
        <h4>ข้อมูลผู้สมัคร</h4>
        <div><span>ชื่อ - สกุล : </span><span><?php echo $student->prefix . $student->f_name . " " . $student->l_name; ?></span></div>
        <div><span>ห้อง : </span><span><?php echo $student->room; ?></span></div>
        <div><span>รหัสนักเรียน : </span><span><?php echo $student->sid; ?></span></div>
        <div><span>เกรดเฉลี่ย : </span><span>5 เทอม <?php echo $student->GPAX; ?></span>, <span> คณิต <?php echo $student->GAP_MAT; ?></span>, <span>วิทย์ <?php echo $student->GPA_SCI; ?></span></div>
        <div><span>ติด 0 ร มส มผ : </span> <?php echo ($student->ungrade == 0) ? '<span class="badge bg-success">ไม่มี</span>' : '<span class="badge bg-danger">มี</span>'; ?></div>
        <hr>
    </div><!-- End: Title -->
    <?php if ($student->type_code == null) { ?>
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
    <?php } else { ?>
        <!-- Start: Enroll -->
        <div>
            <h4>แผนการเรียนที่สมัคร</h4>
            <?php
            $sql = "SELECT * FROM types WHERE code = '$type'";
            $result = mysqli_fetch_object(query($sql));
            ?>
            <p style="margin: 0;"><?php echo $result->name ?></p>
            <hr>
            <p>หากต้องการเปลี่ยนแปลงแผนการเรียนให้นักเรียนส่งแบบฟอร์ม <a href="https://drive.google.com/file/d/17p5Unp99m6RwB53ny6BSSKGPxJb9n6fU/view?usp=sharing" target="_blank">นร.01.1</a> ที่ห้องวิชาการ โรงเรียนภูเขียว</p>
        <?php } ?>
        </div><!-- End: Enroll -->
</div>
<?php include('template_bottom.php'); ?>