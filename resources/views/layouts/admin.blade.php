<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Nala Virtual Center | Admin dashboard </title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">
    <!-- ===== Preloader Start ===== -->
    @include('admin.partials.preloader')
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">

      <!-- ===== Sidebar Start ===== -->
       @include('admin.partials.sidebar')
      <!-- ===== Sidebar End ===== -->

      <!-- ===== Content Area Start ===== -->
      <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden" >

        <!-- ===== Header Start ===== -->
        @include('admin.partials.header')
        <!-- ===== Header End ===== -->

        <!-- Contenu principal -->
        @yield('content')


  <script src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>
  </body>
</html>