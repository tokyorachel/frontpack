<?php

namespace Drupal\frontpack\Commands;

use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class FrontpackCommands extends DrushCommands {

  /**
   * A helpful message.
   *
   * @param array $options
   *   An associative array of options whose values come from cli, aliases,
   *   config, etc.
   *
   * @option array option-name
   *   Description
   * @usage frontpack-gen foo
   *   Usage description
   *
   * @command frontpack:generate
   * @aliases frontpack
   */
  public function generate(array $options = ['option-name' => 'default']) {
    $this->logger()->notice(dt('Use `drush gen frontpack` to create a new frontpack subtheme.'));
  }

}