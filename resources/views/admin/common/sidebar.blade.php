<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="active">
            <a href="{{ route('admin.dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>

                <span class="menu-text" style="color: lightseagreen;">User
								<span class="badge badge-success"></span>
							</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('admin.user.add') }}" style="color: orangered">User ADD
                        <i class="menu-icon fa fa-caret-right"></i>
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('admin.user') }}" style="color: orangered">User List
                        <i class="menu-icon fa fa-caret-right"></i>
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-user"></i>
    
                    <span class="menu-text" style="color: lightseagreen;">News
                                    <span class="badge badge-success"></span>
                                </span>
    
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('admin.news.add') }}" style="color: orangered">News ADD
                            <i class="menu-icon fa fa-caret-right"></i>
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('admin.news') }}" style="color: orangered">News List
                            <i class="menu-icon fa fa-caret-right"></i>
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>

                <span class="menu-text" style="color: lightseagreen;">Category
                                    <span class="badge badge-success"></span>
                                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('admin.category.add') }}" style="color: orangered">Category ADD
                        <i class="menu-icon fa fa-caret-right"></i>
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('admin.category') }}" style="color: orangered">Category List
                        <i class="menu-icon fa fa-caret-right"></i>
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>

                <span class="menu-text" style="color: lightseagreen;">Comments
                                    <span class="badge badge-success"></span>
                                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('admin.comment.add') }}" style="color: orangered">Comments ADD
                        <i class="menu-icon fa fa-caret-right"></i>
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('admin.comment') }}" style="color: orangered">Comments List
                        <i class="menu-icon fa fa-caret-right"></i>
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
