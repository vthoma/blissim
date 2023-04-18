# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    config.vm.box = "generic/ubuntu2004"
    config.vm.network "private_network", ip: "192.168.56.13"

    config.vm.synced_folder ".", "/var/www/html/test"
    config.vm.provision "shell", path: "config/script.sh"
end
