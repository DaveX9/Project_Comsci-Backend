<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลผู้ใช้</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            transition: background-color 0.3s;
        }
        /**************start sidebar***************/
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #003366;
            color: white;
            padding: 10px 0;
            box-sizing: border-box;
            transition: width 0.3s;
        }

        .sidebar.collapsed {
            width: 60px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul a {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            padding: 10px 10px;
            transition: background-color 0.3s;
        }

        .sidebar ul a:hover {
            background-color: #0055a5;
        }

        .sidebar h1 {
            font-size: 20px;
            text-align: center;
            margin-bottom: 10px;
        }

        .sidebar ul a:first-child {
            margin-bottom: 5px;
            padding: 5px 10px;
        }

        .image-icon {
            height: 40px;
            width: 40px;
            margin-right: 10px;
        }

        .image-logo {
            max-width: 150px;
            margin: 10px 10px;
            height: auto;
            transition: max-width 0.3s, margin 0.3s;
        }

        .sidebar.collapsed .image-logo {
            max-width: 40px;
            margin: 0 auto;
        }
        /**************End sidebar*****************/
        .navbar {
            position: fixed;
            top: 0;
            left: 200px;
            width: calc(100% - 200px);
            height: 50px;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
            transition: left 0.3s, width 0.3s;
        }

        .navbar ul {
            list-style-type: none;
            display: flex;
            padding: 0;
            margin: 0;
            width: 100%;
            align-items: center;
        }

        .navbar li {
            display: inline;
        }

        .navbar .menu-icon {
            margin-right: auto;
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        .navbar .search-icon,
        .navbar .notification-icon,
        .navbar .customize-icon {
            width: 24px;
            height: 24px;
            margin-left: 20px;
            cursor: pointer;
        }
    /****************End navbar************************/
        .customize-toolbar {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100%;
            background-color: #ffffff;
            box-shadow: -2px 0 5px rgba(0,0,0,0.5);
            transition: right 0.3s;
            padding: 20px;
            box-sizing: border-box;
            overflow-y: auto;
        }

        .customize-toolbar.active {
            right: 0;
        }

        .toolbar-section {
            margin-bottom: 20px;
        }

        .toolbar-section h3 {
            margin-top: 0;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .toolbar-section label {
            display: block;
            margin-bottom: 10px;
        }

        .dark-mode {
            background-color: #2c2c2c;
            color: #ffffff;
        }

        .dark-mode .sidebar {
            background-color: #1a1a1a;
        }

        .dark-mode .navbar {
            background-color: #333333;
        }

        .dark-mode .widget {
            background-color: #3a3a3a;
            color: #ffffff;
        }

        .dark-mode .customize-toolbar {
            background-color: #444444;
            color: #ffffff;
        }

        .content {
            margin-top: 60px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
            flex: 1;
            display: flex;
            gap: 10px; /* Adjust gap between widgets */
            justify-content: space-around; /* Align widgets space around horizontally */
            align-items: flex-start;
            flex-wrap: wrap;
        }

        
        canvas {
            max-width: 100%;
            height: auto;
        }


        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }

            .sidebar.collapsed {
                width: 60px;
            }

            .sidebar.collapsed span {
                display: none;
            }

            .navbar {
                left: 60px;
                width: calc(100% - 60px);
            }

            .main-content {
                margin-left: 60px;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .navbar .search-icon,
            .navbar .notification-icon,
            .navbar .customize-icon {
                display: none;
            }
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        form {
            display: flex;
            flex-wrap: wrap;
        }
        
        .form-row {
            display: flex;
            width: 100%;
            margin-bottom: 10px;
        }
        
        .form-group {
            flex: 1;
            margin-right: 10px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        
        .form-group.full-width {
            flex: 100%;
            margin-right: 0;
        }
        
        textarea {
            height: 100px;
        }
        
        .buttons {
            display: flex;
            width: 100%;
            justify-content: flex-end;
            margin-top: 20px;
        }
        
        .buttons button {
            margin-left: 10px;
            padding: 10px 20px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
        
            main {
                margin-left: 0;
                width: 100%;
            }
        
            .form-row {
                flex-direction: column;
            }
        
            .form-group {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
        section{
            position: fixed;
        }
        .form-data{
            margin-left: 225px;
            margin-right: 20px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li><a href="Admin03.html"><img src="/โฟลเดอร์ใหม่/Project Comsci/picture/logo-sa.png" alt="" class="image-logo"></a></li>
                <li><a href="#"><h1><span id="admin-name">Admin: </span></h1></a></li>
                <li><a href="Admin03.html"><img src="/โฟลเดอร์ใหม่/picture/dashboard.png" alt="dashboard icon" class="image-icon"><span>Dashboard</span></a></li>
                <li><a href="/Project Comsci/Admin/Patient/PatientDataPage.html"><img src="/โฟลเดอร์ใหม่/picture/patient-icon.png" alt="" class="image-icon"><span>ข้อมูลผู้ป่วย</span></a></li>
                <li><a href="PersonalDataPage.html"><img src="/โฟลเดอร์ใหม่/picture/personel.png" alt="" class="image-icon"><span>ข้อมูลส่วนตัว</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/medicine.png" alt="" class="image-icon"><span>ยา</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/doctor.png" alt="" class="image-icon"><span>นัดหมอ</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/newspaper.png" alt="" class="image-icon"><span>แก้ไขข่าวสาร</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/medical-case.png" alt="" class="image-icon"><span>คำขอยืมกระเป๋าพยาบาล</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/report.png" alt="" class="image-icon"><span>รายงาน</span></a></li>
                <li><a href="setting.html"><img src="/โฟลเดอร์ใหม่/picture/tools.png" alt="" class="image-icon"><span>การตั้งค่า</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/logout.png" alt="" class="image-icon"><span>ออกจากระบบ</span></a></li>
            </ul>
        </nav>
        <nav class="navbar">
            <ul>
                <li><img src="/โฟลเดอร์ใหม่/picture/menu.png" alt="Menu" class="menu-icon" onclick="toggleSidebar()"></li>
                <li style="margin-left:auto;">
                    <img src="/โฟลเดอร์ใหม่/picture/Serach-icon.png" alt="Search" class="search-icon">
                    <img src="/โฟลเดอร์ใหม่/picture/notification.png" alt="Notification" class="notification-icon">
                    <img src="/โฟลเดอร์ใหม่/picture/customize.png" alt="Customize" class="customize-icon" onclick="toggleToolbar()">
                </li>
            </ul>
        </nav>
        <section class="form-data">
            <h1>ข้อมูลผู้นักศึกษา/อาจารย์/บุคลากร</h1>
            <form>
                <div class="form-row">
                    <div class="form-group">
                        <label for="title">คำนำหน้า</label>
                        <select id="title">
                            <option>นาย</option>
                            <option>นางสาว</option>
                            <option>นาง</option>
                            <option>โปรดระบุ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="first-name">*ชื่อ(ต้องกรอก)</label>
                        <input type="text" id="first-name" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">*นามสกุล(ต้องกรอก)</label>
                        <input type="text" id="last-name" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">*เพศ(ต้องกรอก)</label>
                        <select id="gender">
                            <option>ชาย</option>
                            <option>หญิง</option>
                            <option>ไม่ระบุ</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="id-number">*เลขบัตรประจำตัวประชาชน</label>
                        <input type="text" id="id-number" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">*เบอร์โทรศัพท์(ต้องกรอก)</label>
                        <input type="tel" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">*วันเดือนปีเกิด</label>
                        <input type="date" id="dob" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="faculty">*คณะ/สำนัก/หน่วยงาน(ต้องกรอก)</label>
                        <select id="faculty" onchange="populateDepartments()" required>
                            <option value="">เลือกหน่วยงาน</option>
                            <option value="science">วิทยาศาสตร์และเทคโนโลยี</option>
                            <option value="education">ครุศาสตร์</option>
                            <option value="management">วิทยาการจัดการ</option>
                            <option value="humanities">มนุษยศาสตร์และสังคมศาสตร์</option>
                            <option value="engineering">วิศวกรรมศาสตร์และเทคโนโลยีอุตสาหกรรม</option>
                            <option value="music">วิทยาลัยการดนตรี</option>
                            <option value="graduate">บัณฑิตวิทยาลัย</option>
                            <option value="satit">โรงเรียนสาธิต มบส.</option>
                            <option value="uthong">ศูนย์การศึกษาอู่ทองทวารวดี</option>
                            <option value="administration">สำนักงานอธิการบดี</option>
                            <option value="confucius">สถาบันขงจื้อ</option>
                            <option value="academic">สภาวิชาการ</option>
                            <option value="faculty-council">สภาคณาจารย์และข้าราชการ</option>
                            <option value="other">อื่นๆ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="department">*สาขา/งาน</label>
                        <select id="department" required>
                            <option value="">กรุณาเลือกคณะ/สำนัก/หน่วยงานก่อน</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">อีเมล</label>
                        <input type="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="blood-type">*หมู่โลหิต(ต้องกรอก)</label>
                        <select id="blood-type">
                            <option>A</option>
                            <option>B</option>
                            <option>O</option>
                            <option>AB</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="allergies">*แพ้อาหาร (ถ้าไม่มีให้กรอก ( - ) หรือไม่มี -ต้องกรอก)</label>
                        <input type="text" id="allergies" required>
                    </div>
                    <div class="form-group">
                        <label for="med-allergies">*แพ้ยา (ถ้าไม่มีให้กรอก ( - ) หรือไม่มี -ต้องกรอก)</label>
                        <input type="text" id="med-allergies" required>
                    </div>
                </div>
                <div class="form-group full-width">
                    <label for="address">*ที่อยู่(ต้องกรอก)</label>
                    <textarea id="address" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="insurance">*สิทธิการรักษา</label>
                        <select id="insurance">
                            <option>สิทธิสำหรับประกันสุขภาพแห่งชาติ</option>
                            <option>สิทธิประกันสังคม</option>
                            <option>สิทธิข้าราชการ</option>
                            <option>อื่นๆ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="emergency-contact">บุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน*</label>
                        
                    
                    
                        <label for="contact-first-name">ชื่อ*</label>
                        <input type="text" id="contact-first-name" required>
                    
                    
                        <label for="contact-last-name">นามสกุล*</label>
                        <input type="text" id="contact-last-name" required>
                    
                    
                        <label for="contact-phone">เบอร์โทร*</label>
                        <input type="tel" id="contact-phone" required>
                    </div>
                </div>
                <div class="buttons">
                    <button type="reset">ลบ</button>
                    <button type="button">แก้ไข</button>
                    <button type="submit">บันทึก</button>
                </div>
            </form>
        </section>
    </div>

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
    <script>
        
        const departments = {
            "science": [
                "เทคนิคการแพทย์",
                "การแพทย์แผนไทย",
                "สาธารณสุขศาสตร์",
                "วิทยาศาสตร์การแพทย์",
                "สมุนไพรและกัญชาศาสตร์",
                "อาชีวอนามัยและความปลอดภัย",
                "วิทยาการธุรกิจสุขภาพและความงาม",
                "ชีววิทยาการแพทย์",
                "เทคโนโลยีสุขภาพ",
                "วิทยาการคอมพิวเตอร์",
                "แอนิเมชัน เกม และดิจิทัลมีเดีย",
                "เทคโนโลยีสารสนเทศและวิทยาการข้อมูล",
                "เทคโนโลยีการอาหาร",
                "เทคโนโลยีการเกษตร",
                "การจัดการทรัพยากรธรรมชาติและสิ่งแวดล้อม"
            ],
            "education": [
                "วัดผลการศึกษาและการสอนคณิตศาสตร์",
                "สังคมศึกษา(ค.บ.)",
                "นาฏยศิลป์ศึกษา(ค.บ.)",
                "จิตวิทยาและการแนะแนว",
                "เทคโนโลยีดิจิทัลเพื่อการศึกษา",
                "พลศึกษา",
                "การประถมศึกษา",
                "วิทยาศาสตร์ทั่วไป",
                "การศึกษาปฐมวัย",
                "ศิลปศึกษา",
                "คณิตศาสตร์(ค.บ.)",
                "คอมพิวเตอร์ศึกษา(ค.บ.)",
                "ชีววิทยา(ค.บ.)",
                "ภาษาอังกฤษ(ค.บ.)",
                "ภาษาไทย(ค.บ.)"
            ],
            "management": [
                "การสื่อสารการตลาดและธุรกิจบันเทิง",
                "การสื่อสารดิจิทัลคอนเทนต์",
                "บรอดคาสติงและสื่อสตรีมมิง",
                "ภาพยนตร์",
                "การจัดการโลจิสติกส์และโซ่อุปทาน",
                "การตลาดดิจิทัลเชิงสร้างสรรค์",
                "การจัดการธุรกิจและทรัพยากรมนุษย์",
                "การเป็นผู้ประกอบการ",
                "ธุรกิจดิจิทัล",
                "การบัญชี",
                "นวัตกรรมการท่องเที่ยว",
                "นวัตกรรมทางเศรษฐกิจ การเงินและการลงทุน",
                "การจัดการธุรกิจระหว่างประเทศ (นานาชาติ)"
            ],
            "humanities": [
                "นาฏยศาสตร์การแสดง",
                "ครีเอทีฟกราฟิก",
                "ภาษาจีน",
                "ภาษาไทย",
                "ภาษาและวัฒนธรรมเอเชียตะวันออก (เกาหลี)",
                "ภาษาและวัฒนธรรมเอเชียตะวันออก (ญี่ปุ่น)",
                "ภาษาอังกฤษ",
                "สังคมศาสตร์เพื่อการพัฒนา",
                "นิติศาสตร์บัณฑิต",
                "รัฐประศาสนศาสตร์"
            ],
            "engineering": [
                "เทคโนโลยีโลจิสติกส์",
                "ออกแบบและพัฒนาผลิตภัณฑ์",
                "การประกอบและบริการอาหาร",
                "วิศวกรรมอุตสาหการและการจัดการโซ่อุปทาน",
                "วิศวกรรมพลังงาน",
                "วิศวกรรมไฟฟ้าและระบบควบคุมอัตโนมัติ",
                "การจัดการวิศวกรรมการผลิตและโลจิสติกส์ (การจัดการผลิตและคุณภาพ)",
                "การจัดการวิศวกรรมการผลิตและโลจิสติกส์ (การจัดการคลังสินค้า)",
                "การจัดการวิศวกรรมการผลิตและโลจิสติกส์ (การจัดการดิจิทัลโลจิสติกส์)",
                "เทคโนโลยีวิศวกรรมออโตเมชัน",
                "เทคโนโลยีการจัดการอุตสาหกรรม (ต่อเนื่อง)"
            ],
            "music": [
                "เทคโนโลยีและนวัตกรรมการผลิตดนตรี",
                "ดนตรีไทย (ดศ.บ.)",
                "ดนตรีตะวันตก (ดศ.บ.)",
                "ดนตรีตะวันตกศึกษา(ค.บ.)",
                "ดนตรีไทยศึกษา(ค.บ.)"
            ],
            "graduate": [
                "วิชาการบริหารการศึกษา",
                "สาขาวิชาดนตรีศึกษา",
                "สาขาวิชาจิตวิทยาการปรึกษา",
                "สาขาวิชาหลักสูตรและการสอน",
                "การจัดการศึกษาและนวัตกรรมการจัดการเรียนรู้",
                "การจัดการภาครัฐสมัยใหม่",
                "สาขาวิชาการบริหารเทคโนโลยีและนวัตกรรม",
                "การสอนภาษาอังกฤษเป็นภาษาสากล",
                "ผลิตภัณฑ์สมุนไพร กัญชงและกัญชา",
                "เภสัชกรรมไทย",
                "ภาษาไทย",
                "บริหารธุรกิจมหาบัณฑิต (หลักสูตรนานาชาติ)",
                "ศิลปศึกษา",
                "การจัดการเทคโนโลยีดิจิทัลเพื่อการศึกษา",
                "การจัดการศึกษาเพื่อการพัฒนาที่ยั่งยืน",
                "การบริหารเทคโนโลยีและนวัตกรรม",
                "ดนตรีศึกษา",
                "หลักสูตรและการสอน",
                "นวัตกรรมการจัดการการสื่อสาร",
                "การบริหารการศึกษา",
                "เภสัชกรรมไทย",
                "บริหารธุรกิจดุษฎีบัณฑิต (หลักสูตรนานาชาติ)"
            ]
        };
        
        function populateDepartments() {
            const facultySelect = document.getElementById("faculty");
            const departmentSelect = document.getElementById("department");
            const selectedFaculty = facultySelect.value;
        
            // Clear previous options
            departmentSelect.innerHTML = '<option value="">กรุณาเลือกคณะ/สำนัก/หน่วยงานก่อน</option>';
        
            if (departments[selectedFaculty]) {
                departments[selectedFaculty].forEach(department => {
                    const option = document.createElement("option");
                    option.value = department;
                    option.textContent = department;
                    departmentSelect.appendChild(option);
                });
            }
        }
        
        let isSidebarCollapsed = false;
        let isToolbarActive = false;
        let isDarkMode = false;

        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const navbar = document.querySelector('.navbar');
            isSidebarCollapsed = !isSidebarCollapsed;
            sidebar.classList.toggle('collapsed');
            if (isSidebarCollapsed) {
                navbar.style.left = '60px';
                navbar.style.width = 'calc(100% - 60px)';
                document.querySelectorAll('.sidebar ul a span').forEach(item => {
                    item.style.display = 'none';
                });
            } else {
                navbar.style.left = '200px';
                navbar.style.width = 'calc(100% - 200px)';
                document.querySelectorAll('.sidebar ul a span').forEach(item => {
                    item.style.display = 'inline';
                });
            }
        }

        function toggleToolbar() {
            const toolbar = document.getElementById('customize-toolbar');
            isToolbarActive = !isToolbarActive;
            toolbar.classList.toggle('active');
        }

        function closeToolbar() {
            const toolbar = document.getElementById('customize-toolbar');
            isToolbarActive = false;
            toolbar.classList.remove('active');
        }

        function saveSettings() {
            alert('บันทึกค่าล่าสุด');
            toggleToolbar();
        }

        function cancelSettings() {
            alert('กลับไปหน้าเดิม');
            closeToolbar();
        }

        function resetSettings() {
            alert('กลับไปค่า default');
        }

        function checkScreenSize() {
            if (window.innerWidth <= 768 && !isSidebarCollapsed) {
                toggleSidebar();
            } else if (window.innerWidth > 768 && isSidebarCollapsed) {
                toggleSidebar();
            }
        }

        document.querySelectorAll('.sidebar ul a').forEach(item => {
            item.addEventListener('click', event => {
                if (isSidebarCollapsed) {
                    event.preventDefault();
                    toggleSidebar();
                }
            });
        });

        function editWidget(widgetId) {
            const widget = document.getElementById(widgetId);
            const widgetContent = widget.querySelector('p').textContent;
            const newContent = prompt('Enter new content:', widgetContent);
            if (newContent !== null) {
                widget.querySelector('p').textContent = newContent;
            }
        }
        

        fetch('get_user.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('admin-name').textContent += data.name;
            })
            .catch(error => console.error('Error:', error));

        window.addEventListener('resize', checkScreenSize);
        document.addEventListener('DOMContentLoaded', checkScreenSize);

        document.getElementById('dark-mode-toggle').addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('dark-mode');
                isDarkMode = true;
                document.getElementById('light-mode-toggle').checked = false;
            } else {
                document.body.classList.remove('dark-mode');
                isDarkMode = false;
                document.getElementById('light-mode-toggle').checked = true;
            }
        });

        document.getElementById('light-mode-toggle').addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.remove('dark-mode');
                isDarkMode = false;
                document.getElementById('dark-mode-toggle').checked = false;
            } else {
                document.body.classList.add('dark-mode');
                isDarkMode = true;
                document.getElementById('dark-mode-toggle').checked = true;
            }
        });
    </script>
    
</body>
</html>
