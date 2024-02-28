<nav id="sidebar" class="">
     <h1>
          <a href="index.php" class="logo">Quản lý hoạt động</a>
     </h1>
     <ul class="list-unstyled components mb-5">
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "home" ? "active" : "" ?>">
               <a href="index.php?url=home"><span class="fa-solid fa-house-user mr-3"></span> Trang chủ</a>
          </li>
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_active" ? "active" : "" ?>">
               <a href="?url=list_active"><span class="fa fa-user mr-3"></span> Tất cả hoạt động</a>
          </li>
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "join_active" ? "active" : "" ?>">
               <a href="?url=join_active"><span class="fa fa-sticky-note mr-3"></span> Hoạt động tham
                    gia</a>
          </li>
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "proof_active" ? "active" : "" ?>">
               <a href="?url=proof_active"><span class="fa fa-paper-plane mr-3"></span> Thêm minh chứng</a>
          </li>
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "proof_list" ? "active" : "" ?>">
               <a href="?url=proof_list"><span class="fa fa-paper-plane mr-3"></span> Xem minh chứng</a>
          </li>
     </ul>
</nav>