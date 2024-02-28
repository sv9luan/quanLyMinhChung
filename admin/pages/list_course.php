<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }
     $sql = "SELECT * FROM khoahoc";
     $query = mysqli_query($conn, $sql);
?>
<!-- <div class="mb-3 w-50 float-right">
     <form action="" method="post">
          <div class="input-group">
               <input type="text" class="form-control form-control" placeholder="Tìm kiếm" name="input-search" />
               <div class="input-group-append background-pr rounded-right">
                    <button type="submit" class="btn btn-default text-white btn-hover" name="button-search">
                         <i class="fa fa-search"></i>
                    </button>
               </div>
          </div>
     </form>
</div> -->
<div class="mb-4">
     <a href="?url=add_course" class="btn btn-outline-primary">Thêm khoá học</a>
</div>
<table class="table-striped table bg-light">
     <thead>
          <tr>
               <th colspan="2" class="text-center">Danh sách khoá học</th>
          <tr>
               <th class="">STT</th>
               <th class="">Khoá học</th>
          </tr>
     <tbody>

          <?php
        if ($num = mysqli_num_rows($query) > 0) {
            $stt = 0;
            while ($row = mysqli_fetch_array($query)) {
                $stt++;
        ?>
          <tr>
               <td><?php echo $stt ?></td>
               <td><?php echo $row['khoaHoc'] ?></td>

          </tr>
          <?php
            }
        }
        ?>
     </tbody>
</table>