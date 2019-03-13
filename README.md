# This Magento 1 extension is orphaned, unsupported and no longer maintained.

If you use it, you are effectively adopting the code for your own project.

Store Level URL Rewrite Matching Fix
================
This extension fixes a couple of bugs in the ```core/url_rewrite_request```model.

Facts
-----
- version: check the [config.xml](https://github.com/Vinai/VinaiKopp_StoreUrlRewrites/blob/master/app/code/community/VinaiKopp/StoreUrlRewrites/etc/config.xml)
- extension key: VinaiKopp_StoreUrlRewrites
- Magento Connect 1.0 extension key: - none -
- Magento Connect 2.0 extension key: - none - 
- [extension on GitHub](https://github.com/Vinai/VinaiKopp_StoreUrlRewrites)
- [direct download link](https://github.com/Vinai/VinaiKopp_StoreUrlRewrites/zipball/master)

Description
-----------
This extension fixes a couple of bugs in the ```core/url_rewrite_request```model which are triggered when you

1. are using different url_keys per store  for products and categories
2. navigate to a category or product page and switch to a non-default store view
3. switch to a different store view

This would result in a 404 page. This extension simply fixes that.

Usage
-----
Simply install the extension. No configuration required.

Compatibility
-------------
- Only tested with magento 1.8

Support
-------
If you have any issues with this extension, open an issue on GitHub (see URL above)

Contribution
------------
Any contributions are highly appreciated. The best way to contribute code is to open a
[pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Vinai Kopp  
[http://www.netzarbeiter.com](http://www.netzarbeiter.com)  
[@VinaiKopp](https://twitter.com/VinaiKopp)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2013 Vinai Kopp
