<?php
    $servername = "localhost"; //ชื่อ server
    $username = "root"; //ชื่อ user ของ xampp
    $password = ""; //รหัสผ่านของ xampp

    $connect = new mysqli($servername,$username,$password); //สร้าง object เชื่อมต่อ database

    if ($connect->connect_error){                           //เช็คการเชื่อมต่อ
        die("Connect failed: ".$connect->connect_error);    //ถ้าไม่ได้ให้จบการทำงาน
    }
    echo "Connect successfully"; //ถ้าได้ให้แสดงคำว่า Connect Successfully

    $sql = "CREATE DATABASE mylogin"; //myDB12 = ชื่อฐานข้อมูล
    // Object = "CREATE DATABASE ชื่อฐานข้อมูล";
    if ($connect->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $connect->error;
    }
        //-----------จบส่วน create database---------//
    
    
    $connect->close(); // จบการเชื่อมต่อ
?>