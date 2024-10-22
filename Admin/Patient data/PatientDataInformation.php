<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Project_Comsci/Admin/CSS/Admin.css">
    <style>
        .content {
            margin-top: 60px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-left: 200px;
            transition: margin-left 0.3s;
        }
        .content.collapsed {
            margin-left: 60px;
        }

                /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Layout and Container */
        .patient-info-form {
            width: 70%;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .personal-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .personal-details div {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #666;
            font-size: 14px;
        }

        input[type="text"],
        textarea,
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #fff;
            width: 100%;
        }

        textarea {
            resize: none;
            height: 60px;
        }

        /* Dropdown Menu */
        .medical-records {
            margin-top: 30px;
        }

        #records-dropdown {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            margin-bottom: 10px;
        }

        #record-content {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            min-height: 100px;
            color: #666;
        }

        /* Hospital History Table */
        .hospital-history {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f0f0f0;
            color: #333;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr td {
            color: #666;
        }

        /* Buttons */
        .buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            margin-left: 10px;
        }

        button[type="reset"] {
            background-color: #ff5c5c;
            color: #fff;
        }

        button[type="button"] {
            background-color: #ffaa00;
            color: #fff;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
        }

        button:hover {
            opacity: 0.9;
        }

        /* Sidebar (Optional, if it is part of the layout) */
        .sidebar {
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

    </style>
</head>
<body>
    <nav class="sidebar">
        <ul>
            <li><a href="Admin03.html"><img src="/PROJECT_COMSCI/picture/logo-sa.png" alt="" class="image-logo"></a></li>
            <li><a href="#"><h1><span id="admin-name">Admin: </span></h1></a></li>
            <li><a href="Admin03.html"><img src="/PROJECT_COMSCI/picture/dashboard.png" alt="dashboard icon" class="image-icon"><span>Dashboard</span></a></li>
            <li><a href="/Project Comsci/Admin/Patient/PatientDataPage.html"><img src="/PROJECT_COMSCI/picture/patient-icon.png" alt="" class="image-icon"><span>ข้อมูลผู้ป่วย</span></a></li>
            <li><a href="PersonalDataPage.html"><img src="/PROJECT_COMSCI/picture/personel.png" alt="" class="image-icon"><span>ข้อมูลส่วนตัว</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/medicine.png" alt="" class="image-icon"><span>ยา</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/doctor.png" alt="" class="image-icon"><span>นัดหมอ</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/newspaper.png" alt="" class="image-icon"><span>แก้ไขข่าวสาร</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/medical-case.png" alt="" class="image-icon"><span>คำขอยืมกระเป๋าพยาบาล</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/report.png" alt="" class="image-icon"><span>รายงาน</span></a></li>
            <li><a href="setting.html"><img src="/PROJECT_COMSCI/picture/tools.png" alt="" class="image-icon"><span>การตั้งค่า</span></a></li>
            <li><a href="#"><img src="/PROJECT_COMSCI/picture/logout.png" alt="" class="image-icon"><span>ออกจากระบบ</span></a></li>
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

    <div class="customize-toolbar" id="toolbar">
        <span class="close-button" onclick="toggleToolbar()">×</span>
        <div class="toolbar-section">
            <h3>Customize</h3>
            <label><input type="checkbox" id="darkModeToggle"> Dark Mode</label>
        </div>
    </div>

    <div class="content" id="content">
            <form action="submitPatientData.php" method="POST" class="patient-info-form">
            <h2>ข้อมูลผู้ป่วย</h2>
            <div class="personal-details">
                <div>
                    <label for="patient-name">ชื่อ:</label>
                    <input type="text" id="patient-name" name="patient_name" required>
                </div>
                <div>
                    <label for="patient-lastname">นามสกุล:</label>
                    <input type="text" id="patient-lastname" name="patient_lastname" required>
                </div>
                <div>
                    <label for="patient-gender">เพศ:</label>
                    <select id="patient-gender" name="patient_gender" required>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                        <option value="อื่น ๆ">อื่น ๆ</option>
                    </select>
                </div>
                <div>
                    <label for="patient-blood">หมู่โลหิต:</label>
                    <input type="text" id="patient-blood" name="patient_blood" required>
                </div>
                <div>
                    <label for="patient-rights">สิทธิการรักษา:</label>
                    <input type="text" id="patient-rights" name="patient_rights" required>
                </div>
                <div>
                    <label for="patient-allergy-medicine">ประวัติการแพ้ยา:</label>
                    <textarea id="patient-allergy-medicine" name="patient_allergy_medicine"></textarea>
                </div>
                <div>
                    <label for="patient-allergy-food">ประวัติการแพ้อาหาร:</label>
                    <textarea id="patient-allergy-food" name="patient_allergy_food"></textarea>
                </div>
            </div>

            <div class="medical-records">
                <label for="records-dropdown">บันทึกการรักษา/ผลการตรวจ</label>
                <select id="records-dropdown" name="records_dropdown" onchange="fetchRecordData()">
                    <option value="treatment">บันทึกการรักษา/ผลการตรวจ</option>
                    <option value="doctor-details">รายละเอียดการนัดหมอ</option>
                    <option value="latest-health">ผลการตรวจสุขภาพครั้งล่าสุด</option>
                </select>
                <div id="record-content">ไม่มีข้อมูล</div>
            </div>

            <div class="hospital-history">
                <h3>ประวัติการใช้บริการห้องพยาบาล</h3>
                <table>
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>อาการ</th>
                            <th>การรักษา</th>
                            <th>วันที่เข้ารับบริการ</th>
                        </tr>
                    </thead>
                    <tbody id="hospital-history-content">
                        <tr><td colspan="4">ไม่มีข้อมูล</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="buttons">
                <button type="reset">ลบ</button>
                <button type="button" onclick="editPatientData()">แก้ไข</button>
                <button type="submit">บันทึก</button>
            </div>
        </form>

    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
            document.querySelector('.content').classList.toggle('collapsed');
            document.querySelector('.navbar').classList.toggle('collapsed');
        }

        function toggleToolbar() {
            document.getElementById('toolbar').classList.toggle('active');
        }

        document.getElementById('darkModeToggle').addEventListener('change', function() {
            document.body.classList.toggle('dark-mode');
        });

        function toggleDropdown(id) {
            const element = document.getElementById(id);
            if (element.style.display === 'block') {
                element.style.display = 'none';
            } else {
                element.style.display = 'block';
            }
        }
        function fetchRecordData() {
            let recordType = document.getElementById('records-dropdown').value;
            
            // Fetch data based on the selected record type
            fetch(`getRecordData.php?type=${recordType}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        document.getElementById('record-content').innerHTML = "ไม่มีข้อมูล";
                    } else {
                        document.getElementById('record-content').innerHTML = data;
                    }
                });
        }

        function fetchHospitalHistory() {
            fetch('getHospitalHistory.php')
                .then(response => response.json())
                .then(data => {
                    let content = '';
                    if (data.length === 0) {
                        content = '<tr><td colspan="4">ไม่มีข้อมูล</td></tr>';
                    } else {
                        data.forEach((item, index) => {
                            content += `<tr>
                                <td>${index + 1}</td>
                                <td>${item.symptoms}</td>
                                <td>${item.treatment}</td>
                                <td>${item.date}</td>
                            </tr>`;
                        });
                    }
                    document.getElementById('hospital-history-content').innerHTML = content;
                });
        }

        // Call these functions when the page loads
        window.onload = function() {
            fetchRecordData();
            fetchHospitalHistory();
        }

    </script>
</body>
</html>
