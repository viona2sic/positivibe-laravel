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
