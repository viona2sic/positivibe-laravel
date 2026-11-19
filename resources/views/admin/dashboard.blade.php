@php
    $site = json_decode(file_get_contents(public_path('assets-admin/data/site.json')), true);

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
@endphp
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Overview – {{ $site['name'] ?? 'Dashboard' }}</title>
    <meta name="description" content="{{ $site['description'] ?? '' }}" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets-admin/images/Logo.svg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: {
                lighter: '#efecf4',
                light: '#a08cc2',
                DEFAULT: '#775da6',
                dark: '#634c8d',
                darker: '#3d2f57',
              },
              secondary: {
                lighter: '#feeeed',
                light: '#ffb1b7',
                DEFAULT: '#f9837c',
                dark: '#e86b64',
                darker: '#8f3a35',
              },
              info: {
                lighter: '#eaf5f7',
                light: '#a3d1d8',
                DEFAULT: '#70b6c1',
                dark: '#579ea9',
                darker: '#2d5d65',
              },
              warning: {
                lighter: '#fdf7e5',
                light: '#f8de95',
                DEFAULT: '#f3cc5c',
                dark: '#dcb33f',
                darker: '#7d6419',
              },
              default: '#202020',
              muted: '#898989',
              subtle: '#f9f9f9',
            }
          }
        }
      }
    </script>
    <style>
      :root {
        --font-sans: 'Inter', ui-sans-serif, system-ui, sans-serif;
        --color-primary-lighter: #efecf4;
        --color-primary-light: #a08cc2;
        --color-primary: #775da6;
        --color-primary-dark: #634c8d;
        --color-primary-darker: #3d2f57;
        --color-secondary-lighter: #feeeed;
        --color-secondary-light: #ffb1b7;
        --color-secondary: #f9837c;
        --color-secondary-dark: #e86b64;
        --color-secondary-darker: #8f3a35;
        --color-info-lighter: #eaf5f7;
        --color-info-light: #a3d1d8;
        --color-info: #70b6c1;
        --color-info-dark: #579ea9;
        --color-info-darker: #2d5d65;
        --color-warning-lighter: #fdf7e5;
        --color-warning-light: #f8de95;
        --color-warning: #f3cc5c;
        --color-warning-dark: #dcb33f;
        --color-warning-darker: #7d6419;
        --background-color-default: #ffffff;
        --background-color-subtle: #f9f9f9;
        --background-color-muted: #f3f3f3;
        --background-color-highlight: #ebebeb;
        --background-color-emphasis: #dcdcdc;
        --text-color-subtle: #b9b9b9;
        --text-color-muted: #898989;
        --text-color-default: #202020;
        --text-color-highlight: #202020;
        --text-color-emphasis: #000000;
        --border-color-subtle: #ececec;
        --border-color-muted: #e3e3e3;
        --border-color-default: #dcdcdc;
        --shadow-card: 0 1px 4px 0 rgb(0 0 0 / 0.06);
        --topbar-height: 4.5rem;
        --sidebar-width: 15.625rem;
      }
      body {
        font-family: var(--font-sans);
        background-color: var(--background-color-subtle);
        color: var(--text-color-default);
        margin: 0;
      }
      .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 2.5rem;
        min-width: 8rem;
        padding: 0 0.875rem;
        font-weight: 500;
        font-size: 0.875rem;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.15s ease-in-out;
        border: 1px solid transparent;
        text-decoration: none;
      }
      .btn-primary {
        background-color: var(--color-primary);
        color: #fff;
      }
      .btn-primary:hover {
        background-color: var(--color-primary-dark);
      }
      .btn-outline-neutral {
        background-color: #fff;
        border-color: var(--border-color-default);
        color: var(--text-color-default);
      }
      .btn-outline-neutral:hover {
        background-color: var(--background-color-subtle);
      }
      .btn-icon {
        min-width: 0;
        height: auto;
        padding: 0.5rem;
        background: transparent;
        border: none;
        cursor: pointer;
      }
      .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: var(--shadow-card);
        padding: 1.5rem;
      }
      .card-body {
        display: flex;
        flex-direction: column;
        height: 100%;
      }
      .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-color-default);
        margin-bottom: 0.25rem;
      }
      .card-subtitle {
        font-size: 0.875rem;
        color: var(--text-color-muted);
      }
      .form-control {
        background-color: var(--background-color-subtle);
        border: 1px solid transparent;
        border-radius: 8px;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        outline: none;
        width: 100%;
      }
      .form-control:focus {
        background-color: #fff;
        border-color: var(--color-primary);
      }
      .form-control-bordered {
        background-color: #fff;
        border: 1px solid var(--border-color-default);
      }
      .progress {
        height: 4px;
        background-color: var(--border-color-default);
        border-radius: 0;
        overflow: hidden;
        width: 100%;
      }
      .progress-bar {
        height: 100%;
      }
      .table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.875rem;
      }
      .table th {
        text-align: left;
        font-weight: 400;
        color: var(--text-color-muted);
        border-bottom: 1px solid var(--border-color-default);
        padding: 0.75rem 1rem;
      }
      .table td {
        padding: 1rem;
        border-bottom: 1px solid var(--border-color-subtle);
      }
      .table-striped-odd tbody tr:nth-of-type(odd) {
        background-color: var(--background-color-subtle);
      }
      .badge-secondary {
        background-color: var(--color-secondary-lighter);
        color: var(--color-secondary-darker);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9999px;
        padding: 0.125rem 0.5rem;
        font-size: 0.75rem;
      }
      .dropdown-menu.show {
        display: block !important;
      }
      @media (max-width: 1023px) {
        #sidebar {
          position: fixed;
          top: 0;
          left: -100%;
          height: 100vh;
          z-index: 50;
          transition: left 0.3s ease-in-out;
          box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        #sidebar.active-sidebar {
          left: 0;
        }
      }
    </style>
  </head>
  <body class="bg-subtle">
    <div class="lg:grid lg:grid-cols-[15.625rem_1fr] min-h-screen">
      <!-- Sidebar -->
      <aside
        class="w-[15.625rem] border-r border-[#dcdcdc] bg-white lg:sticky lg:top-0 lg:h-dvh flex flex-col"
        tabindex="-1"
        id="sidebar"
        aria-label="Main navigation"
      >
        <div class="flex h-full flex-col">
          <!-- Logo & Hamburger for mobile close -->
          <div class="flex h-[4.5rem] shrink-0 items-center gap-3 ps-6 border-b border-[#dcdcdc] lg:border-b-0">
            <button
              type="button"
              class="btn btn-icon size-auto p-0 text-muted lg:hidden"
              data-bs-dismiss="offcanvas"
              data-bs-target="#sidebar"
              aria-label="Close navigation"
            >
              {!! $icon('menu', 'text-muted') !!}
            </button>
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-1.5 text-[1.3125rem] leading-none font-bold text-default no-underline">
              <img src="{{ asset('assets-admin/images/Logo.svg') }}" width="24" height="24" alt="" />
              {{ $site['name'] ?? 'Rhombus' }}
            </a>
          </div>

          <!-- Nav Items -->
          <nav class="grow overflow-y-auto px-3 pt-3">
            <div class="flex flex-col gap-0.5">
              @foreach ($site['nav'] as $item)
                @if (!empty($item['children']))
                  <div class="flex h-13 items-center gap-2.5 rounded-[10px] ps-[15px] pe-3 py-2 text-muted">
                    {!! $icon($item['icon'], 'text-muted shrink-0', 20) !!}
                    <span class="grow text-sm font-medium">{{ $item['name'] }}</span>
                  </div>
                  @foreach ($item['children'] as $child)
                    <a
                      href="#"
                      class="flex h-10 items-center rounded-[10px] ps-[49px] pe-3 text-sm text-muted no-underline hover:text-default hover:bg-gray-100 transition"
                    >
                      {{ $child['name'] }}
                    </a>
                  @endforeach
                @elseif (!empty($item['href']))
                  <a
                    href="{{ url('/admin/dashboard') }}"
                    class="flex h-12 items-center gap-2.5 rounded-[10px] ps-[15px] pe-3 text-sm font-medium no-underline transition {{ ($item['page'] ?? '') === 'dashboard' ? 'bg-[#efecf4] text-[#775da6]' : 'text-muted hover:bg-gray-100 hover:text-default' }}"
                  >
                    {!! $icon($item['icon'], ($item['page'] ?? '') === 'dashboard' ? 'text-primary shrink-0' : 'text-muted shrink-0', 20) !!}
                    <span class="grow text-default font-medium">{{ $item['name'] }}</span>
                    @if (!empty($item['chevron']))
                      {!! $icon('chevron-right', 'text-muted shrink-0', 18) !!}
                    @endif
                    @if (!empty($item['badge']))
                      <span class="badge-secondary">{{ $item['badge'] }}</span>
                    @endif
                  </a>
                @else
                  <span class="flex h-12 items-center gap-2.5 rounded-[10px] ps-[15px] pe-3 text-sm text-muted opacity-75">
                    {!! $icon($item['icon'], 'text-muted shrink-0', 20) !!}
                    <span class="grow font-medium">{{ $item['name'] }}</span>
                    @if (!empty($item['chevron']))
                      {!! $icon('chevron-right', 'text-muted shrink-0', 18) !!}
                    @endif
                    @if (!empty($item['badge']))
                      <span class="badge-secondary opacity-60">{{ $item['badge'] }}</span>
                    @endif
                  </span>
                @endif
              @endforeach
            </div>
          </nav>

          <div class="px-6 pt-6 pb-5">
            <p class="mb-2 text-base font-semibold text-default">{{ $site['name'] ?? 'Rhombus' }} UI Kit</p>
            <p class="mb-0 text-xs leading-[1.75] text-muted">
              Want to get more info<br />
              about {{ $site['name'] ?? 'Rhombus' }}?
              <a href="#" class="underline text-primary" style="color: var(--color-primary);">Contact us</a>
            </p>
          </div>
        </div>
      </aside>

      <!-- Main container -->
      <div class="flex min-h-dvh min-w-0 flex-col">
        <!-- Topbar -->
        <header class="sticky top-0 z-10 flex h-[4.5rem] items-center gap-4 border-b border-[#dcdcdc] bg-white px-4 sm:px-6 lg:px-8">
          <button
            type="button"
            class="btn btn-icon size-auto p-0 text-muted lg:hidden"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebar"
            aria-controls="sidebar"
            aria-label="Open navigation"
          >
            {!! $icon('menu', 'text-muted') !!}
          </button>
          <h1 class="sr-only">Overview</h1>

          <form class="hidden w-full max-w-75 md:block" role="search" action="#">
            <div class="relative flex items-center">
              <span class="absolute left-3 text-muted">
                {!! $icon('search', 'text-muted', 18) !!}
              </span>
              <input type="search" class="form-control h-9 py-0 ps-9" placeholder="Search..." aria-label="Search" />
            </div>
          </form>

          <div class="ms-auto flex items-center gap-4 lg:-me-2">
            <a href="#" class="text-muted hover:text-default" aria-label="Help">{!! $icon('help', 'text-muted') !!}</a>

            <!-- Notifications Dropdown -->
            <div class="dropdown relative">
              <button type="button" class="relative flex text-muted hover:text-default cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications">
                {!! $icon('notifications', 'text-muted') !!}
                <span class="absolute end-0.5 top-0.5 size-2 rounded-full ring-2 ring-white" style="background-color: var(--color-secondary);"></span>
              </button>
              <div class="dropdown-menu hidden absolute right-0 mt-2 w-72 bg-white border border-[#dcdcdc] rounded-lg shadow-lg z-20 py-2">
                <h6 class="px-4 py-1 text-xs font-semibold text-muted uppercase tracking-wider">Notifications</h6>
                <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">New deal won from Lee Barrett</a>
                <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">3 tasks are due today</a>
                <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Campaign "Spring" was sent</a>
              </div>
            </div>

            <!-- User Dropdown -->
            <div class="dropdown relative ms-2.5">
              <button type="button" class="flex items-center gap-2 text-start cursor-pointer border-0 bg-transparent p-0" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets-admin/' . ($site['user']['avatar'] ?? 'images/avatars/katie.webp')) }}" alt="" class="size-8 rounded-full object-cover" />
                <span class="hidden leading-tight sm:block">
                  <span class="block text-sm font-semibold text-default">{{ $site['user']['name'] ?? 'Admin' }}</span>
                  <span class="block text-xs text-muted">{{ $site['user']['role'] ?? 'User' }}</span>
                </span>
              </button>
              <div class="dropdown-menu hidden absolute right-0 mt-2 w-44 bg-white border border-[#dcdcdc] rounded-lg shadow-lg z-20 py-1">
                <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Profile</a>
                <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Settings</a>
                <hr class="my-1 border-t border-[#dcdcdc]" />
                <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Sign out</a>
              </div>
            </div>
          </div>
        </header>

        <!-- Main Content -->
        <main class="grow p-4 sm:p-6 lg:p-8">
          <!-- Header -->
          <div class="mb-7 flex flex-wrap items-start justify-between gap-6">
            <div>
              <h2 class="mb-2 text-3xl font-bold text-default">Hi {{ $site['user']['name'] ?? 'User' }}</h2>
              <p class="mb-0 text-sm text-muted">Welcome back to {{ $site['name'] ?? 'Rhombus' }} CRM dashboard</p>
            </div>
            <div class="flex flex-wrap gap-4 pt-1.5">
              <button type="button" class="btn btn-outline-neutral flex items-center gap-2">
                {!! $icon('file-download', 'text-muted', 20) !!}Download
              </button>
              <button type="button" class="btn btn-primary">+ Add Dashlet</button>
            </div>
          </div>

          <!-- Stat Cards -->
          <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($site['stats'] ?? [] as $stat)
              <div class="card">
                <div class="card-body">
                  <div class="flex items-start justify-between gap-2">
                    <div>
                      <p class="mb-1 text-2xl font-bold text-default">{{ $stat['value'] }}</p>
                      <p class="mb-0 whitespace-nowrap text-xs text-muted">{{ $stat['label'] }}</p>
                    </div>
                    <span style="color: var(--color-{{ $stat['color'] }});">
                      {!! $icon($stat['icon'], 'shrink-0', 26) !!}
                    </span>
                  </div>
                  <div class="mt-5 flex items-center gap-4">
                    <div class="progress grow" role="progressbar" aria-label="{{ $stat['label'] }}" aria-valuenow="{{ $stat['percent'] }}" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: {{ $stat['percent'] }}%; background-color: var(--color-{{ $stat['color'] }});"></div>
                    </div>
                    <span class="text-xs text-muted">{{ $stat['percent'] }}%</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Charts -->
          <div class="mt-4 grid gap-3 md:grid-cols-2 xl:grid-cols-3">
            <!-- Email Sent Total -->
            <div class="card">
              <div class="card-body flex flex-col">
                <div class="flex items-start justify-between">
                  <div>
                    <h3 class="card-title">Email Sent Total</h3>
                    <p class="card-subtitle mb-0">March 2020</p>
                  </div>
                  <div class="dropdown relative -me-2 -mt-1">
                    <button type="button" class="btn btn-icon size-8 min-w-0 rounded-full p-0 text-muted hover:text-default" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More options">
                      {!! $icon('more-vert') !!}
                    </button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 bg-white border border-[#dcdcdc] rounded-lg shadow-lg z-20 py-1">
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">View details</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Export</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Remove</a>
                    </div>
                  </div>
                </div>
                <div id="emailChart" class="mx-auto mt-3 mb-5 w-56 h-56" role="img" aria-label="Emails: 860 sent, 730 opened, 234 spam"></div>
                <ul class="mt-auto mb-0 flex list-none flex-wrap justify-center gap-x-6 gap-y-2 ps-0 text-xs text-muted">
                  @foreach ($site['emails'] ?? [] as $email)
                    <li class="flex items-center gap-2" data-email="{{ $email['name'] }}" data-value="{{ $email['value'] }}" data-percent="{{ $email['percent'] }}" data-color="{{ $email['color'] }}">
                      <span class="size-2 rounded-full" style="background-color: var(--color-{{ $email['color'] }});"></span>{{ $email['value'] }} {{ $email['name'] }}
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>

            <!-- Income Amounts -->
            <div class="card">
              <div class="card-body flex flex-col">
                <div class="flex items-start justify-between">
                  <h3 class="card-title mb-0">Income Amounts</h3>
                  <div class="dropdown relative -me-2 -mt-1">
                    <button type="button" class="btn btn-icon size-8 min-w-0 rounded-full p-0 text-muted hover:text-default" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More options">
                      {!! $icon('more-vert') !!}
                    </button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 bg-white border border-[#dcdcdc] rounded-lg shadow-lg z-20 py-1">
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">View details</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Export</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Remove</a>
                    </div>
                  </div>
                </div>
                <div class="mt-11 mb-6 flex min-h-[11.5rem] grow items-end justify-between gap-1" role="img" aria-label="Income by month">
                  @foreach ($site['incomeBars'] ?? [] as $bar)
                    <span class="w-2 rounded-sm transition-colors hover:opacity-80" style="height: {{ $bar['height'] }}%; background-color: var(--color-primary);" title="{{ $bar['month'] }}: {{ $bar['amount'] }}"></span>
                  @endforeach
                </div>
                <div class="grid grid-cols-3 gap-4">
                  @foreach ($site['income'] ?? [] as $inc)
                    <div>
                      <p class="mb-1 whitespace-nowrap text-default text-xs">{{ $inc['label'] }}</p>
                      @if ($inc['up'])
                        <p class="mb-0 flex items-center text-sm font-semibold" style="color: var(--color-info);">
                          {!! $icon('arrow-drop-up', '-ms-1.5', 20) !!}{{ $inc['value'] }}
                        </p>
                      @else
                        <p class="mb-0 flex items-center text-sm font-semibold" style="color: var(--color-secondary);">
                          {!! $icon('arrow-drop-down', '-ms-1.5', 20) !!}{{ $inc['value'] }}
                        </p>
                      @endif
                    </div>
                  @endforeach
                </div>
              </div>
            </div>

            <!-- Revenue -->
            <div class="card md:col-span-2 xl:col-span-1">
              <div class="card-body flex flex-col">
                <div class="flex items-start justify-between">
                  <h3 class="card-title mb-0">Revenue</h3>
                  <div class="dropdown relative -me-2 -mt-1">
                    <button type="button" class="btn btn-icon size-8 min-w-0 rounded-full p-0 text-muted hover:text-default" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More options">
                      {!! $icon('more-vert') !!}
                    </button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 bg-white border border-[#dcdcdc] rounded-lg shadow-lg z-20 py-1">
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">View details</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Export</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Remove</a>
                    </div>
                  </div>
                </div>
                <p class="mt-6 mb-1 text-3xl font-bold text-default">$165,750.23</p>
                <p class="mb-0 text-sm text-muted">Won from 262 Deals</p>
                <div id="revenueChart" class="mt-4 min-h-[12.5rem] grow w-full" role="img" aria-label="Revenue trend"></div>
              </div>
            </div>
          </div>

          <!-- Performance & Tasks -->
          <div class="mt-4 grid gap-3 xl:grid-cols-3">
            <!-- Top Performance -->
            <div class="card xl:col-span-2">
              <div class="card-body">
                <div class="flex items-start justify-between">
                  <div>
                    <h3 class="card-title">Top Performance</h3>
                    <p class="card-subtitle mb-0">Last 2 Weeks</p>
                  </div>
                  <div class="dropdown relative -me-2 -mt-1">
                    <button type="button" class="btn btn-icon size-8 min-w-0 rounded-full p-0 text-muted hover:text-default" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More options">
                      {!! $icon('more-vert') !!}
                    </button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 bg-white border border-[#dcdcdc] rounded-lg shadow-lg z-20 py-1">
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">View details</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Export</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Remove</a>
                    </div>
                  </div>
                </div>
                <div class="mt-4 overflow-x-auto">
                  <table class="table table-striped-odd whitespace-nowrap">
                    <thead>
                      <tr>
                        <th scope="col" class="w-12">No</th>
                        <th scope="col">Ref</th>
                        <th scope="col">Leads</th>
                        <th scope="col">Deals</th>
                        <th scope="col">Tasks</th>
                        <th scope="col" class="text-end">Rate</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($site['performers'] ?? [] as $index => $performer)
                        <tr>
                          <td>{{ $index + 1 }}.</td>
                          <td>
                            <div class="flex items-center gap-3">
                              <img src="{{ asset('assets-admin/' . $performer['avatar']) }}" alt="" class="size-10 shrink-0 rounded-full object-cover" />
                              <div class="leading-tight">
                                <a href="#" class="block text-default font-semibold no-underline hover:text-primary">{{ $performer['name'] }}</a>
                                <span class="text-muted text-xs">{{ $performer['amount'] }}</span>
                              </div>
                            </div>
                          </td>
                          <td>{{ $performer['leads'] }}</td>
                          <td>{{ $performer['deals'] }}</td>
                          <td>{{ $performer['tasks'] }} Tasks Done</td>
                          <td class="text-end">
                            <span class="inline-flex items-center justify-end gap-1.5 font-medium">
                              <svg width="18" height="18" viewBox="0 0 18 18" class="-rotate-90" style="color: {{ $performer['rate'] >= 90 ? 'var(--color-primary)' : 'var(--color-info)' }};" aria-hidden="true">
                                <circle cx="9" cy="9" r="7.5" fill="none" stroke="currentColor" stroke-width="1.75" pathLength="100" stroke-dasharray="{{ $performer['rate'] }} 100" />
                              </svg>
                              {{ $performer['rate'] }}%
                            </span>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Tasks -->
            <div class="card">
              <div class="card-body flex flex-col">
                <div class="flex items-start justify-between">
                  <div>
                    <h3 class="card-title">Tasks</h3>
                    <p class="card-subtitle mb-0" data-task-count>4 of {{ $site['tasks']['total'] ?? 8 }} remaining</p>
                  </div>
                  <div class="dropdown relative -me-2 -mt-1">
                    <button type="button" class="btn btn-icon size-8 min-w-0 rounded-full p-0 text-muted hover:text-default" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More options">
                      {!! $icon('more-vert') !!}
                    </button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-36 bg-white border border-[#dcdcdc] rounded-lg shadow-lg z-20 py-1">
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">View details</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Export</a>
                      <a class="block px-4 py-2 text-sm text-default hover:bg-gray-100 no-underline" href="#">Remove</a>
                    </div>
                  </div>
                </div>
                <ul class="mt-6 mb-8 flex list-none flex-col ps-0 gap-3" data-task-list data-total="{{ $site['tasks']['total'] ?? 8 }}">
                  @foreach ($site['tasks']['items'] ?? [] as $index => $tItem)
                    <li class="flex items-center gap-2 -ms-1">
                      <input class="size-4.5 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer" type="checkbox" id="task-{{ $index }}" {{ !empty($tItem['done']) ? 'checked' : '' }} />
                      <label for="task-{{ $index }}" class="ms-1.5 text-sm text-default cursor-pointer {{ !empty($tItem['done']) ? 'line-through text-muted' : '' }}">{{ $tItem['title'] }}</label>
                    </li>
                  @endforeach
                </ul>
                <form class="mt-auto relative flex" data-task-form>
                  <input type="text" class="form-control form-control-bordered rounded-lg pr-16" placeholder="Add new todo" aria-label="New todo" required />
                  <button type="submit" class="btn btn-primary min-w-[4rem] px-3 rounded-lg absolute right-0 top-0 h-full">Add</button>
                </form>
              </div>
            </div>
          </div>
        </main>

        <!-- Footer -->
        <footer class="mt-auto flex flex-col items-center justify-between gap-2 px-4 pb-6 text-xs text-muted sm:flex-row sm:px-6 lg:px-8">
          <p class="mb-0">Designed by Designspace Team</p>
          <p class="mb-0 flex items-center gap-1">
            Made with <span style="color: var(--color-secondary);">{!! $icon('favorite', '', 16) !!}</span><span class="sr-only">love</span> by
            <a href="https://themewagon.com" target="_blank" rel="noopener" class="underline font-medium" style="color: var(--color-primary);">ThemeWagon</a>
          </p>
        </footer>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
    <script>
      // Dropdowns
      document.addEventListener('click', (event) => {
        const toggle = event.target.closest('[data-bs-toggle="dropdown"]');
        document.querySelectorAll('.dropdown-menu.show').forEach((menu) => {
          if (!toggle || menu !== toggle.nextElementSibling) {
            menu.classList.remove('show');
          }
        });
        if (toggle) {
          const menu = toggle.nextElementSibling;
          if (menu && menu.classList.contains('dropdown-menu')) {
            menu.classList.toggle('show');
          }
        }
      });

      // Mobile offcanvas sidebar
      document.addEventListener('click', (event) => {
        const openBtn = event.target.closest('[data-bs-toggle="offcanvas"]');
        const closeBtn = event.target.closest('[data-bs-dismiss="offcanvas"]');
        const sidebar = document.getElementById('sidebar');
        if (openBtn && sidebar) {
          sidebar.classList.toggle('active-sidebar');
        }
        if (closeBtn && sidebar) {
          sidebar.classList.remove('active-sidebar');
        }
      });

      // Interactive tasks
      const taskList = document.querySelector('[data-task-list]');
      const taskCount = document.querySelector('[data-task-count]');

      if (taskList && taskCount) {
        const matches = taskCount.textContent.match(/\d+/g);
        let remaining = matches ? Number(matches[0]) : 4;
        let total = matches ? Number(matches[1]) : 8;
        const render = () => (taskCount.textContent = `${remaining} of ${total} remaining`);

        taskList.addEventListener('change', (event) => {
          if (event.target.matches('input[type="checkbox"]')) {
            const label = event.target.closest('li')?.querySelector('label');
            if (label) {
              label.classList.toggle('line-through', event.target.checked);
              label.classList.toggle('text-muted', event.target.checked);
            }
            remaining += event.target.checked ? -1 : 1;
            render();
          }
        });

        document.querySelector('[data-task-form]')?.addEventListener('submit', (event) => {
          event.preventDefault();
          const input = event.target.querySelector('input');
          const title = input.value.trim();
          if (!title) return;

          const id = `task-${Date.now()}`;
          const item = document.createElement('li');
          item.className = 'flex items-center gap-2 -ms-1';
          item.innerHTML = `
            <input class="size-4.5 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer" type="checkbox" id="${id}" />
            <label for="${id}" class="ms-1.5 text-sm text-default cursor-pointer"></label>`;
          item.querySelector('label').textContent = title;
          taskList.append(item);

          total += 1;
          remaining += 1;
          render();
          input.value = '';
        });
      }

      // ECharts
      document.addEventListener('DOMContentLoaded', () => {
        if (typeof echarts === 'undefined') return;

        // Email Chart
        const emailEl = document.getElementById('emailChart');
        if (emailEl) {
          const chart = echarts.init(emailEl);
          chart.setOption({
            tooltip: {
              trigger: 'item',
              formatter: ({ name, value }) => `${value} ${name}`,
              backgroundColor: '#fff',
              borderColor: '#dcdcdc',
              borderWidth: 1,
              textStyle: { color: '#202020', fontFamily: 'Inter' }
            },
            series: [{
              type: 'pie',
              radius: '95%',
              startAngle: 90,
              itemStyle: { borderColor: '#fff', borderWidth: 2 },
              label: {
                position: 'inside',
                color: '#fff',
                fontFamily: 'Inter',
                fontSize: 14,
                fontWeight: 600,
                formatter: '{d}%'
              },
              labelLine: { show: false },
              data: [
                { value: 860, name: 'send', itemStyle: { color: '#775da6' } },
                { value: 730, name: 'open', itemStyle: { color: '#ffb1b7' } },
                { value: 234, name: 'spam', itemStyle: { color: '#70b6c1' } }
              ]
            }]
          });
        }

        // Revenue Chart
        const revenueEl = document.getElementById('revenueChart');
        if (revenueEl) {
          const chart = echarts.init(revenueEl);
          const keys = [
            [0, 66], [0.06, 66], [0.12, 57], [0.2, 52], [0.28, 46],
            [0.34, 37], [0.4, 37], [0.46, 44], [0.52, 52], [0.58, 56],
            [0.63, 56], [0.66, 64], [0.7, 82], [0.76, 86], [0.82, 92],
            [0.86, 100], [0.9, 92], [0.95, 93], [1, 74]
          ];
          const at = (x) => {
            const i = keys.findIndex(([kx]) => kx >= x);
            if (i <= 0) return keys[0][1];
            const [x0, y0] = keys[i - 1];
            const [x1, y1] = keys[i];
            return y0 + ((y1 - y0) * (x - x0)) / (x1 - x0);
          };
          let seed = 11;
          const rand = () => ((seed = (seed * 16807) % 2147483647) / 2147483647 - 0.5) * 2;
          const revenueData = Array.from({ length: 120 }, (_, i) => Math.round((at(i / 119) + rand() * 2.2) * 10) / 10);

          chart.setOption({
            grid: { top: 0, right: 0, bottom: 0, left: 0 },
            tooltip: {
              trigger: 'axis',
              valueFormatter: (v) => `$${(v * 1000).toLocaleString()}`,
              backgroundColor: '#fff',
              borderColor: '#dcdcdc',
              borderWidth: 1,
              textStyle: { color: '#202020', fontFamily: 'Inter' }
            },
            xAxis: { type: 'category', boundaryGap: false, show: false, data: revenueData.map((_, i) => `Day ${i + 1}`) },
            yAxis: { type: 'value', min: 0, max: 104, show: false },
            series: [{
              type: 'line',
              data: revenueData,
              showSymbol: false,
              smooth: 0.3,
              lineStyle: { width: 2, color: '#775da6' },
              areaStyle: { color: '#efecf4', opacity: 1 }
            }]
          });
        }
      });
    </script>
  </body>
</html>
