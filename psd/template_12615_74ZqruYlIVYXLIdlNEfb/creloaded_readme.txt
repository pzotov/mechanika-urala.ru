How to install a CRELoaded template

1. You should have a CRELoaded software installed on your server. CRELoaded is an open source, oscommerce based shopping system with CRM and affiliate management built in. Download it from http://creloaded.com/Downloads/d_op=viewdownload/cid=1.html if you don't have one. Note: Our template are compatible with CreLoaded 6.2 patch 10+ Standard, Pro ONLY.

2. When you have a CRE Loaded software installed, unpack a template package you got from our website.

3. There will be a folder named \XXX (where XXX is a three digit number) inside an unpacked ZIP file. Place the files in their own directory (XXX) in the /templates directory inside your CRE Loaded installation. This will copy template files of a CRE Loaded template to your installation.

4. Go to your administration control panel. To install the template click "Design Controls" > "Insert". Select "XXX" from the drop down list (where XXX is a three digit number of the template).  Click "Save". This will load a new page where you can update infobox settings. Click "Install" after you are done.

5. To make the template active navigate to "Design Controls" > "Template Configure". Then click on the template Name > "Edit" > check "Set as sites default" box > "Save".

6. Once you have done this go to http://localhost/{creloaded-directory} (if you are running on your own computer) or if on a live server - http://{www.mydomain.com}. Make sure the template is installed correctly.


If you want to install sample product database our live demo has you need to copy the contents of the "sources/images" folder to the root folder of your CRE Loaded installation and install the .sql batabase dump file from the "sources" folder of your CRE Loaded template. Please contact your hosting provider for detailed info on database dump file management.
