<?php

namespace Drupal\frontpack\Generators;

use DrupalCodeGenerator\Command\BaseGenerator;
use DrupalCodeGenerator\Utils;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\ChoiceQuestion;

/**
 * Drush theme generator.
 */
class FrontpackGenerator extends BaseGenerator {
  protected $name = 'frontpack-theme';
  protected $description = 'Generates a frontpack theme.';
  protected $templatePath = __DIR__ . "/../../templates";
  protected $destination = 'themes';

  /** 
   * Prompt the user for desired theme options.
   */
  protected function interact(InputInterface $input, OutputInterface $output) {
    $questions['name'] = new Question('Theme name');
    $questions['machine_name'] = new Question('Theme machine name');
    $questions['description'] = new Question('Description', 'D8 Frontpack starter theme');

    $vars = $this->collectVars($input, $output, $questions);

    // Additional files.
    $option_questions['use_react'] = new ConfirmationQuestion('Will you be using React?', FALSE);
    $option_questions['utilities'] = new ConfirmationQuestion('Include utility scripts?', TRUE);

    $options = $this->collectVars($input, $output, $option_questions);

    $output->writeln('Creating sub theme!');

    $vars['base_theme'] = Utils::human2machine($vars['base_theme']);

    $location = 'custom/';

    $prefix = $vars['machine_name'] . '/' . $vars['machine_name'];

    // Core Frontpack stuff.
    $this->addFile()
      ->path($location . '{machine_name}/README.md')
      ->template('./README.md');

    $this->addFile()
      ->path($location . $prefix . '.info.yml')
      ->template('./theme-info.twig');

    $this->addFile()
      ->path($location . $prefix . '.libraries.yml')
      ->template('./theme-libraries.yml');

    // Starter js.
    $this->addDirectory()
      ->path($location . '{machine_name}/src/js');

    $this->addFile()
      ->path($location . '{machine_name}/src/js/theme.js')
      ->template('./theme.js');

    // Starter styles.
    $this->addDirectory()
      ->path($location . '{machine_name}/src/scss');

    $this->addDirectory()
      ->path($location . '{machine_name}/src/scss/globals');

    $this->addFile()
      ->path($location . '{machine_name}/src/scss/styles.scss')
      ->template('./scss/styles.scss');

    $this->addFile()
      ->path($location . '{machine_name}/src/scss/globals/_base.scss')
      ->template('./scss/globals/_base.scss');

    $this->addFile()
      ->path($location . '{machine_name}/src/scss/globals/_mixins.scss')
      ->template('./scss/globals/_mixins.scss');

    $this->addFile()
      ->path($location . '{machine_name}/src/scss/globals/_variables.scss')
      ->template('./scss/globals/_variables.scss');

    // Front end tools.
    $this->addFile()
      ->path($location . '{machine_name}/package.json')
      ->template('./package.twig');

    // Empty directories.
    $this->addDirectory()
      ->path($location . '{machine_name}/src/templates');

    $this->addDirectory()
      ->path($location . '{machine_name}/images');

    $this->addDirectory()
      ->path($location . '{machine_name}/build/');

    $this->addFile()
      ->path($location . '{machine_name}/.gitignore')
      ->template('./.gitignore');

    // Node and nvm install script.
    $this->addFile()
      ->path($location . '{machine_name}/install-node.sh')
      ->template('./install-node.sh');

    // Webpack build tasks
    $output->writeln('Adding webpack setup.');

    $this->addDirectory()
      ->path($location . '{machine_name}/config/');

    $this->addFile()
      ->path($location . '{machine_name}/config/webpack.common.js')
      ->template('./config/webpack.common.js');

    $this->addFile()
      ->path($location . '{machine_name}/config/webpack.dev.js')
      ->template('./config/webpack.dev.js');

    $this->addFile()
      ->path($location . '{machine_name}/config/webpack.prod.js')
      ->template('./config/webpack.prod.js');

    $this->addFile()
      ->path($location . '{machine_name}/config/postcss.config.js')
      ->template('./config/postcss.config.js');

    $this->addFile()
      ->path($location . '{machine_name}/.babelrc')
      ->template('./.babelrc');

    $this->addFile()
      ->path($location . '{machine_name}/.eslintrc')
      ->template('./.eslintrc');

    $this->addFile()
        ->path($location . '{machine_name}/.stylelintrc')
        ->template('./.stylelintrc');

    // Utility scripts
    if ($options['utilities']) {
      $this->addFile()
        ->path($location . '{machine_name}/tidy-export.sh')
        ->template('./tidy-export.sh');
      }
    }
}