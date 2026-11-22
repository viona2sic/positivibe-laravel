@php
    $site = $site ?? json_decode(file_get_contents(public_path('assets-admin/data/site.json')), true);

    if (!isset($icon)) {
        $icons = [
            'dashboard' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>',
            'lock' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>',
            'business' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/></svg>',
            'briefcase-check' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4A2,2 0 0,1 2,19V8A2,2 0 0,1 4,6H8V4A2,2 0 0,1 10,2M14,6V4H10V6H14M10.5,17.5L17.09,10.91L15.68,9.5L10.5,14.67L8.41,12.59L7,14L10.5,17.5Z"/></svg>',
            'account-box' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/></svg>',
            'assignment' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>',
            'event-note' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>',
            'email' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>',
            'description' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>',
            'menu' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>',
            'chevron-right' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M10 6 8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>',
            'search' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>',
            'help' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 16h-2v-2h2v2zm1.07-7.75-.9.92C12.45 11.9 12 12.5 12 14h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H7c0-2.76 2.24-5 5-5s5 2.24 5 5c0 1.04-.42 1.99-1.07 2.75z"/></svg>',
            'notifications' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M12 22c1.1 0 2-.9 2-2h-4a2 2 0 0 0 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/></svg>',
            'account-balance-wallet' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M21 18v1c0 1.1-.9 2-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14c1.1 0 2 .9 2 2v1h-9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>',
            'trending-up' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="m16 6 2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/></svg>',
            'send' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M2.01 21 23 12 2.01 3 2 10l15 2-15 2z"/></svg>',
            'file-download' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>',
            'arrow-drop-up' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="m7 14 5-5 5 5z"/></svg>',
            'arrow-drop-down' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="m7 10 5 5 5-5z"/></svg>',
            'more-vert' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>',
            'favorite' => '<svg xmlns="http://www.w3.org/2000/svg" width=":size" height=":size" class=":class" fill="currentColor" viewBox="0 0 24 24"><path d="m12 21.35-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>',
        ];

        $icon = function($name, $class = '', $size = 24) use ($icons) {
            if (!isset($icons[$name])) return '';
            return str_replace([':size', ':class'], [$size, $class], $icons[$name]);
        };
    }
@endphp
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Overview – ' . ($site['name'] ?? 'Dashboard'))</title>
    <meta name="description" content="{{ $site['description'] ?? '' }}" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets-admin/images/Logo.svg') }}" />
    @include('layouts.admin.css')
  </head>
  <body class="bg-subtle">
    <div class="lg:grid lg:grid-cols-[15.625rem_1fr] min-h-screen">
      <!-- Sidebar -->
      @include('layouts.admin.sidebar')

      <!-- Main container -->
      <div class="flex min-h-dvh min-w-0 flex-col">
        <!-- Topbar / Header -->
        @include('layouts.admin.header')

        <!-- Main Content -->
        <main class="grow p-4 sm:p-6 lg:p-8">
          @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.admin.footer')
      </div>
    </div>

    <!-- Scripts -->
    @include('layouts.admin.js')
  </body>
</html>
