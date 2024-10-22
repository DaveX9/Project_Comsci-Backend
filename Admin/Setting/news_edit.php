<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Editing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .container {
            display: flex;
        }
        
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
            margin-left: 250px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        main {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
        
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .news-edit {
            margin-bottom: 20px;
        }
        
        .edit-box {
            width: 50%;
            margin: 20px auto;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px;
            box-sizing: border-box;
        }
        
        .edit-box h2 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .edit-box input[type="file"] {
            display: block;
            margin: 0 auto 10px auto;
            padding: 10px;
            font-size: 14px;
        }
        
        .edit-box img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            display: none; /* ซ่อนรูปจนกว่าจะมีการแสดง */
        }
        
        .edit-box textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
        }
        
        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        
        .buttons button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
        }
        
        .buttons button:hover {
            background-color: #0056b3;
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
        
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li><a href="Admin03.html"><img src="/โฟลเดอร์ใหม่/picture/logo-sa.png" alt="" class="image-logo"></a></li>
                <li><a href="#"><h1><span id="admin-name">Admin: </span></h1></a></li>
                <li><a href="Admin03.html"><img src="/โฟลเดอร์ใหม่/picture/dashboard.png" alt="dashboard icon" class="image-icon"><span>Dashboard</span></a></li>
                <li><a href="/Project Comsci/Admin/Patient/PatientDataPage.html"><img src="/โฟลเดอร์ใหม่/picture/patient-icon.png" alt="" class="image-icon"><span>ข้อมูลผู้ป่วย</span></a></li>
                <li><a href="PersonalDataPage.html"><img src="/โฟลเดอร์ใหม่/picture/personel.png" alt="" class="image-icon"><span>ข้อมูลส่วนตัว</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/medicine.png" alt="" class="image-icon"><span>ยา</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/doctor.png" alt="" class="image-icon"><span>นัดหมอ</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/newspaper.png" alt="" class="image-icon"><span>แก้ไขข่าวสาร</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/medical-case.png" alt="" class="image-icon"><span>คำขอยืมกระเป๋าพยาบาล</span></a></li>
                <li><a href="#"><img src="/โฟลเดอร์ใหม่/picture/report.png" alt="" class="image-icon"><span>รายงาน</span></a></li>
                <li><a href="SettingMain.html"><img src="/โฟลเดอร์ใหม่/picture/tools.png" alt="" class="image-icon"><span>การตั้งค่า</span></a></li>
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
        <main>
            <div class="content">
                <form action="save_news.php" method="POST" enctype="multipart/form-data" id="edit-title-form">
                    <label for="news-title">แก้ไขหัวข้อข่าว:</label>
                    <input type="text" id="news-title" name="news-title" value="ปัจจุบันหัวข้อข่าว">
                    <button type="submit">บันทึก</button>
                </form>
            </div>
                <form action="save_news.php" method="POST" enctype="multipart/form-data">
                    <div class="news-edit">
                        <div class="edit-box">
                            <h2>แก้ไขรูปข่าว</h2>
                            <input type="file" id="news-image" name="news-image" accept="image/*" onchange="previewImage(event)">
                            <img id="image-preview" src="#" alt="Preview Image">
                        </div>
                        <div class="edit-box">
                            <h2>แก้ไขเนื้อหาข่าว</h2>
                            <textarea id="news-content" name="news-content" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="buttons">
                        <button type="button" onclick="deleteNews()">ลบ</button>
                        <button type="button" onclick="window.history.back()">ย้อนกลับ</button>
                        <button type="submit">บันทึก</button>
                    </div>
                </form>
                <?php
                    // ตั้งค่าการเชื่อมต่อฐานข้อมูล
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // ตรวจสอบการเชื่อมต่อ
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // ดึงข้อมูลจากตาราง news
                    $sql = "SELECT id, title, description, image_path FROM news_management";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h2>" . $row["title"]. "</h2>";
                            echo "<img src='" . $row["image_path"]. "' alt='News Image'>";
                            echo "<p>" . $row["description"]. "</p>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>

        </main>
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
    </div>
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            const img = document.getElementById('image-preview');

            reader.onload = function() {
                img.src = reader.result;
                img.style.display = 'block'; // แสดงรูปที่เลือก
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function deleteNews() {
            if (confirm('คุณแน่ใจหรือไม่ว่าจะลบข่าวนี้?')) {
                document.getElementById('news-image').value = '';
                document.getElementById('news-content').value = '';
                document.getElementById('image-preview').style.display = 'none'; // ซ่อนรูปเมื่อกดปุ่มลบ
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

        function openPopup(popupId) {
            document.getElementById(popupId).style.display = "block";
            fetchData(popupId);
        }
        
        function closePopup(popupId) {
            document.getElementById(popupId).style.display = "none";
        }
        
        function fetchData(popupId) {
            // Simulate fetching data from each respective page
            setTimeout(() => {
                document.getElementById(`${popupId}-content`).innerHTML = `Data loaded for ${popupId}`;
            }, 1000); // Simulated delay for fetching data
        }
        
        // Optional: Close the popup when clicking outside of it
        window.onclick = function(event) {
            const popups = document.getElementsByClassName('popup');
            for (let i = 0; i < popups.length; i++) {
                if (event.target == popups[i]) {
                    popups[i].style.display = "none";
                }
            }
        }
        
    </script>
</body>
</html>
