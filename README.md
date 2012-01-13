# Revengeance des Duchesses blog

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

	cap [development|production] deploy

Each environnment is mapped to a default branch :

development = master
production = production