<?php include('template_top.php'); ?>
    <div class="container">
        <!-- Start: Title -->
        <div style="padding-top: 10px;">
            <h4>รายชื่อผู้สมัคร[ทุกห้อง/ห้อง...]</h4>
        </div><!-- End: Title -->
        <form class="d-xl-flex justify-content-xl-center" style="margin-bottom: 10px;" method="get">
            <div class="input-group input-group-sm d-flex d-xl-flex justify-content-end justify-content-xl-end"><span class="input-group-text" style="color: rgb(13,12,12);border-color: rgb(0,0,0);">แสดง</span><select class="form-select" required="" style="border-color: rgb(0,0,0);" name="room" value="all">
                    <option value="1">ห้อง 1</option>
                    <option value="2">ห้อง 2</option>
                    <option value="3">ห้อง 3</option>
                    <option value="4">ห้อง 4</option>
                    <option value="5">ห้อง 5</option>
                    <option value="6">ห้อง 6</option>
                    <option value="7">ห้อง 7</option>
                    <option value="8">ห้อง 8</option>
                    <option value="9">ห้อง 9</option>
                    <option value="10">ห้อง 10</option>
                    <option value="11">ห้อง 11</option>
                    <option value="12">ห้อง 12</option>
                    <option value="all" selected="">ทุกห้อง</option>
                </select><button class="btn btn-primary" type="submit" style="border-color: rgb(0,0,0);">ตกลง</button></div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm table-bordered">
                <thead>
                    <tr class="text-center" style="background: #ffe3e3;border-bottom: 2px solid rgb(0,0,0);">
                        <th style="width: 100px;">ลำดับ</th>
                        <th>ชื้อ</th>
                        <th style="width: 100px;">ห้อง</th>
                        <th>สายการเรียนหลัก</th>
                        <th>สายการเรียนรอง</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>เด็กชาย.............</td>
                        <td class="text-center">1</td>
                        <td>sci</td>
                        <td>eng</td>
                    </tr>
                    <tr style="background: #ffffff;">
                        <td class="text-center">2</td>
                        <td>เด็กหญิง.........</td>
                        <td class="text-center">2</td>
                        <td>sci</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php include('template_bottom.php'); ?>