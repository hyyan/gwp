Options -Indexes
# The file is auto generated by hyyan/gwp Build Tool
# 
# %date%
#
# Project     : %project%
# Version     : %version%
# Environment : %env%
# 
# .htaccess primary domain to web redirect
# this file must be in the (public_html | web ) folder of your hosting account 
# make the changes to the file according to the instructions.

# Do not change this line.
RewriteEngine on

#==============================
# %env% environment
#==============================

# Change %host% to be your primary domain.
RewriteCond %{HTTP_HOST} ^(www.)?%host%$

# Change 'web' to be the folder you will use for your primary domain.
RewriteCond %{REQUEST_URI} !^/web/

#********************
# NOT RRCOMMENDED   *
#********************
#
# Uncomment those two lines if you want dirs and files to be accessible out of the
# your primary domain dir.

#RewriteCond %{REQUEST_FILENAME} !-f 
#RewriteCond %{REQUEST_FILENAME} !-d

# Change 'web' to be the folder you will use for your primary domain.
RewriteRule ^(.*)$ /web/$1

# Change %host% to be your primary domain again. 
# Change 'web' to be the folder you will use for your primary domain 
# followed by / then the main file for your site, index.php, index.html, etc.
RewriteCond %{HTTP_HOST} ^(www.)?%host%$ 
RewriteRule ^(/)?$ web/index.php [L]