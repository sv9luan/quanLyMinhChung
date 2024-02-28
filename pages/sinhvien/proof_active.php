<?php
if (!isset($_SESSION['tenDangNhap'])) {
    header("Location:index.php?url=login");
}
// Kiểm tra xem form đã được submit chưa
if (isset($_POST['btn_save'])) {
    $id_thamGia = $_POST['id_thamGia'];
    $uploadDir = 'uploads/';
    // Kiểm tra xem có file đã được chọn không
    if (isset($_FILES['images']['name']) && !empty($_FILES['images']['name'])) {
        $name = $_FILES['images']['name'];
        $targetFile = $uploadDir . time() . '_' . $_FILES['images']['name'];

        // Kiểm tra xem file đã tồn tại chưa

        // Di chuyển file từ thư mục tạm sang thư mục đích
        if (move_uploaded_file($_FILES['images']['tmp_name'], $targetFile)) {
            $newFileName = time() . '_' . $_FILES['images']['name'];
            $minhChung = "SELECT * FROM `minhchung` WHERE thamGiaID = $id_thamGia";
            $result = mysqli_query($conn, $minhChung);
            $row = mysqli_fetch_array($result);
            if ($id_thamGia != $row['thamGiaID']) {
                $sql = "INSERT INTO minhchung(hinhAnh, thamGiaID) VALUES ( '$newFileName', '$id_thamGia')";
                $query = mysqli_query($conn, $sql);
                $flg = 1;
            } else {
                $flg = 2;
            }
        } else {
            $flg = 3;
        }
    }
}
?>
<div class="form-proof">
    <?php
    if (isset($flg)) {
        if ($flg == 1) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Chúc mừng!</strong> Bạn đã thêm thành công.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } elseif ($flg == 3) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Tập tin không phải là ảnh.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Minh chứng đã tồn tại.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-4 mt-4">
            <label for="id_thamGia" class="form-label">Tên hoạt động</label>
            <select class="custom-select" id="id_thamGia" name="id_thamGia">
                <<?php
                    $mssv = $_SESSION['tenDangNhap'];
                    $sql = "SELECT * FROM thamgia,hoatdong WHERE thamgia.hoatDongID = hoatdong.hoatDongID AND thamgia.mssv = '$mssv'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?> <option value="<?php echo $row['thamGiaID'] ?>"><?php echo $row['tenHoatDong'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-4 mt-4">
            <label for="hinhAnh" class="form-label">Hình ảnh</label>
            <div class="custom-file">
                <input type="file" name="images" class="custom-file-input" id="hinhAnh" />
                <label class="custom-file-label" for="hinhAnh" data-browse="Tải lên">Chọn ảnh</label>
            </div>
        </div>
        <div class="mb-4 text-center">
            <button type="submit" name="btn_save" class="btn background-pr text-white w-100">
                Lưu
            </button>
        </div>
    </form>
</div>
</div>