<header class="header bar">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>

                <!--logo start-->
                <a href="{$ADMINROOT}" class="logo">RPM <span class="lite">Admin</span></a>
                <!--logo end-->

                <div class="nav search-row" id="top_menu">

                    <!--  search form start -->
                    <ul class="nav top-menu">  
                        <li>
                            <a href="{$ROOT}">
                                <i class="fa fa-globe"></i>
                                Site Web
                            </a>
                        </li>
                        <li>
                            <form class="navbar-form">
                                <input class="form-control" placeholder="Search" type="text">
                            </form>
                        </li>                    
                    </ul>
                    <!--  search form end -->                
                </div>

                <div class="top-nav notification-row">                
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username">{$User->getPrenom()}</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="#"><i class="icon_profile"></i>Profil</a>
                                </li>
                               
                                <li>
                                    <a href="{$ROOT}admin/admin/logout"><i class="icon_key_alt"></i> Se déconnecter</a>
                                </li>
                                
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>      
            <!--header end-->