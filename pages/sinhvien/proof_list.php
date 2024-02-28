<?php
if (!isset($_SESSION['tenDangNhap'])) {
    header("Location:index.php?url=login");
}
$mssv = $_SESSION['tenDangNhap'];
$sql = "SELECT hoatdong.tenHoatDong,hoatdong.diaDiem,hoatdong.moTa,minhchung.hinhAnh FROM thamgia,minhchung,hoatdong WHERE hoatdong.hoatDongID = thamgia.hoatDongID AND thamgia.thamGiaID=minhchung.thamGiaID AND thamgia.MSSV = $mssv";
$result = mysqli_query($conn, $sql);
?>

<div class="mb-3 w-50 float-right">
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
</div>
<table class="table-responsive table bg-light">
     <tbody>
          <tr>
               <th class="">STT</th>
               <th class="">Tên hoạt động</th>
               <th class="">Địa điểm</th>
               <th class="">Mô tả</th>
               <th class="">Hình ảnh</th>
               <!-- <th class="">Thời gian nộp</th> -->
               <!-- <th class="">Hình ảnh</th> -->
          </tr>
          <?php
        if ($num = mysqli_num_rows($result) > 0) {
            $stt = 0;
            while ($row = mysqli_fetch_array($result)) {
                $stt++;
        ?>
          <tr>
               <td><?php echo $stt ?></td>
               <td><?php echo $row['tenHoatDong'] ?></td>
               <td><?php echo $row['diaDiem'] ?></td>
               <td><?php echo $row['moTa'] ?></td>
               <td><img src="uploads/<?php echo $row['hinhAnh'] ?>" width="50"></td>
               <!-- <td>2023-09-12 22:32:41</td>
                    <td>
                        <img src="https://images.unsplash.com/photo-1626808642875-0aa545482dfb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZnJlZSUyMGltYWdlc3xlbnwwfHwwfHx8MA%3D%3D" width="80" alt="" />
                    </td> -->
          </tr>
          <?php
            }
        }
        ?>
     </tbody>
</table>