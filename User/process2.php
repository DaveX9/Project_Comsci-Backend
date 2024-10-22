<?php
    /*$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname =  "login";
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername,$username,$password,$dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ค้นหาผู้ใช้ในฐานข้อมูล
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ถ้าพบผู้ใช้ ให้ดึงข้อมูล
        $row = $result->fetch_assoc();
        $role = $row['role']; // สมมติว่ามีคอลัมน์ชื่อ role ในฐานข้อมูล

        if ($role == 'admin') {
            // ถ้าเป็น admin นำทางไปหน้า admin
            header("Location:/Project_Comsci/Admin/Admin_dashboard.php");
            exit();
        } elseif ($role == 'user') {
            // ถ้าเป็น user นำทางไปหน้า user
            header("Location: user_dashboard.php");
            exit();
        }
    } else {
        echo "Username หรือ Password ไม่ถูกต้อง";
    }
}

$conn->close();*/
?>

<?php
$servername = "localhost";
$username_db = "root";  // Changed variable name to avoid conflict with form input
$password_db = "";
$dbname =  "login";

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์มและป้องกัน SQL Injection
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // ค้นหาผู้ใช้ในฐานข้อมูลด้วย Prepared Statements
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // ถ้าพบผู้ใช้ ให้ดึงข้อมูล
        $row = $result->fetch_assoc();
        $role = $row['role']; // สมมติว่ามีคอลัมน์ชื่อ role ในฐานข้อมูล

        if ($role == 'admin') {
            // ถ้าเป็น admin นำทางไปหน้า admin
            header("Location:/Project_Comsci/Admin/Admin_dashboard.php");
            exit();
        } elseif ($role == 'user') {
            // ถ้าเป็น user นำทางไปหน้า user
            header("Location:/DEVFINAL/Afterlogin/main.html");
            exit();
        }
    } else {
        // ตั้งค่าข้อความแสดงข้อผิดพลาด
        $error_message = "Username หรือ Password กรอกไม่ถูกต้อง กรุณากรอกใหม่";
    }
    $stmt->close();
}

$conn->close();
?>


