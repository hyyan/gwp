# [GWP - General Wordpress Implementaion](http://hyyan.github.io/gwp)

[![project status](http://stillmaintained.com/hyyan/gwp.png)](http://stillmaintained.com/hyyan/gwp)
[![Latest Stable Version](https://poser.pugx.org/hyyan/gwp/v/stable.png)](https://packagist.org/packages/hyyan/gwp)
[![License](https://poser.pugx.org/hyyan/gwp/license.svg)](https://packagist.org/packages/hyyan/gwp)


GWP is a modern WordPress stack that helps you get started with the best development tools and project structure.

Much of the philosophy behind GWP is inspired by the [Bedrock](https://github.com/roots/bedrock) and [Twelve-Factor App](http://12factor.net/) methodology including the [WordPress specific version](https://roots.io/twelve-factor-wordpress/).


## Features

* Better folder structure
* Dependency management with [Composer](http://getcomposer.org)
* Easy WordPress configuration with environment specific files
* Better deployment workflow with [Phing](https://github.com/phingofficial/phing)

## Requirements

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| PHP >= 5.3.x    | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Composer @latest | `compoaser -v`    | [composer.org](https://getcomposer.org/download/) |


## Installation

1. Create new project using composer : `composer create-project hyyan/gwp:dev-master /path`
2. Update `.env.local` to meet your local environment variables.
3. Register your local maching name in the `config/environment.php file
4. Geneate apache .htaccess file :
` bin/phing gwp:apache-htaccess -D apache-htaccess.dir=.`
5. Add theme(s) in `web/app/themes` as you would for a normal WordPress site.
6. Access WP admin at `http://example.com/cms/wp-admin`

## Documentaion

* [Folder structure](https://github.com/hyyan/gwp/wiki/Folder-structure)
* [Environments](https://github.com/hyyan/gwp/wiki/Environments)
* [Composer] (https://github.com/hyyan/gwp/wiki/Composer)
* [WP Cron] (https://github.com/hyyan/gwp/wiki/WP-Cron)
* [Build And Deployment] (https://github.com/hyyan/gwp/wiki/Build-And-Deployment-Workflow)

## Contributing

Everyone is welcome to help contribute and improve this project. There are several
ways you can contribute:

* Reporting issues (please read [issue guidelines](https://github.com/necolas/issue-guidelines))
* Suggesting new features
* Writing or refactoring code
* Fixing [issues](https://github.com/hyyan/gwp/issues)
