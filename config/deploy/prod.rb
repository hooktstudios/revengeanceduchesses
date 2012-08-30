server "revengeanceduchesses@int-web-1.monhs.com", :web, :app, :db, :primary=>true
set :hostname, "prod.revengeanceduchesses.monhs.com"
set :deploy_to, "/home/revengeanceduchesses/domains/prod.revengeanceduchesses.monhs.com/"
set :keep_releases, 2
set :branch, "master"