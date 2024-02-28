<?php
if (!isset($_SESSION['tenDangNhap'])) {
    header("Location:index.php?url=login");
}
?>
<div class="main-content p-4 p-md-5 pt-5">
     <?php
    if (isset($_SESSION['success_message'])) {
        echo $_SESSION['success_message'];
    } else if (isset($_SESSION['error_message'])) {
        echo $_SESSION['error_message'];
    }
    unset($_SESSION['success_message']);
    unset($_SESSION['error_message']);
    ?>
     <div class="mb-3 w-50 float-right">
          <form action="" method="POST">
               <div class="input-group">
                    <input type="text" class="form-control form-control" placeholder="Tìm kiếm" name="input-search" />
                    <div class="input-group-append background-pr rounded-right">
                         <button type="submit" class="btn btn btn-default text-white btn-hover" name="button-search">
                              <i class="fa fa-search"></i>
                         </button>
                    </div>
               </div>
          </form>
     </div>
     <button onclick="printPage()">In trang</button>
</div>
<table class="table-responsive table bg-light">
     <tbody>
          <tr>
               <th class="col-1">STT</th>
               <th class="col-3">Tên hoạt động</th>
               <th class="col-3">Địa điểm</th>
               <th class="col-4">Mô tả</th>
               <th class="col-1">Thao tác</th>
          </tr>
          <?php
        // Bước 1: Định nghĩa các biến và hằng số phân trang
        $limit = 5; // Số bản ghi trên mỗi trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1

        // Bước 2: Sửa câu truy vấn SQL để lấy chỉ một phần của dữ liệu dựa trên trang hiện tại
        $start = ($current_page - 1) * $limit;
        if (isset($_POST['button-search'])) {
            $key = trim($_POST['input-search']);
            $sql = "SELECT * FROM hoatdong WHERE hoatdong.tenHoatDong LIKE '%$key%' LIMIT $start,$limit";
        } else {
            $sql = "SELECT * FROM `hoatdong` LIMIT $start,$limit";
        }
        $result = mysqli_query($conn, $sql);

        // Bước 3: Tính toán số lượng trang và hiển thị các nút phân trang
        $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hoatdong"));
        $total_pages = ceil($total_rows / $limit);
        if ($num = mysqli_num_rows($result) > 0) {
            $stt = $start + 1;
            while ($row = mysqli_fetch_array($result)) {
  
        ?>
          <tr>
               <td><?php echo $stt++ ?></td>
               <td><?php echo $row['tenHoatDong'] ?></td>
               <td><?php echo $row['diaDiem'] ?></td>
               <td><?php echo $row['moTa'] ?></td>
               <td>
                    <a class="text-decoration-none" href="?url=handle_join&id=<?php echo $row['hoatDongID'] ?>">Tham
                         gia</a>
               </td>
          </tr>
          <?php
            }
        } else {
            header("Location:index.php?url=error");
        }
        ?>
     </tbody>
</table>
<nav aria-label="Page navigation">
     <ul class="pagination float-right">
          <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
          <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
               <a class="page-link" href="?url=list_active&page=<?php echo $i; ?>">
                    <?php echo $i; ?>
               </a>
          </li>
          <?php endfor; ?>
     </ul>
</nav>
</div>