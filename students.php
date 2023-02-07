<?php include('template_top.php'); ?>
<?php
$room = (empty($_GET['room']) ? 0 : $_GET['room']);

if (empty($room)) {
    $sql_students = "SELECT * FROM students ORDER BY room ASC, no ASC";
} else {
    $sql_students = "SELECT * FROM students WHERE room = '" . mysqli_real_escape_string($mysql, $room) . "' ORDER BY no ASC";
}
$sql_room   = "SELECT room FROM `students` GROUP BY room ORDER BY room ASC";
$sql_types  = "SELECT * FROM types";

$query_students = mysqli_query($mysql, $sql_students);
$query_room     = mysqli_query($mysql, $sql_room);
$query_types    = mysqli_query($mysql, $sql_types);

$types = array();
while ($row = mysqli_fetch_object($query_types)) {
    $types[$row->code] = $row->name;
}
?>

<div class="container">
    <!-- Start: Title -->
    <div style="padding-top: 10px;">
        <h4>รายชื่อผู้สมัคร - <?php echo (empty($room) ? "ทุกห้อง" : "ห้อง " . $room); ?></h4>
    </div><!-- End: Title -->
    <form class="d-xl-flex justify-content-xl-center" style="margin-bottom: 10px;" method="get">
        <div class="input-group input-group-sm d-flex d-xl-flex justify-content-end justify-content-xl-end"><span class="input-group-text" style="color: rgb(13,12,12);border-color: rgb(0,0,0);">แสดง</span>
            <select class="form-select" required="" style="border-color: rgb(0,0,0);" name="room" value="all">
                <?php while ($row = mysqli_fetch_object($query_room)) { ?>
                    <option value="<?php echo $row->room ?>" <?php echo ($room == $row->room ? "selected" : ""); ?>><?php echo  'ห้อง ' . $row->room ?></option>
                <?php } ?>
                <option value="" <?php echo (empty($room) ? "selected" : ""); ?>>ทุกห้อง</option>
            </select><button class="btn btn-primary" type="submit" style="border-color: rgb(0,0,0);">ตกลง</button>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr class="text-center text-dark" style="background: #ffe3e3;border-bottom: 2px solid rgb(0,0,0);">
                    <th style="width: 100px;">ลำดับ</th>
                    <th>รหัสนักเรียน</th>
                    <th>ชื้อ</th>
                    <th style="width: 100px;">ห้อง</th>
                    <th>เลขที่</th>
                    <th>แผนการเรียน</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while ($row = mysqli_fetch_object($query_students)) {
                ?>
                    <tr class="text-black">
                        <td class="text-center"><?php echo $count ?></td>
                        <td class="text-center"><?php echo $row->sid ?></td>
                        <td><?php echo $row->prefix . $row->f_name . " " . $row->l_name ?></td>
                        <td class="text-center"><?php echo $row->room ?></td>
                        <td class="text-center"><?php echo $row->no ?></td>
                        <td><?php echo ($row->type_code == null ? " - " : $types[$row->type_code]); ?></td>
                    </tr>
                <?php
                    $count++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('template_bottom.php'); ?>