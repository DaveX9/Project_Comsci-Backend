<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header bar</title>
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

        }

        .main-content {
            margin-top: 50px;
            margin-left: 200px;
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .sidebar.collapsed ~ .main-content {
            margin-left: 60px;
        }

        .search-system {
            background-color: #ffccff;
            padding: 20px;
            border-radius: 5px;
        }

        .search-system h2 {
            margin-top: 0;
        }

        .search-form {
            display: flex;
            flex-direction: column;
        }

        .search-form label {
            margin-bottom: 5px;
        }

        .search-form input[type="text"] {
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .search-form .checkbox-group {
            display: flex;
            gap: 20px;
            margin-bottom: 10px;
        }

        .search-form .checkbox-group label {
            display: flex;
            align-items: center;
        }

        .search-form .checkbox-group input[type="checkbox"] {
            margin-right: 5px;
        }

        .search-form .results-per-page {
            display: flex;
            flex-direction: column;
        }

        .search-form .results-per-page label {
            margin-bottom: 5px;
        }

        .search-form .results-per-page select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button{
            margin-top: 40px;
            width: 80px;
            border-radius: 5px;
        }


        @media (max-width: 480px) {
            .navbar .search-icon,
            .navbar .notification-icon,
            .navbar .customize-icon {
                display: none;
            }
        }

    </style>
</head>
<body>
    <nav class="sidebar">
        <ul>
            <li><a href="Admin03.html"><img src="/โฟลเดอร์ใหม่/picture/logo-sa.png" alt="" class="image-logo"></a></li>
            <li><a href="#"><h1><span id="admin-name">Admin: </span></h1></a></li>
            <li><a href="Admin03.html"><img src="/โฟลเดอร์ใหม่/picture/dashboard.png" alt="dashboard icon" class="image-icon"><span>Dashboard</span></a></li>
            <li><a href="PatientDataPage.html"><img src="/โฟลเดอร์ใหม่/picture/patient-icon.png" alt="" class="image-icon"><span>ข้อมูลผู้ป่วย</span></a></li>
            <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/personel.png" alt="" class="image-icon"><span>ข้อมูลส่วนตัว</span></a></li>
            <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/medicine.png" alt="" class="image-icon"><span>ยา</span></a></li>
            <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/doctor.png" alt="" class="image-icon"><span>นัดหมอ</span></a></li>
            <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/newspaper.png" alt="" class="image-icon"><span>แก้ไขข่าวสาร</span></a></li>
            <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/medical-case.png" alt="" class="image-icon"><span>คำขอยืมกระเป๋าพยาบาล</span></a></li>
            <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/report.png" alt="" class="image-icon"><span>รายงาน</span></a></li>
            <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/tools.png" alt="" class="image-icon"><span>การตั้งค่า</span></a></li>
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
    
    <main class="main-content">
        <article class="search-system">
            <h2>ระบบค้นหาข้อมูลผู้ป่วย</h2>
            <form class="search-form" id="patientForm" action="PatientDataResult.php" method="GET">
                <div class="checkbox-group">
                    <label><input type="radio" name="role" value="student"> นักศึกษา</label>
                    <label><input type="radio" name="role" value="teacher"> อาจารย์</label>
                    <label><input type="radio" name="role" value="staff"> บุคลากร</label>
                </div>
                <label for="first-name">ชื่อ</label>
                <input type="text" id="first-name" name="first-name" required>
                <label for="last-name">นามสกุล</label>
                <input type="text" id="last-name" name="last-name" required>
                <div class="results-per-page">
                    <label for="results-count">จำนวนรายการที่แสดงผล</label>
                    <select id="results-count" name="results-count">
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <br>
                <button type="submit">Submit</button>
            </form>
        </article>
    </main>

            <?php
        // เชื่อมต่อกับฐานข้อมูล
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = $_POST['query'];

        $sql = "SELECT * FROM login ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%" . $query . "%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        echo json_encode($data);

        $stmt->close();
        $conn->close();
        ?>


    <aside class="customize-toolbar" id="customize-toolbar">
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
    </aside>

    

    <script>
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

        function checkOnlyOne(checkbox) {
            var checkboxes = document.getElementsByName('selection');
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false;
            });
        }


        fetch('get_user.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('admin-name').textContent += data.name;
            })
            .catch(error => console.error('Error:', error));

        window.addEventListener('resize', checkScreenSize);
        document.addEventListener('DOMContentLoaded', checkScreenSize);


        document.getElementById('patientForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let searchQuery = document.getElementById('searchInput').value.trim();
        let resultDiv = document.getElementById('result');

    // ตรวจสอบว่ามีข้อมูลในฐานข้อมูลหรือไม่ (สมมติว่าคุณใช้ AJAX เพื่อดึงข้อมูล)
    fetch('/Project Comsci/Admin/Patient data/PatientDataResult.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'query=' + encodeURIComponent(searchQuery)
    })
    .then(response => response.json())
    .then(data => {
        if (data.length > 0) {
            let resultHtml = '<table><tr><th>ลำดับ</th><th>ข้อมูล</th></tr>';
            data.forEach((item, index) => {
                resultHtml += `<tr><td>${index + 1}</td><td>${item.data}</td></tr>`;
            });
            resultHtml += '</table>';
            resultDiv.innerHTML = resultHtml;
        } else {
            resultDiv.innerHTML = 'ไม่มีข้อมูล';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        resultDiv.innerHTML = 'เกิดข้อผิดพลาดในการค้นหาข้อมูล';
    });
});

    </script>
</body>
</html>
