<?php
     if (!isset($_SESSION['tenDangNhap'])) {
          header("Location:../index.php?url=login");
      }
?>
<div class="mb-3 w-50 float-right">
     <form action="" method="post">
          <div class="input-group">
               <input type="text" class="form-control form-control" placeholder="Nhập tên lớp....?"
                    name="input-search" />
               <div class="input-group-append background-pr rounded-right">
                    <button type="submit" class="btn btn-default text-white btn-hover" name="button-search">
                         <i class="fa fa-search"></i>
                    </button>
               </div>
          </div>
     </form>
</div>
<div class="mb-4">
     <a href="?url=add_class" class="btn btn-outline-primary">Thêm lớp</a>
</div>
<table class="table-striped table bg-light">
     <thead>
          <tr>
               <th colspan="4" class="text-center">Danh sách lớp</th>
          </tr>
          <tr>
               <th class="">STT</th>
               <th class="">Lớp</th>
               <th class="">Khoá học</th>
               <th class="">Khoa</th>

          </tr>
     </thead>
     <tbody>

          <?php
           // Bước 1: Định nghĩa các biến và hằng số phân trang
        $limit = 5; // Số bản ghi trên mỗi trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1

        // Bước 2: Sửa câu truy vấn SQL để lấy chỉ một phần của dữ liệu dựa trên trang hiện tại
        $start = ($current_page - 1) * $limit;
        if (isset($_POST['button-search'])) {
            $key = trim($_POST['input-search']);
            $sql = "SELECT * FROM lop, khoa, khoahoc 
            WHERE lop.khoaID = khoa.khoaID 
            AND khoa.khoaHocID = khoahoc.khoaHocID
            AND lop.tenLop LIKE '%$key%' LIMIT $start, $limit";
        } else {
            $sql = "SELECT * FROM lop, khoa, khoahoc 
            WHERE lop.khoaID = khoa.khoaID 
            AND khoa.khoaHocID = khoahoc.khoaHocID
            LIMIT $start,  $limit";
        }
        $result = mysqli_query($conn, $sql);

        // Bước 3: Tính toán số lượng trang và hiển thị các nút phân trang
        $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lop"));
        $total_pages = ceil($total_rows / $limit);
        if ($num = mysqli_num_rows($result) > 0) {
          $stt = $start + 1;
          while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
               <td><?php echo $stt++ ?></td>
               <td><?php echo $row['tenLop'] ?></td>
               <td><?php echo $row['khoaHoc'] ?></td>
               <td><?php echo $row['tenKhoa'] ?></td>
          </tr>
          <?php
            }
        }
        ?>
     </tbody>
</table>
<nav aria-label="Page navigation">
     <ul class="pagination float-right">
          <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
          <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
               <a class="page-link" href="?url=list_class&page=<?php echo $i; ?>">
                    <?php echo $i; ?>
               </a>
          </li>
          <?php endfor; ?>
     </ul>
</nav>