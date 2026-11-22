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
