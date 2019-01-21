/**
* @file
* File contains JS for Theme.
*/

(function () {
  // Custom javascript
  console.warn('theme.js initialized. Start theming!');
})();

/* eslint-disable wrap-iife, func-names, no-param-reassign */
(function (Drupal, debounce) {
  Drupal.behaviors.viewport = {
    attach: (context, settings) => {
      let windowWidth = 0;

      /* Debounce listener for viewport changes */
      const viewportChange = debounce(() => {
        // Check only for changes in width.
        // Height changes on iOS navbar produce a false positive.
        const newWindowWidth = window.innerWidth
          || document.documentElement.clientWidth
          || document.body.clientWidth;

        if (windowWidth !== newWindowWidth) {
          windowWidth = newWindowWidth;
        }
      }, 300);

      /* Global event listeners */
      window.addEventListener('resize', viewportChange);

      /* Methods to execute on page load */
      viewportChange();
    },
  };
})(Drupal, Drupal.debounce);
