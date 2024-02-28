<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }
?>
<div class="mb-3 w-50 float-right">
     <form action="" method="post">
          <div class="input-group">
               <input type="text" class="form-control form-control" placeholder="Nhập họ tên sinh viên...?"
                    name="input-search" />
               <div class="input-group-append background-pr rounded-right">
                    <button type="submit" class="btn btn-default text-white btn-hover" name="button-search">
                         <i class="fa fa-search"></i>
                    </button>
               </div>
          </div>
     </form>
</div>
<table class="table-responsive table-striped table bg-light">
     <thead>
          <tr>
               <th colspan="7" class="text-center">Danh sách minh chứng</th>
          <tr>
               <th class="">STT</th>
               <th class="">MSSV</th>
               <th class="col-2">Họ tên</th>
               <th class="col-3">Tên hoạt động</th>
               <th class="">Thời gian</th>
               <th class="">Minh chứng</th>
               <th class="">Lớp</th>

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
            $sql = "SELECT * FROM hoatdong, sinhvien, thamgia, lop, khoa, khoahoc, minhchung 
            WHERE hoatdong.hoatDongID = thamgia.hoatDongID 
            AND thamgia.MSSV = sinhvien.MSSV 
            AND sinhvien.lopID = lop.lopID 
            AND lop.khoaID = khoa.khoaID 
            AND khoa.khoaHocID = khoahoc.khoaHocID
            AND thamgia.thamGiaID = minhchung.thamGiaID
            AND sinhvien.hoTen LIKE '%$key%' LIMIT $start, $limit";
         } else {
            $sql = "SELECT * FROM hoatdong, sinhvien, thamgia, lop, khoa, khoahoc, minhchung 
            WHERE hoatdong.hoatDongID = thamgia.hoatDongID 
            AND thamgia.MSSV = sinhvien.MSSV 
            AND sinhvien.lopID = lop.lopID 
            AND lop.khoaID = khoa.khoaID 
            AND khoa.khoaHocID = khoahoc.khoaHocID
            AND thamgia.thamGiaID = minhchung.thamGiaID
           LIMIT $start,  $limit";
        }
        $result = mysqli_query($conn, $sql);

        // Bước 3: Tính toán số lượng trang và hiển thị các nút phân trang
        $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM minhchung "));
        $total_pages = ceil($total_rows / $limit);
        if ($num = mysqli_num_rows($result) > 0) {
            $stt = $start + 1;
            while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
               <td><?php echo $stt++ ?></td>
               <td><?php echo $row['MSSV'] ?></td>
               <td><?php echo $row['hoTen'] ?></td>
               <td><?php echo $row['tenHoatDong'] ?></td>
               <td><?php echo $row['thoiGian'] ?></td>
               <td><img src="../uploads/<?php echo $row['hinhAnh'] ?>" width="100"></td>
               <td><?php echo $row['tenLop'] ?></td>

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
               <a class="page-link" href="?url=list_proof&page=<?php echo $i; ?>">
                    <?php echo $i; ?>
               </a>
          </li>
          <?php endfor; ?>
     </ul>
</nav>