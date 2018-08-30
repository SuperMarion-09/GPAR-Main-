<div class="sidebar-container">
                            <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                                <div id="remove-scroll">
                                    <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                                        <li class="sidebar-toggler-wrapper hide">
                                            <div class="sidebar-toggler">
                                                <span></span>
                                            </div>
                                        </li>
                                        <li class="sidebar-user-panel">
                                            <div class="user-panel">
                                                <div class="row">
                                                    <div class="sidebar-userpic">
                                                        <img src="/css/assets/img/cover.jpg" class="img-responsive" alt=""> </div>
                                                    </div>
                                                    <div class="profile-usertitle">
                                                        <div class="sidebar-userpic-name">{{ auth()->User()->first_name}} {{ auth()->User()->last_name}}  </div>
                                                        <div class="profile-usertitle-job"> {{auth()->User()->position}} </div>
                                                    </div>
                                                    <div class="sidebar-userpic-btn">
                                                        <a class="tooltips" href="user_profile" data-placement="top" data-original-title="Profile">
                                                            <i class="material-icons">settings</i>
                                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a class="tooltips" href="login.html" data-placement="top" data-original-title="Logout">
                                                            <i class="material-icons">input</i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item start">
                                                <a href="/admin/index" class="nav-link nav-link">
                                                    <i class="material-icons">dashboard</i>
                                                    <span class="title">Dashboard</span>
                                                    <span class="selected"></span>

                                                </a>

                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link nav-toggle">
                                                    <i class="material-icons">pool</i>
                                                    <span class="title">Pools</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="/admin/pool/view_pools" class="nav-link ">
                                                            <span class="title">View pools</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="/admin/pool/add_pools" class="nav-link ">
                                                            <span class="title">Add pools</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link nav-toggle">
                                                    <i class="material-icons">hotel</i>
                                                    <span class="title">Rooms</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="/admin/room/view_rooms" class="nav-link ">
                                                            <span class="title">View rooms</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="/admin/room/add_rooms" class="nav-link ">
                                                            <span class="title">Add rooms</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link nav-toggle">
                                                    <i class="material-icons">event</i>
                                                    <span class="title">Events</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="view-items.html" class="nav-link ">
                                                            <span class="title">View items</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="add-items.html" class="nav-link ">
                                                            <span class="title">Add items</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link nav-toggle">
                                                    <i class="material-icons">business_center</i>
                                                    <span class="title">Reservation</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="/admin/reservation/view_reservation" class="nav-link active">
                                                            <span class="title">View reservation</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="/admin/reservation/add_reservation" class="nav-link ">
                                                            <span class="title">Add reservation</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link nav-toggle">
                                                    <i class="material-icons">collections</i>
                                                    <span class="title">Gallery
                                                    </span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="/admin/gallery/view_gallery" class="nav-link ">
                                                            <span class="title">View album</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="/admin/gallery/add_gallery" class="nav-link ">
                                                            <span class="title">Add album</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link nav-toggle">
                                                    <i class="material-icons">settings</i>
                                                    <span class="title">Manage</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="/admin/manage/view_admin" class="nav-link ">
                                                            <span class="title">View admin</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="/admin/manage/view_customer" class="nav-link ">
                                                            <span class="title">View customer</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">more</i>
                                                    <span class="title">Others</span> <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                   <!--  <li class="nav-item">
                                                        <a href="coupons.html" class="nav-link "> <span class="title">coupon</span>
                                                        </a>
                                                    </li> -->
                                                    <li class="nav-item">
                                                        <a href="/admin/others/logs" class="nav-link "> <span class="title">Logs</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="/admin/others/feedbacks" class="nav-link "> <span class="title">Feedbacks
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="/admin/others/resort_setting" class="nav-link ">
                                                            <span class="title">
                                                            Resort setting</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>            
                                        </div>
                                    </div>
                                </div>