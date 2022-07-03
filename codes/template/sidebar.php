<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="events.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Events
                </a>
                <a class="nav-link collapsed" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Message
                </a>
                <div class="collapse" id="collapseMessage" aria-labelledby="headingMessage" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Inbox</a>
                        <a class="nav-link" href="">Compose</a>
                    </nav>
                </div>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Assignments
                </a>
                <div class="sb-sidenav-menu-heading">Miscellaneous</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFileLog" aria-expanded="false" aria-controls="collapseFileLog">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    File Log
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFileLog" aria-labelledby="headingFileLog" data-bs-parent="#collapseFileLog">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Add File Fog</a>
                        <a class="nav-link" href="">Track File Log</a>
                    </nav>
                </div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
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