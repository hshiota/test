#!/usr/bin/env bash

sudo yum -y install httpd mysql-server php php-mysql

sudo service httpd start
sudo service mysqld start
sudo chkconfig httpd on
sudo chkconfig mysqld on

service iptables stop
chkconfig iptables off

sudo cp /vagrant/etc/httpd.conf /etc/httpd/conf/httpd.conf
sudo cp /vagrant/etc/php.ini /etc/php.ini

sudo service httpd restart
