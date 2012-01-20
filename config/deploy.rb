require 'rubygems'
require 'capistrano/ext/multistage'
require 'rvm/capistrano'
require 'bundler/capistrano'
set :rvm_ruby_string, '1.9.3'
set :rvm_type, :user

set :capistrano_extensions, [:multistage]
set :scm, :git
set :deploy_via, :remote_cache
set :use_sudo, false
ssh_options[:forward_agent] = true

# Project configurations
set :application, "revengeanceduchesses"
set :repository,  "git@github.com:hooktstudios/revengeanceduchesses.git"
set :branch, "master"
set :user, "revengeanceduchesses"
set :default_stage, "dev"

set :copy_exclude, %w( .git .gitignore config/deploy.rb config/deploy Capfile)
set :shared_children, %w{ wp-content/uploads }

namespace :deploy do
 desc "This is here to overide the original task"
 task :restart, :roles => :app, :except => { :no_release => true } do
   # do nothing
 end

 desc "This is here to overide the original task"
 task :start, :roles => :app, :except => { :no_release => true } do
   # do nothing
 end

 desc "This is here to overide the original task"
 task :stop, :roles => :app, :except => { :no_release => true } do
   # do nothing
 end
 
 desc "This is here to overide the original task"
 task :finalize_update, :roles => :app do
   run "cd #{release_path} && bundle exec sass #{release_path}/wp-content/themes/revengeance/style.scss:#{release_path}/wp-content/themes/revengeance/style.css"
   run "chmod 777 #{release_path}"
 end

  desc "Link all the config files to the shard directory"
  task :link_configs do
    run "ln -s #{File.join(shared_path, 'wp-config.php')} #{latest_release}"

    shared_children.each do |shared_child|
      run "if [ ! -h #{File.join(current_path, shared_child)} ]; then rm -rf #{File.join(latest_release, shared_child)} && ln -s #{File.join(shared_path, shared_child)} #{File.join(latest_release, shared_child)}; fi"
    end
  end
  
  desc "Setup RVM"
  task :setup_rvm do
    run "bash < <(curl -s https://rvm.beginrescueend.com/install/rvm)"
    run "source ~/.bashrc"
    run "rvm get stable"
    run "rvm install #{rvm_ruby_string}"
    run "rvm use #{rvm_ruby_string} --default"
  end
end

before 'deploy:finalize_update', 'bundle:install'
before "deploy:restart", "deploy:link_configs"
after "deploy:restart", "deploy:cleanup"
before "deploy:setup", "deploy:setup_rvm"