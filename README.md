# Frontpack

## A Modern, Frontend-focused Theme Generator

### Quick start guide:

1. `cd docroot/modules/custom/`

2. `git clone https://github.com/tokyorachel/frontpack`

3. `drush en frontpack`

4. You should not try to to use the frontpack module directly as a base theme. Instead, the module provides drush commands for generating your own custom theme using the frontpack toolkit including webpack, babel, sass, and linting.

`drush gen frontpack`

You will be prompted to answer a few questions about your new theme.

5. Once your new theme has been created, enable it and set it as the default to begin working with it:

`drush theme:enable [your_theme_name]`

`drush config-set system.theme default [your_theme_name]`

(You can also enable and set as the default using your site's Admin UI, go to "Appearance," find "frontpack" and click "Install and set as default.")

6. You will need to build the styles and js before you can see your nifty new theme. Go to the Frontpack README in your new subtheme directory at /docroot/themes/custom/your-theme-name and read how to develop and extend this modern, frontend-focused starter kit!
