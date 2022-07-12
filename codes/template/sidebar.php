<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link <?= (isset($active_link) && $active_link == 'dashboard') ? 'active': '' ?>" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?= (isset($active_link) && $active_link == 'events') ? 'active': '' ?>" href="events.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar"></i></div>
                    Events
                </a>
                <a class="nav-link collapsed <?= (isset($active_link) && $active_link == 'message') ? 'active': '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseMessage" aria-expanded="false" aria-controls="collapseMessage">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-message"></i></div>
                    Message
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMessage" aria-labelledby="collapseMessageHeading" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="message.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-inbox"></i></div>
                            Inbox
                        </a>
                        <a class="nav-link" href="message.php?action=compose">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Compose
                        </a>
                    </nav>
                </div>
                <a class="nav-link" href="assignments.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                    Assignments | Tasks
                </a>
                <!-- For Admin Use Only -->
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Users
                </a>
                <div class="sb-sidenav-menu-heading">Miscellaneous</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFileLog" aria-expanded="false" aria-controls="collapseFileLog">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    File Log
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFileLog" aria-labelledby="headingFileLog" data-bs-parent="#collapseFileLog">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Add File Log</a>
                        <a class="nav-link" href="">Track File Log</a>
                    </nav>
                </div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info"></i></div>
                    Log In Info.
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?= $_SESSION['first_name']." ".$_SESSION['last_name']?>
        </div>
    </nav>
</div>