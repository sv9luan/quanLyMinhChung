<div class="all-active mt-3">
     <h3 class="text-center ">Các hoạt động </h3>
     <table class="table-responsive table bg-light">
          <tbody>
               <tr>
                    <th class="col-1">STT</th>
                    <th class="col-3">Tên hoạt động</th>
                    <th class="col-3">Địa điểm</th>
                    <th class="col-3">Mô tả</th>
               </tr>
               <?php
            $sql = "SELECT * FROM `hoatdong` ORDER BY hoatDongID DESC LIMIT 5";
            $result = mysqli_query($conn, $sql);
            $stt = 0;
            if ($num = mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $stt++;
            ?>
               <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $row['tenHoatDong'] ?></td>
                    <td><?php echo $row['diaDiem'] ?></td>
                    <td><?php echo $row['moTa'] ?></td>
               </tr>
               <?php }
            } ?>
          </tbody>
     </table>
</div>
