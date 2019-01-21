/**
* @file
* File contains JS for Theme.
*/

/* eslint-disable wrap-iife, func-names, no-param-reassign */

(function () {
  // Custom javascript
  console.log('theme.js initialized. Start theming!');
})();

(function (Drupal, debounce) {
  Drupal.behaviors.viewport = {
    attach: () => { // 'context' and 'settings' parameters are available
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
