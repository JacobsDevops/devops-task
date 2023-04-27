Hello
I created 2 dockerfiles, one for MSSQL Server and second for PHP Apache Webserver. 

To launh those servers I created a docker-compose file. 

In my local computer I can not connect to db. At first I thought it was networking issue. 

Later I understood that it was because of MSSQL server's resource issue.

So I launched an ec2 instance on AWS (t3a.2xlarge - 8vCPU's and 32GB RAM, but I think t3a.xlarge will be  enough with 4vCPU's and 16 GB RAM)
If you work on an ec2 instance don't forget to change localhost with the IP address of ec2 instance on PHP file "<private const host = 'localhost';> "

# Task

Create two docker containers, one holding a MSSQL database, another one holding a Web-Server offering a pre-defined PHP script. Finally write a Launcher, which starts both containers, so the Web-Server can be called

## Docker Container 1: MSSQL-Server

Write a Dockerfile for the following tasks

- Perform MSSQL Server Installation
- Set password for `SA` to `Un!q@to2023`
- Run MSSQL Service

## Docker Container 2: API

- Install Webserver of your choice
- Install PHP 7.1+
- Install proper driver to connect to MSSQL Server (s. Container 1 above)
- Add the script `QuickDbTest.php` to the web-root folder

## Launcher

Write a launcher, which builds and starts both containers (can be shell scripting or docker-compose).