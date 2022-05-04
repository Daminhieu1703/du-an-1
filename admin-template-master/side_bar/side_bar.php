<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span></span>Admin</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff" />
                                    </a>
                                    <div class="message-body">
                                        <small class="pull-right">3 mins ago</small>
                                        <a href="#"><strong>John Doe</strong> commented on
                                            <strong>your photo</strong>.</a>
                                        <br /><small class="text-muted">1:24 pm - 25/03/2015</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff" />
                                    </a>
                                    <div class="message-body">
                                        <small class="pull-right">1 hour ago</small>
                                        <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                        <br /><small class="text-muted">12:27 pm - 25/03/2015</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="all-button">
                                    <a href="#">
                                        <em class="fa fa-inbox"></em>
                                        <strong>All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-bell"></em><span class="label label-info">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <em class="fa fa-envelope"></em> 1 New Message
                                        <span class="pull-right text-muted small">3 mins ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <em class="fa fa-heart"></em> 12 New Likes
                                        <span class="pull-right text-muted small">4 mins ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <em class="fa fa-user"></em> 5 New Followers
                                        <span class="pull-right text-muted small">4 mins ago</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="<?=$_SESSION['user']['avatar']?>" class="img-responsive" alt="" />
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?=$_SESSION['user']['ten_kh']?></div>
				<div class="profile-usertitle-status">
					<span class="indicator label-success"></span>Online
				</div>
			</div>
			<div class="clear"></div>
		</div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" />
            </div>
        </form>
        <ul class="nav menu">
            <li class="">
                <a href="\du_an_1\admin-template-master\index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a>
            </li>
            <li>
                <a href="\du_an_1\template-master\index.php"><i class="fas fa-store"></i> Trang cửa hàng</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\7.category\category.php"><i class="fas fa-list"></i> Loại hàng</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\2.user\users.php"><i class="fas fa-users"></i> Tài khoản người dùng</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\1.products\products.php"><i class="fas fa-shapes"></i> Sản phẩm</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\9.status\status.php"><i class="fas fa-file-alt"></i> Bài viết</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\3.cmt_sp\comments.php"><i class="fas fa-comments"></i> Bình luận sản phẩm</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\8.cmt_bv\comments.php"><i class="fas fa-comments"></i> Bình luận bài viết</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\6.order\orders.php"><i class="fas fa-cart-plus"></i> Đơn hàng</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\5.charts\charts.php"><i class="fas fa-chart-line"></i> Thống kê</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\10.contact\list_contact.php"><i class="fas fa-file-signature"></i> Liên hệ</a>
            </li>
            <li>
                <a href="\du_an_1\admin-template-master\4.slider\slider.php"><i class="fas fa-images"></i> Slider</a>
            </li>
            <li>
                <a href="\du_an_1\template-master\handle.php?logout=dangxuat"><em class="fa fa-power-off">&nbsp;</em> Logout</a>
            </li>
        </ul>
    </div>