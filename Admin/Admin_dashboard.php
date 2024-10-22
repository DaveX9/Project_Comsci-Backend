<?php 
include('C:/xampp/htdocs/Project_Comsci/User/process2.php');
$username = " Sahadev";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header bar</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/PROJECT_COMSCI/Admin/CSS/Admin.css">
    <link rel="shortcut icon" href="/picture/logofavicon.ico" type="image/x-icon">
</head>
<body>

   
    <nav class="sidebar">
        <ul>
            <li><a href="Admin03.html"><img src="/PROJECT_COMSCI/picture/logo-sa.png" alt="" class="image-logo"></a></li>
            <li><a href="#"><h1><span id="admin-name">Admin:<?php echo $username; ?></span></h1></a></li>
            <li><a href="Admin03.html"><img src="/PROJECT_COMSCI/picture/dashboard.png" alt="dashboard icon" class="image-icon"><span>Dashboard</span></a></li>
            <li><a href="/Project Comsci/Admin/Patient/PatientDataPage.html"><img src="/PROJECT_COMSCI/picture/patient-icon.png" alt="" class="image-icon"><span>ข้อมูลผู้ป่วย</span></a></li>
            <li><a href="PersonalDataPage.html"><img src="/PROJECT_COMSCI/picture/personel.png" alt="" class="image-icon"><span>ข้อมูลส่วนตัว</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/medicine.png" alt="" class="image-icon"><span>ยา</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/doctor.png" alt="" class="image-icon"><span>นัดหมอ</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/newspaper.png" alt="" class="image-icon"><span>แก้ไขข่าวสาร</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/medical-case.png" alt="" class="image-icon"><span>คำขอยืมกระเป๋าพยาบาล</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/report.png" alt="" class="image-icon"><span>รายงาน</span></a></li>
            <li><a href="setting.html"><img src="/PROJECT_COMSCI/picture/tools.png" alt="" class="image-icon"><span>การตั้งค่า</span></a></li>
            <li><a href="logout.php"><img src="/PROJECT_COMSCI/picture/logout.png" alt="" class="image-icon"><span>ออกจากระบบ</span></a></li>
        </ul>
    </nav>

    <nav class="navbar">
        <ul>
            <li><img src="/PROJECT_COMSCI/picture/menu.png" alt="Menu" class="menu-icon" onclick="toggleSidebar()"></li>
            <li style="margin-left:auto;">
                <img src="/PROJECT_COMSCI/picture/Serach-icon.png" alt="Search" class="search-icon">
                <img src="/PROJECT_COMSCI/picture/notification.png" alt="Notification" class="notification-icon">
                <img src="/PROJECT_COMSCI/picture/customize.png" alt="Customize" class="customize-icon" onclick="toggleToolbar()">
            </li>
        </ul>
    </nav>

    <section>
        <div class="customize-toolbar" id="customize-toolbar">
            <h2>เครื่องมือปรับแต่งเว็บไซต์</h2>
            <span class="close-button" onclick="closeToolbar()">&times;</span>
            <div class="toolbar-section">
                <h3>ประเภท Widget</h3>
                <label><input type="checkbox"> Widget ข้อความ</label><br>
                <label><input type="checkbox"> Widget กราฟ</label><br>
                <label><input type="checkbox"> Widget ตาราง</label>
            </div>
            <div class="toolbar-section">
                <h3>ประเภทเครื่องมือกราฟ</h3>
                <label><input type="checkbox"> กราฟแท่ง</label><br>
                <label><input type="checkbox"> KPI</label><br>
                <label><input type="checkbox"> กราฟเส้น</label><br>
                <label><input type="checkbox"> เกจ</label><br>
                <label><input type="checkbox"> กราฟโดนัท</label><br>
                <label><input type="checkbox"> กราฟพื้นที่</label><br>
                <label><input type="checkbox"> กราฟวงกลม</label><br>
                <label><input type="checkbox"> การผสมกราฟ</label><br>
                <label><input type="checkbox"> กราฟแท่งแบบต่อกัน</label>
            </div>
            <div class="toolbar-section">
                <h3>ชุดข้อมูล</h3>
                <label><input type="checkbox"> รายงานข้อมูลการใช้อุปกรณ์</label><br>
                <label><input type="checkbox"> รายงานข้อมูลการพบแพทย์</label><br>
                <label><input type="checkbox"> รายงานการเบิกจ่าย</label><br>
                <label><input type="checkbox"> รายงานสถิติการใช้บริการ</label><br>
                <button>เพิ่มไฟล์สำหรับแสดงข้อมูล</button><br>
                <button>เพิ่ม/ลบ/แก้ไข ข้อมูลรายงาน</button>
            </div>
            <div class="toolbar-section">
                <h3>โหมด</h3>
                <label><input type="checkbox" id="light-mode-toggle"> โหมดสว่าง</label>
                <label><input type="checkbox" id="dark-mode-toggle"> โหมดมืด</label>
            </div>
            <div class="toolbar-section">
                <button onclick="saveSettings()">บันทึก</button>
                <button onclick="cancelSettings()">ยกเลิก</button>
                <button onclick="resetSettings()">รีเซต</button>
            </div>
        </div>
    </section>
    <script src="/PROJECT_COMSCI/Admin/JS/Admin.js"></script>
</body>
</html>
