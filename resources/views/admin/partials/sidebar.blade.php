<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'" class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0" @click.outside="sidebarToggle = false">
  <!-- SIDEBAR HEADER -->
  <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
    <a href="{{ route('admin') }}">
      <img src="{{ asset('./images/logo/logo.png') }}" alt="Logo" />
    </a>

    <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
      <svg  class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z" fill=""/>
      </svg>
    </button>
  </div>
  <!-- SIDEBAR HEADER -->

  <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
    <!-- Sidebar Menu -->
    <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{selected: $persist('Dashboard')}">
      <!-- Menu Group -->
      <div>
        <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</h3>

        <ul class="mb-6 flex flex-col gap-1.5">
          <!-- Menu Item Dashboard -->
          <li>
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4" href="#" @click.prevent="selected = (selected === 'Dashboard' ? '':'Dashboard')" :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Dashboard') || (page === 'ecommerce' || page === 'analytics' || page === 'stocks') }">
              </svg> Dashboard
              <svg class="absolute right-4 top-1/2 -translate-y-1/2 fill-current" :class="{ 'rotate-180': (selected === 'Dashboard') }" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z" fill=""/>
              </svg>
            </a>
          </li>

            <!-- Dropdown Menu Start -->
            <div class="translate transform overflow-hidden" :class="(selected === 'Dashboard') ? 'block' :'hidden'">
              <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white" href="{{ route('users_boards')}}" :class="page === 'ecommerce' && '!text-white'" ><i class="fa fa-users"></i>Users</a>
                </li>

                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white" href="{{ route('category') }}" :class="page === 'ecommerce' && '!text-white'" ><i class="fa fa-layer-group"></i>Categories</a>
                </li>

                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white" href="{{ route('boxes') }}" :class="page === 'ecommerce' && '!text-white'" ><i class="fa fa-shop"></i>Boxes</a>
                </li>

                <li>
                  <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white" href="{{ route('products') }}" :class="page === 'ecommerce' && '!text-white'" ><i class="fa fa-boxes-stacked"></i>Products</a>
                </li>

              </ul>
            </div>
            
          <!-- Menu Item Profile -->
          <li>
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4" href="profile.html" @click="selected = (selected === 'Profile' ? '':'Profile')" :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Profile') && (page === 'profile') }" :class="page === 'profile' && 'bg-graydark'"><i class="fa fa-user"></i>Profile </a>
          </li>
          <!-- Menu Item Profile -->

          <!-- Item Settings -->
          <li>
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4" href="profile.html" @click="selected = (selected === 'Profile' ? '':'Profile')" :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Profile') && (page === 'profile') }" :class="page === 'profile' && 'bg-graydark'"><i class="fa fa-gears"></i>Settings </a>
          </li>
          <!-- Menu Item Settings -->
        </ul>
      </div>
    </nav>
    <!-- Sidebar Menu -->
  </div>
</aside>
