<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Danh mục</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Smell') }}">
                <i class="bi bi-person"></i>
                <span>Hương vị</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Brand') }}">
                <i class="bi bi-award"></i>
                <span>Thương hiệu</span>
            </a>
        </li>

        <li class="nav-heading">Người dùng</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-people"></i>
                <span>Nhân viên</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-person-video2"></i>
                <span>Nhà cung cấp</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-person"></i>
                <span>Khách hàng</span>
            </a>
        </li>

        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">--}}
        {{--                <i class="bi bi-person"></i><span>Người dùng</span><i class="bi bi-chevron-down ms-auto"></i>--}}
        {{--            </a>--}}
        {{--            <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">--}}
        {{--                <li>--}}
        {{--                    <a href="{{ route('StaffList') }}">--}}
        {{--                        <i class="bi bi-circle"></i><span>Nhân viên</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <a href="">--}}
        {{--                        <i class="bi bi-circle"></i><span>Nhà cung cấp</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <a href="">--}}
        {{--                        <i class="bi bi-circle"></i><span>Khách hàng</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}

        {{--            </ul>--}}
        {{--        </li>--}}

    </ul>

</aside>
<!-- End Sidebar-->
