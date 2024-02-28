<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }
     $sql = "SELECT * FROM khoa, khoahoc 
     WHERE khoa.khoaHocID = khoahoc.khoaHocID";
     $query = mysqli_query($conn, $sql);
?>
<!-- <div class="mb-3 w-50 float-right">
     <form action="#">
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
     <a href="?url=change_khoa" class="btn btn-outline-primary">Khoa</a>
</div>
<table class="table table-striped bg-light ">
     <thead class="">
          <tr>
               <th colspan="3" class="text-center">Danh sách khoa</th>
          <tr>
               <th class="">STT</th>
               <th class="">Khoá học</th>
               <th class="">Khoa</th>
          </tr>
     </thead>
     <tbody class="">

          <?php
        if ($num = mysqli_num_rows($query) > 0) {
            $stt = 0;
            while ($row = mysqli_fetch_array($query)) {
                $stt++;
        ?>
          <tr>
               <td><?php echo $stt ?></td>
               <td><?php echo $row['khoaHoc'] ?></td>
               <td><?php echo $row['tenKhoa'] ?></td>
          </tr>
          <?php
            }
        }
        ?>
     </tbody>
</table>