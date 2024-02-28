<nav id="sidebar" class="">
    <h1>
        <a href="index.php" class="logo">Quản trị hệ thống</a>
    </h1>
    <ul class="list-unstyled components mb-5">
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "home" ? "active" : "" ?>">
            <a href="?url=home"><span class="fa fa-home mr-3"></span>Trang chủ</a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_acc" ? "active" : "" ?>">
            <a href="?url=list_acc"><span class="fa-solid fa-users mr-3"></span>Tài khoản </a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_course" ? "active" : "" ?>">
            <a href="?url=list_course"><span class="fa fa-user mr-3"></span> Khoá học</a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_khoa" ? "active" : "" ?>">
            <a href="?url=list_khoa"><span class="fa fa-user mr-3"></span> Khoa</a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_class" ? "active" : "" ?>">
            <a href="?url=list_class"><span class="fa fa-user mr-3"></span> Lớp</a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_student" ? "active" : "" ?>">
            <a href="?url=list_student"><span class="fa-solid fa-graduation-cap mr-3"></span>Sinh viên</a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_active" ? "active" : "" ?>">
            <a href="?url=list_active"><span class="fa fa-paper-plane mr-3"> </span> Hoạt động</a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_student_join" ? "active" : "" ?>">
            <a href="?url=list_student_join"><span class="fa-solid fa-user-graduate mr-3"></span> Sinh viên tham gia
            </a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_proof" ? "active" : "" ?>">
            <a href="?url=list_proof"><span class="fa-solid fa-pen mr-3"></span> Minh chứng</a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "changepass" ? "active" : "" ?>">
            <a href="?url=changepass"><span class="fa fa-user mr-3"></span> Đổi mật khẩu</a>
        </li>
        <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "logout" ? "active" : "" ?>">
            <a href="?url=logout"><span class="fa-solid fa-right-to-bracket mr-3"></span> Đăng
                xuất</a>
        </li>
    </ul>

</nav>