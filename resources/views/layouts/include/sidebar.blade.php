<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <!-- <img src="{{ asset('css/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light" style="padding-left:10px">Cartal Technical Services</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('css/dist/img/avatar.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item @if($page === 'dashboard') active @endif">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($page === 'customer') active @endif">
                    <a href="{{ route('customers') }}" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($page === 'quotation') active @endif">
                    <a href="{{ route('quotations') }}" class="nav-link">
                        <i class="nav-icon fab fa-quora"></i>
                        <p>
                            Quotations
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($page === 'annexure') active @endif">
                    <a href="{{ route('annexures') }}" class="nav-link">
                        <i class="nav-icon fas fa-object-group"></i>
                        <p>
                        Annexures
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($page === 'orderacknowledgement') active @endif">
                    <a href="{{ route('orderacknowledgements') }}" class="nav-link">
                        <i class="nav-icon fab fa-first-order-alt"></i>
                        <p>
                        Order Acknowledgement
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($page === 'deliverychallan') active @endif">
                    <a href="{{ route('deliverychallans') }}" class="nav-link">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>
                        Delivery challan
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($page === 'despatchadvice') active @endif">
                    <a href="{{ route('despatchadvices') }}" class="nav-link">
                        <i class="nav-icon fab fa-tripadvisor"></i>
                        <p>
                        Despatch Advice
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($page === 'invoice') active @endif">
                    <a href="{{ route('invoices') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                        Invoice
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($page === '') active @endif">
                    <a href="{{ route('annexures') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>
                        Purchase Order
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($page === '') active @endif">
                    <a href="{{ route('annexures') }}" class="nav-link">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                        Enquiry
                        </p>
                    </a>
                </li>
                 
                 
                
                
                

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>