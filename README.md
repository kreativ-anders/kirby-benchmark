# Kirby Benchmark Plug-In

* [What do you get?](#what-do-you-get)
* [Benchmark Overview](#benchmark-overview)
* [Installation](#installation)
* [Notes](#notes)
  * [Kirby CMS Licence](#kirby-cms-license)
* [Support](#support)  

## What do you get?
A very simple benchmarking Plug-in to bring [Kirby CMS](https://getkirby.com) to flinch.

## Benchmark Overview:

Just fire some URLs in your browser...

**Test** | **URL** | **Parameter** | **Comment**
:---- | :---- | :---- | :----
Create Kirby Users | /benchmark/create/user/? | Number of users to create (INT) | Previous generated users will not be deleted![^1]
Search Kirby User by UUID | /benchmark/search/user/uuid/? | UUID (STRING) | Generated uuids look like _PitCAXVW_
Search Kirby User by Email | /benchmark/search/user/email/? | Email Address (STRING) | Generated emails look like _42(at)domain.tld_
Search Kirby User by Attribute | /benchmark/search/user/candidate/? | Attribute (INT) | Attributes are written in the seperate file `user.txt` 

### User Creation

>`$i` will increment automatically, so it is easy to find/test users/logins. Optionally, you can use [userkit Add-On](https://github.com/kreativ-anders/kirby-userkit) for login.

```PHP
 $user = $kirby->users()->create([
   'email'     => $i . '@domain.tld',
   'password'  => '12345678',
   'content'   => [
      'candidate' => $i
    ]    
 ]);
```

## Installation:

### Download
1. Download the source code.
1. Unzip the files.
1. Paste inside _../site/plugins/_.

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

### config.php

> No additional configs required!

## Notes:
This Plug-In is built for Kirby CMS based on **Kirby´s Starterkit v3.8.0**.

### Kirby CMS license

**Kirby CMS requires a dedicated license:**

*Go to [https://getkirby.com/buy](https://getkirby.com/buy)*

## Warning:
Do not underestimate the file writing overhead. Every user equals four items - the dedicated folder for the user itself and three files within:
```
accounts/
  ...
  0aMj4uhK/
    .htpasswd
    index.php
    user.txt
  ...
```
>**Creating 10.000 users writes 40.000 items!**

## Disclaimer

The source code is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before *NOT* using it in a production environment. If you find any issues, please create a new issue.

## Support

In case this Plug-In brought you some fun consider supporting kreativ-anders by donating via [PayPal](https://paypal.me/kreativanders), or becoming a **GitHub Sponsor**.

[^1]:Doing so programmatically raises an exception: 'logicException: The last user cannot be deleted'
