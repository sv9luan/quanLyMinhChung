<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Quản lý hoạt động khoa CNTT</title>
     <link rel="stylesheet" href="assets/css/bootstrap.css" />
     <link rel="stylesheet" href="assets/css/style.css" />
     <!-- icon -->
     <script src="https://kit.fontawesome.com/201f6c5d4d.js" crossorigin="anonymous"></script>
</head>

<body>
     <div class="wrapper d-flex align-items-stretch">
          <?php
        require 'pages/layouts/sidebar.php';
        ?>
          <!-- Page Content  -->
          <div id="content" class="">
               <div class="navbar-content">
                    <nav class="background-pr d-flex">
                         <div class="col-10">
                         </div>
                         <div class="col-2 d-flex flex-nowrap">
                              <div class="user py-2 d-block">
                                   <!-- <a href="pages/login.html" class="text-white">
                          <i class="fa-regular fa-user pr-1"></i>
                          Đăng nhập
                        </a> -->
                                   <div class="">
                                        <button class="dropdown-toggle bg-transparent border-0 text-white" type=""
                                             data-toggle="dropdown" aria-expanded="false">
                                             <i class="fa fa-user"></i>
                                             <?php
                                    echo isset($_SESSION['hoTen']) ? $_SESSION['hoTen'] : ""
                                    ?>
                                        </button>
                                        <div class="dropdown-menu">
                                             <a class='dropdown-item <?php echo isset($_SESSION['tenDangNhap']) ? "" : "disabled" ?>'
                                                  data-toggle="modal" data-target="#staticBackdrop" href="#">Thông tin
                                                  cá nhân</a>
                                             <a class="dropdown-item <?php echo isset($_SESSION['tenDangNhap']) ? "" : "disabled" ?>"
                                                  href="?url=changepassword">Đổi mật khẩu</a>
                                             <a class="dropdown-item" href="<?php
                                                                    echo isset($_SESSION['hoTen']) ? "?url=logout" : "?url=login"
                                                                    ?>">
                                                  <?php
                                        echo isset($_SESSION['hoTen']) ? "Đăng xuất" : "Đăng nhập"
                                        ?>
                                             </a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </nav>
               </div>
               <div class="main-content p-4 p-md-5 pt-5">
                    <?php
                if (isset($_GET['url'])) {
                    $page = $_GET['url'];
                    require "pages/sinhvien/" . $page . ".php";
                } else {
                    require "pages/sinhvien/home.php";
                }
                ?>
               </div>
          </div>
          <!-- model info -->
          <?php
        if (isset($_SESSION['tenDangNhap'])) {
        ?>
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
               aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">
                                   Thông tin cá nhân
                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                         <div class="modal-body">
                              <div class="col">
                                   <table class="table table-striped">
                                        <tbody>
                                             <?php
                                        $sql = "SELECT * FROM sinhvien, lop, khoa, khoahoc, taikhoan 
                                        WHERE sinhvien.lopID = lop.lopID 
                                        AND lop.khoaID = khoa.khoaID 
                                        AND khoa.khoaHocID = khoahoc.khoaHocID 
                                        AND sinhvien.MSSV = taikhoan.MSSV 
                                        AND tenDangNhap = " . $_SESSION['tenDangNhap'] . "";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                             <tr>
                                                  <th>Mã số sinh viên:</th>
                                                  <td><?php echo $row['MSSV'] ?></td>
                                             </tr>
                                             <tr>
                                                  <th>Họ tên:</th>
                                                  <td><?php echo $row['hoTen'] ?></td>
                                             </tr>
                                             <tr>
                                                  <th>Lớp:</th>
                                                  <td><?php echo $row['tenLop'] ?></td>
                                             </tr>
                                             <tr>
                                                  <th>Khoa:</th>
                                                  <td><?php echo $row['tenKhoa'] ?></td>
                                             </tr>
                                             <tr>
                                                  <th>Khoá học:</th>
                                                  <td><?php echo $row['khoaHoc'] ?></td>
                                             <tr>
                                                  <th>Email:</th>
                                                  <td><?php echo $row['email'] ?></td>
                                             </tr>
                                             <tr>
                                                  <th>Số điện thoại:</th>
                                                  <td><?php echo $row['soDienThoai'] ?></td>
                                             </tr>
                                             <?php } ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="text-center mb-3">
                              <button type="button" class="btn background-pr text-white w-25" data-dismiss="modal">
                                   Đóng
                              </button>
                         </div>
                    </div>
               </div>
          </div>
          <?php
        } ?>
     </div>
     <script src="assets/js/jquery-3.7.1.min.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/bootstrap.js"></script>
     <script src="assets/js/main.js"></script>
</body>

</html>