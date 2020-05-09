<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query menu -->
    <?php
    $menu = $this->db->get('admin_menu')->result_array();
    ?>

    <!-- Looping Menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>
        <!-- Siapakan Sub-menu sesuai menu -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
            from `admin_sub_menu` join `admin_menu`
            on `admin_sub_menu`.`menu_id` = `admin_menu`.`id`
            where `admin_sub_menu`.`menu_id` = $menuId ";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <!-- Nav Item - Dashboard -->
            <?php if ($title == $sm['judul']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item ">
                <?php endif ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['judul']; ?></span></a>
                </li>
            <?php endforeach; ?>
            <!-- Divider -->
            <hr class="sidebar-divider mt-3 ">
        <?php endforeach; ?>


        <li <?php if ($title == "Bantuan") echo "class='nav-item active pt-0'";
            else echo  "class='nav-item pt-0'" ?>>
            <a class="nav-link pt-0" href="<?= base_url('paduan/'); ?>">
                <i class="far fa-fw fa-question-circle"></i>
                <span>Bantuan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pt-0" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Keluar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->