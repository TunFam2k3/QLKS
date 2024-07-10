<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['action'])) {
    $conn = new mysqli("localhost", "root", "", "anh");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $action = $_GET['action'];

    // Xử lý thao tác cập nhật trạng thái
    if ($action == 'khoa') {
        $newStatus = 'Đã khóa';
    } elseif ($action == 'mo_khoa') {
        $newStatus = 'Đang hoạt động';
    } else {
        echo "Invalid action!";
        exit;
    }

    // Sử dụng câu lệnh prepare statement
    $updateQuery = "UPDATE `acc` SET `trangthai`=? WHERE `id`=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ss", $newStatus, $id);

    if ($stmt->execute()) {
        // Truy vấn thành công, chuyển hướng về trang indexadmin.php
        header('Location: indexadmin.php?danhmuc=danhsachtaikhoan');
    } else {
        // Xử lý lỗi nếu cần
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
}
?>
