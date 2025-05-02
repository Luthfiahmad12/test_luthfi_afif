<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt=""
                    class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-body fw-medium font-size-16">{{ auth()->user()->name }}</a>
                <p class="text-muted mt-1 mb-0 font-size-13">{{ auth()->user()->email }}</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Home</li>

                <li>
                    <a href="{{ route('dashboard') }}" class=" waves-effect">
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Master Data</li>
                <li>
                    <a href="{{ route('products.index') }}" class=" waves-effect">
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaction.index') }}" class=" waves-effect">
                        <span>Transaksi</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
