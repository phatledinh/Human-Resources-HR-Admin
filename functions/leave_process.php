<?php
require('../config/dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $leave_id = intval($_POST['leave_id']);
    $status = $_POST['action'] === 'approve' ? 'Đã duyệt' : 'Từ chối';
    $approver_id = 1; 

    $sql = "UPDATE `leave` SET status = ?, approver_id = ?, updated_at = CURRENT_TIMESTAMP WHERE leave_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $status, $approver_id, $leave_id);

    if ($stmt->execute()) {
        header("Location: ../leave.php?message=success&text=Cập nhật trạng thái thành công!");
    } else {
        header("Location: ../leave.php?message=error&text=Lỗi khi cập nhật trạng thái.");
    }
    $stmt->close();
}

$conn->close();
?>