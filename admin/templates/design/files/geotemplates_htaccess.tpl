{* 7.6.3-1-ga8b3780 *}
{* NOTE: start and end tokens are auto-added to beginning and end of these contents
	by the generating script, no need to have them in the template itself. *}
###############################################################################
## Geodesic Solutions LLC.
## 
## This file is AUTO-GENERATED by the software, not recommended to change 
## this file by hand.  But if you must, see below for "safest" way to do so.
## 
## Do NOT change the "GEO START" line or "GEO END" line at the end.  If you need
## to add something to this file, anything before "GEO START" and anything after
## "GEO END" will be left intact when this file is re-generated.
## 
###############################################################################

{if $protect}
## --Protect template files from being viewed directly, and turn off indexes-- ##
Options -Indexes
<FilesMatch "\.tpl$">
	Deny from all
</FilesMatch>
{/if}
{if $compress}

## -- Compress if capable -- ##

<IfModule mod_deflate.c>
	# Compress CSS, plain text, HTML, and javascript
	AddOutputFilterByType DEFLATE text/css text/plain text/html application/javascript text/javascript
</IfModule>
{/if}
{if $expires}

## -- Add Expires Headers is capable -- ##

<IfModule mod_expires.c>
	ExpiresActive On
	#Default expire after one week
	ExpiresDefault "access plus 1 week"
	#Expire CSS and JS 1 month
	ExpiresByType text/css "modification plus 1 month"
	ExpiresByType application/javascript "modification plus 1 month"
	ExpiresByType application/x-javascript "modification plus 1 month"
	ExpiresByType text/javascript "modification plus 1 month"
	#Expire images 1 year
	ExpiresByType image/gif "access plus 1 year"
	ExpiresByType image/jpeg "access plus 1 year"
	ExpiresByType image/png "access plus 1 year"
</IfModule>
{/if}
{if $rewrite}

## -- Enable mod_rewrite to allow using geo_templates/.min/css/1.css style -- ##

<IfModule mod_rewrite.c>
	RewriteEngine On
	RewriteBase {$rewrite_base}
	
	{literal}RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d{/literal}
	RewriteRule ^/?\.min/(css|js)/([0-9]*)\.(css|js) min.php?r=$2.$3 [QSA,L]
</IfModule>
{/if}