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
