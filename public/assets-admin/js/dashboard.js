import * as echarts from 'echarts/core';
import { LineChart, PieChart } from 'echarts/charts';
import { GridComponent, TooltipComponent } from 'echarts/components';
import { CanvasRenderer } from 'echarts/renderers';

echarts.use([LineChart, PieChart, GridComponent, TooltipComponent, CanvasRenderer]);

/* ---------- Theme colors ---------- */

// read Rhombus theme tokens so the charts follow style.css
const token = (name) => getComputedStyle(document.documentElement).getPropertyValue(`--${name}`).trim();

const theme = () => ({
  font: getComputedStyle(document.body).fontFamily,
  primary: token('color-primary'),
  primaryLighter: token('color-primary-lighter'),
  text: token('text-color-default'),
  muted: token('text-color-muted'),
  border: token('border-color-default'),
  bg: token('background-color-default'),
});

const tooltip = (t) => ({
  backgroundColor: t.bg,
  borderColor: t.border,
  borderWidth: 1,
  padding: [6, 10],
  extraCssText: 'box-shadow: 0 4px 16px rgb(0 0 0 / 0.1); border-radius: 4px;',
  textStyle: { color: t.text, fontFamily: t.font, fontSize: 13 },
});

/* ---------- Email sent total (pie) ---------- */

// the legend under the pie is the data source, so chart and legend never disagree
const emails = [...document.querySelectorAll('[data-email]')].map((item) => ({
  name: item.dataset.email,
  value: Number(item.dataset.value),
  percent: Number(item.dataset.percent),
  color: item.dataset.color,
}));

const emailOptions = (t) => ({
  textStyle: { fontFamily: t.font },
  tooltip: { ...tooltip(t), trigger: 'item', formatter: ({ name, value }) => `${value} ${name}` },
  series: [
    {
      type: 'pie',
      radius: '98%',
      startAngle: 90,
      itemStyle: { borderColor: t.bg, borderWidth: 2 },
      label: {
        position: 'inside',
        color: '#fff',
        fontFamily: t.font,
        fontSize: 14,
        fontWeight: 600,
        formatter: ({ data }) => `${data.percent}%`,
      },
      labelLine: { show: false },
      emphasis: { scale: false },
      data: emails.map((e) => ({ ...e, itemStyle: { color: token(`color-${e.color}`) } })),
    },
  ],
});

/* ---------- Revenue (area line) ---------- */

// a deterministic, slightly noisy trend traced from the design: dips early, climbs late, eases off
const revenue = (() => {
  const keys = [
    [0, 66],
    [0.06, 66],
    [0.12, 57],
    [0.2, 52],
    [0.28, 46],
    [0.34, 37],
    [0.4, 37],
    [0.46, 44],
    [0.52, 52],
    [0.58, 56],
    [0.63, 56],
    [0.66, 64],
    [0.7, 82],
    [0.76, 86],
    [0.82, 92],
    [0.86, 100],
    [0.9, 92],
    [0.95, 93],
    [1, 74],
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
  return Array.from({ length: 120 }, (_, i) => Math.round((at(i / 119) + rand() * 2.2) * 10) / 10);
})();

const revenueOptions = (t) => ({
  textStyle: { fontFamily: t.font },
  grid: { top: 0, right: 0, bottom: 0, left: 0 },
  tooltip: {
    ...tooltip(t),
    trigger: 'axis',
    axisPointer: { type: 'line', lineStyle: { color: t.border } },
    valueFormatter: (v) => `$${(v * 1000).toLocaleString()}`,
  },
  xAxis: { type: 'category', data: revenue.map((_, i) => `Day ${i + 1}`), boundaryGap: false, show: false },
  yAxis: { type: 'value', min: 0, max: 104, show: false },
  series: [
    {
      type: 'line',
      data: revenue,
      showSymbol: false,
      symbolSize: 6,
      smooth: 0.3,
      lineStyle: { width: 2, color: t.primary },
      itemStyle: { color: t.primary },
      areaStyle: { color: t.primaryLighter, opacity: 1 },
    },
  ],
});

/* ---------- Render ---------- */

const charts = [
  ['emailChart', emailOptions],
  ['revenueChart', revenueOptions],
]
  .map(([id, options]) => ({ el: document.getElementById(id), options }))
  .filter(({ el }) => el)
  .map(({ el, options }) => ({ el, options, chart: echarts.init(el) }));

const t = theme();
const draw = ({ chart, options }) => chart.setOption(options(t), true);
charts.forEach(draw);

const resizeObserver = new ResizeObserver((entries) =>
  entries.forEach(({ target }) => {
    const entry = charts.find(({ el }) => el === target);
    if (!entry) return;
    entry.chart.resize();
  }),
);
charts.forEach(({ el }) => resizeObserver.observe(el));
