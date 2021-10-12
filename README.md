# Kirby Benchmark Plug-In

* [What do you get?](#what-do-you-get)
* [Benchmark Overview](#benchmark-overview)
* [Installation](#installation)
* [Get Started](#get-started)
* [Test](#test)
* [Examples](#examples)
* [Notes](#notes)
  * [Kirby CMS Licence](#kirby-cms-license)
* [Support](#support)  

## What do you get?
A very simple benchmarking Plug-in to bring [Kirby CMS](https://getkirby.com) to flinch.

## Benchmark Overview:

All Tests are triggered by a dedicated URL route.

**Test** | **URL** | **Parameter** | **Comment**
:---- | :---- | :---- | :----
Create Kirby Users | /benchmark/create/user/? | Number of users to create | Previous generated users will not be deleted!*
Search Kirby User by Email | /benchmark/search/user/email/? | Email Address | Emails look like "42@domain.tld"
Search Kirby User by Attribute | /benchmark/search/user/candidate/? | Attribute | Attributes are written in the seperate file `user.txt` 

*Doing so programmatically raises an exception:

>logicException: The last user cannot be deleted

## Installation:

### Download
1. Download the source code.
1. Unzip the files.
1. Paste inside _../site/plugins/_.
1. Head over to **[Get Started](#get-started)**.

### Git Submodule (Recommended)
You can add the Kirby Benchmark Plug-In as a git submodule as well:
````bash
$ cd YOUR/PROJECT/ROOT
$ git submodule add https://github.com/kreativ-anders/kirby-benchmark.git site/plugins/kirby-benchmark
$ git submodule update --init --recursive
$ git commit -am "Add Kirby Benchmark"
````
Run these commands to update the Plug-In (and all other submodules):
> **main** not "master"!
````bash
$ cd YOUR/PROJECT/ROOT
$ git submodule foreach git checkout main
$ git submodule foreach git pull
$ git commit -am "Update submodules"
$ git submodule update --init --recursive
````

## Get Started:

Just fire some URLs (see above) and "wait" for the output.

### config.php

> No additional configs required!

## Notes:
This Plug-In is built for Kirby CMS based on **Kirby´s Starterkit v3.5.7.1**.

### Kirby CMS license

**Kirby CMS requires a dedicated license:**

*Go to [https://getkirby.com/buy](https://getkirby.com/buy)*

## Warning:
Do not underestimate the file writing procedure. Every users leads to 4 items. The folder and 3 files within. Like
```
accounts/
  ...
  0aMj4uhK/
    .htpasswd
    index.php
    user.txt
```

## Disclaimer

The source code is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please create a new issue.

## Support

In case this Plug-In brought you some fun consider supporting kreativ-anders by donating via [PayPal](https://paypal.me/kreativanders), or becoming a **GitHub Sponsor**.
