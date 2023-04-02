<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
      <meta charset="UTF-8">
      <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      @vite('resources/css/app.css')

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Favicons -->
      <link rel="icon" href="favicon.svg" sizes="any" type="image/svg+xml">
      <link rel="icon" href="favicon.png" type="image/png">

      <!-- Main Stylesheet -->
      <!-- Based on your project, you might need to include the compiled CSS file if it is not automatically injected in your pages -->
      <!-- <link rel="stylesheet" href="css/{main-stylesheet-name}.css"> -->

      <!-- Inter web font from Google -->
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

      <!-- Alpine.js, uncomment if you would like to use Tailkit’s Alpine JS based components -->
      <script src="https://unpkg.com/alpinejs" defer></script>
      <script scr="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <!-- Page Container -->
    {{-- Sidebar on Desktop
    Closed '' (no class)
    Opened 'lg:pl-64' --}}

    <div id="page-container" class="flex flex-col mx-auto w-full min-h-screen bg-gray-100 lg:pl-64 duration-500">
        <!-- Page Sidebar -->
        <!--
          Sidebar on Mobile
            Closed '-translate-x-full'
            Opened 'translate-x-0'

          Sidebar on Desktop
            Closed 'lg:-translate-x-full'
            Opened 'lg:translate-x-0'
        -->
        <x-app.sidebar />
        <!-- END Sidebar Navigation -->
        <!-- Page Sidebar -->

        <!-- Page Header -->
        <!--
          Sidebar on Desktop
            Closed '' (no class)
            Opened 'lg:pl-64'
        -->
        <x-app.header />
        <!-- END Page Header -->

        <!-- Page Content -->
        <main id="page-content" class="flex flex-auto flex-col max-w-full pt-16">
          <!-- Page Section -->
          <div class="max-w-10xl mx-auto p-4 lg:p-8 w-full">
            <!--

            ADD YOUR MAIN CONTENT BELOW

            -->


            <!-- Placeholder -->
            {{-- <div class="flex items-center justify-center rounded-xl bg-gray-50 border-2 border-dashed border-gray-200 text-gray-400 py-64">Content (max width 1920px)</div> --}}
            @yield('content')


            <!--

            ADD YOUR MAIN CONTENT ABOVE

            -->
          </div>
          <!-- END Page Section -->
        </main>
        <!-- END Page Content -->

        <!-- Page Footer -->
        <x-app.footer/>
        <!-- END Page Footer -->
      </div>
      <!-- END Page Container -->
</body>
<script>
    let open = true;
    document.addEventListener('DOMContentLoaded', function() {
        // code to be executed when the document is ready
        if(window.innerWidth < 1024) {
            toggleSidebar(false);
        }
    });
    function toggleSidebar(boolean) {
        const sidebar = document.getElementById("page-sidebar");
        const pageContainer = document.getElementById("page-container");
        const pageHeader = document.getElementById("page-header");
        if(boolean !== undefined) {
            open = !boolean;
        }
        if(!open) {
            sidebar.classList.remove("-translate-x-full");
            sidebar.classList.add("translate-x-0");
            pageContainer.classList.add("lg:pl-64");
            pageHeader.classList.add("lg:pl-64");
            open = true;
        } else {
            sidebar.classList.add("-translate-x-full");
            pageContainer.classList.remove("lg:pl-64");
            pageHeader.classList.remove("lg:pl-64");
            sidebar.classList.remove("translate-x-0");
            open = false;
        }
    }
</script>
</html>
