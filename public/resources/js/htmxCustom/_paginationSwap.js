import scrollToTop from '../helpers/dom/scroll';

function updatePaginationContainer(previousUrl, htmxReference) {
  if (!htmxReference) return;

  htmxReference.ajax('GET', previousUrl, {
    target: '[data-js="pagination-container"]',
    select: "[data-js='pagination-container']",
  });
}

document.addEventListener('htmx:afterSwap', function resultItensContainer(evt) {
  const eventIsResultContainer =
    evt.detail.target.matches('[data-js="result-itens-container"]');

  if (!eventIsResultContainer) return;

  const eventCurrentUrl = window.location.href;

  updatePaginationContainer(eventCurrentUrl, window.htmx);

  scrollToTop('[data-js="top-page-header"]');
});