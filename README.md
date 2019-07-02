# RaspberryPiFullyCompatibleWithScripts via Apache2 web server

To install raspberry with fully functional web server which supports GPIO we have to take these steps:

##Installation:

Firstly we install apache2
```bash
sudo apt install apache2
```

In some cases the portion of installation fails in order to solve this issue we have to write the following:
```bash
sudo groupadd www-data
sudo usermod -g www-data www-data
sudo service apache2 restart
```
Now if we type our raspberry pi's address which we can find using:

```bash
ifconfig
```
The ip address will be located on the first line in the top of the file : inet x.x.x.x
Now if we type our Pi's ip address in the web browser we will se default apache2 configuration file

Then we will need to install php7.1
```bash
sudo apt-get install php7.1
```
Now we have to enable htaccess files:

```bash
sudo nano /etc/apache2/apache2.conf
```
In this file we have to find Directory with following things:

```bash
<Directory /var/www/>
```
And in here we have to change AllowOverride from None to All

##Setting FTP / SFTP server to be able to edit files remotly

```bash
sudo chown -R pi /var/www
sudo apt-get install vsftpd
```
Now we have to edit vsftd config file:

```bash
sudo nano /etc/vsftpd.conf
```
ctrl + w ( to search for ) - anonymous_enable and change this line from Yes to No.
Uncomment: 
local_enable=Yes
write_enable = Yes
And in the bottom of the file we have to add following command :
```bash
force_dot_files=Yes
```
CTRL + x , y , enter

After all of this:
```bash
sudo service vsftpd restart
```
Now we have to set our FTP folder with our website server and to do that we have to log in as a root user:

Firstly we have to set a password for our root user:
```bash
sudo passwd root
```
Then restart putty, and log in as a root
Then we have to edit a password file:
```bash
sudo nano passwd
```
and we have to look for pi:x:1000:1000 and etc. Uncoment this line!
Then
```bash
sudo reboot
```
Log in as a root, uncomment that pi line and do the following command
```bash
usermod -d /var/www pi
```
exit from putty and login as pi user

And then type this command:
```bash
sudo usermod -L root
```
Now we can download winscp program and type our pi's address, username : pi and password, we have to select FTP (port 21)  if it doesnt work select SFTP with port 22

Now in WinSCP program we can edit our html files however we want.

##Running Enabling our website to launch python scripts.

Firstly:
```bash
sudo systemctl status apache2.service
```
To check if there is not errors going on and everything is working perfectly

Then there is a strange thing, but we have to mod out html folder ( or any other web browser directory ) to exectue py scripts by writing:
```bash
sudo chmod 755 <directory>
```
#One of the Important things!!

We are logged in as a pi user, web-server uses a www-data user which is unknown for the system
In order for us to launch a php/py scripts wy have to do these steps:
```bash
sudo visudo
```
We will open a file where we can add specific permisions/ granted things
Go to the bottom of the file and write:
```bash
%www-data ALL=(ALL) NOPASSWD:ALL
```
This line will let us use sudo commant without logging in as a root user for the www-data user from the website

And that's it!



