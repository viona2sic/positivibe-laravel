// importing Hummingbird also wires up every data-bs-* component on the page
import '@hummingbirdui/hummingbird';

/* ---------- Tasks card ---------- */

// keeps "x of y remaining" in sync while tasks are checked or added
const taskList = document.querySelector('[data-task-list]');
const taskCount = document.querySelector('[data-task-count]');

if (taskList && taskCount) {
  let [remaining, total] = taskCount.textContent.match(/\d+/g).map(Number);
  const render = () => (taskCount.textContent = `${remaining} of ${total} remaining`);

  taskList.addEventListener('change', (event) => {
    if (event.target.matches('.form-check-input')) {
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
    item.className = 'form-check -ms-2.5';
    item.innerHTML = `
      <label for="${id}" class="form-check-input-wrapper">
        <input class="form-check-input form-check-info" type="checkbox" id="${id}" />
      </label>
      <label for="${id}" class="form-check-label ms-1.5 text-default"></label>`;
    item.querySelector('.form-check-label').textContent = title;
    taskList.append(item);

    total += 1;
    remaining += 1;
    render();
    input.value = '';
  });
}

/* ---------- Auth forms ---------- */

// <button data-password-toggle="#inputId"> shows/hides the password; icons swap via [data-visible]
document.addEventListener('click', (event) => {
  const button = event.target.closest('[data-password-toggle]');
  if (!button) return;
  const input = document.querySelector(button.dataset.passwordToggle);
  const visible = input.type === 'password';
  input.type = visible ? 'text' : 'password';
  button.toggleAttribute('data-visible', visible);
  button.setAttribute('aria-label', visible ? 'Hide password' : 'Show password');
});

// phone field: picking a country swaps the flag next to the number
document.addEventListener('click', (event) => {
  const option = event.target.closest('[data-phone-country]');
  if (!option) return;
  const field = option.closest('[data-phone]');
  field.querySelector('[data-phone-flag]').innerHTML = option.querySelector('svg').outerHTML;
  field.querySelector('input[type="tel"]').placeholder = `${option.dataset.phoneCountry} Phone number`;
  field.querySelector('input[type="tel"]').focus();
});

/* ---------- Demo links ---------- */

// placeholder links (href="#") shouldn't jump to the top of the page
document.addEventListener('click', (event) => {
  if (event.target.closest('a[href="#"]')) event.preventDefault();
});
