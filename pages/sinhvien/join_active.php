<?php
if (!isset($_SESSION['tenDangNhap'])) {
    header("Location:index.php?url=login");
}
?>
<div class="mb-3 w-50 float-right">
     <form action="" method="POST">
          <div class="input-group">
               <input type="text" class="form-control form-control" placeholder="Tìm kiếm" name="input-search"
                    value="<?php echo isset($_POST['input-search']) ? $_POST['input-search'] : '' ?>" required />
               <div class="input-group-append background-pr rounded-right">
                    <button type="submit" class="btn btn btn-default text-white btn-hover" name="button-search">
                         <i class="fa fa-search"></i>
                    </button>
               </div>
          </div>
     </form>
</div>
<table class="table-responsive table bg-light">
     <tbody>
          <tr>
               <th class="col-1">STT</th>
               <th class="col-3">Tên hoạt động</th>
               <th class="col-3">Địa điểm</th>
               <th class="col-3">Mô tả</th>
          </tr>
          <?php
        $mssv = $_SESSION['tenDangNhap'];
        if (isset($_POST['button-search'])) {
            $key = trim($_POST['input-search']);
            $sql = "SELECT * FROM sinhvien, thamgia, hoatdong 
            WHERE sinhvien.MSSV = thamgia.MSSV 
            AND thamgia.hoatDongID = hoatdong.hoatDongID AND sinhvien.mssv = $mssv
            AND hoatdong.tenHoatDong LIKE '%$key%'";
        } else {
            // $mssv = $_SESSION['tenDangNhap'];
            $sql = "SELECT * FROM sinhvien, thamgia, hoatdong 
                WHERE sinhvien.mssv = thamgia.mssv 
                AND thamgia.hoatDongID = hoatdong.hoatDongID 
                AND sinhvien.mssv = $mssv";
        }
        $result = mysqli_query($conn, $sql);
        if ($num = mysqli_num_rows($result) > 0) {
            $stt =+ 1;
            while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
               <td><?php echo $stt++ ?></td>
               <td><?php echo $row['tenHoatDong'] ?></td>
               <td><?php echo $row['diaDiem'] ?></td>
               <td><?php echo $row['moTa'] ?></td>
          </tr>
          <?php
            }
        } else {
            header("Location:index.php?url=error");
        }
        ?>
     </tbody>
</table>