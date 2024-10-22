<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Search Results</title>
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

        @media (max-width: 480px) {
            .navbar .search-icon,
            .navbar .notification-icon,
            .navbar .customize-icon {
                display: none;
            }
        }

        /* Styles for the table */
        .content {
            margin-top: 60px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            max-width: 1000px;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
        @media (max-width: 768px) {
            .content {
                margin-left: 60px;
            }
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <ul>
            <li><a href="Admin03.html"><img src="/Project_Comsci/picture/logo-sa.png" alt="" class="image-logo"></a></li>
            <li><a href="#"><h1><span id="admin-name">Admin: </span></h1></a></li>
            <li><a href="Admin03.html"><img src="/Project_Comsci/picture/dashboard.png" alt="dashboard icon" class="image-icon"><span>Dashboard</span></a></li>
            <li><a href="PatientDataPage.html"><img src="/Project_Comsci/picture/patient-icon.png" alt="" class="image-icon"><span>ข้อมูลผู้ป่วย</span></a></li>
            <li><a href="#"><img src="/Project_Comsci/picture/personel.png" alt="" class="image-icon"><span>ข้อมูลส่วนตัว</span></a></li>
            <li><a href="#"><img src="/Project_Comsci/picture/medicine.png" alt="" class="image-icon"><span>ยา</span></a></li>
            <li><a href="#"><img src="/Project_Comsci/picture/doctor.png" alt="" class="image-icon"><span>นัดหมอ</span></a></li>
            <li><a href="#"><img src="/Project_Comsci/picture/newspaper.png" alt="" class="image-icon"><span>แก้ไขข่าวสาร</span></a></li>
            <li><a href="#"><img src="/Project_Comsci/picture/medical-case.png" alt="" class="image-icon"><span>คำขอยืมกระเป๋าพยาบาล</span></a></li>
            <li><a href="#"><img src="/Project_Comsci/picture/report.png" alt="" class="image-icon"><span>รายงาน</span></a></li>
            <li><a href="#"><img src="/Project_Comsci/picture/tools.png" alt="" class="image-icon"><span>การตั้งค่า</span></a></li>
            <li><a href="#"><img src="/Project_Comsci/picture/logout.png" alt="" class="image-icon"><span>ออกจากระบบ</span></a></li>
        </ul>
    </nav>
    <nav class="navbar">
        <ul>
            <li><img src="/Project_Comsci/picture/menu.png" alt="Menu" class="menu-icon" onclick="toggleSidebar()"></li>
            <li style="margin-left:auto;">
                <img src="/Project_Comsci/picture/Serach-icon.png" alt="Search" class="search-icon">
                <img src="/Project_Comsci/picture/notification.png" alt="Notification" class="notification-icon">
                <img src="/Project_Comsci/picture/customize.png" alt="Customize" class="customize-icon" onclick="toggleCustomizeToolbar()">
            </li>
        </ul>
    </nav>
    <div class="customize-toolbar" id="customizeToolbar">
        <div class="close-button" onclick="toggleCustomizeToolbar()">&times;</div>
        <div class="toolbar-section">
            <h3>Customize</h3>
            <label>
                <input type="checkbox" id="darkModeToggle">
                Dark Mode
            </label>
        </div>
    </div>
    <div class="content" id="content">
        <h2>ระบบค้นหาข้อมูล</h2>
        <table>
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>หน่วยงาน/สำนัก/คณะ</th>
                    <th>ข้อมูลนักศึกษา/อาจารย์/บุคลากร</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM patient_search_system";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["id"]."</td><td>".$row["Username"]."</td><td>".$row["Department"]."</td><td><a href='PatientDataInformation.php?id=".$row["Patient_Data"]."'>ข้อมูลของ ".$row["Username"]."</a></td></tr>";
                    }
                    echo "</table>";
                    } else {
                        echo "<tr><td colspan='4'>ไม่พบข้อมูล</td></tr>";
                    }
                    $conn->close();
                    ?>
            </tbody>
        </table>
    </div>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
            document.querySelector('.navbar').classList.toggle('collapsed');
            document.querySelector('.content').classList.toggle('collapsed');
        }

        function toggleCustomizeToolbar() {
            document.getElementById('customizeToolbar').classList.toggle('active');
        }

        document.getElementById('darkModeToggle').addEventListener('change', function() {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
