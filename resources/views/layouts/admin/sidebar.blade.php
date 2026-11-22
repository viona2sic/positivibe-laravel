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
