<div class="side-header show">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>

                <li><a href="{{url("/admin/dashboard")}}"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                <li class="has-sub-menu"><a href="#"><i class="fa fa-list"></i> <span>Category</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a href="{{url("/admin/category/")}}"><span>All Categories</span></a></li>
                        <li><a href="{{url("/admin/category/create")}}"><span>Add Category</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div><!-- Side Header Inner End -->
</div><!-- Side Header End -->
