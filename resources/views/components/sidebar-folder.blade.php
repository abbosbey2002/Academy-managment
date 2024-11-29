<!-- [ Content Sidebar ] start -->
<div class="content-sidebar content-sidebar-md" data-scrollbar-target="#psScrollbarInit">
    <div class="content-sidebar-header bg-white sticky-top hstack justify-content-between">
        <h4 class="fw-bolder mb-0">Money</h4>
        <a href="javascript:void(0);" class="app-sidebar-close-trigger d-flex">
            <i class="feather-x"></i>
        </a>
    </div>
    <div class="content-sidebar-body">
        <ul class="nav flex-column nxl-content-sidebar-item">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('category-folders.index') ? 'active' : '' }}" href="{{ route('category-folders.index') }}">
                    <i class="feather-git-branch"></i>
                    <span>Group</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                    <i class="feather-tag"></i>
                    <span>Categories</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- [ Content Sidebar  ] end -->