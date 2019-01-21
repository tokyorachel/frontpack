#!/usr/bin/env bash

drush cex && drush webform:tidy '../config/default' --prefix="webform"