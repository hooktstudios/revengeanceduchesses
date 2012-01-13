# Revengeance des Duchesses blog

## Wordpress configuration

> cp wp-config.php.template wp-config.php

Run install process at /wp-admin/

Allow sitemap plugin to write its file in the root

> chmod 777 .

## CSS

CSS is made using SASS ruby gem (sass-lang.com)

	sass --watch wp-content/themes/revengeance/style.scss:wp-content/themes/revengeance/style.css

## Contributing to the code

### Identation

* All files including HTML, CSS and JavaScript files should use hard tabs.

## Capistrano deployments & tasks

Before using capistrano you must enable SSH agent forwarding by running this command on OS X (and after each reboot)

	ssh-add

By default it deploys to the development environment

	cap [dev|prod] deploy

Each environnment is mapped to a default branch :

	dev = master
	prod = production