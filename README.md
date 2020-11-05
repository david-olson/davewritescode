# Dave Writes Code Webapp

This is the main repo for controlling my personal website. Laravel is the main technology used, with a few additional packages to provide other functionality.

## Notable Libraries

- Laravel Sluggable: [spattie/laravel-sluggable](https://github.com/spatie/laravel-sluggable)
- Intervention Image [intervention/image](http://image.intervention.io/)

## Notable Programming Components

**Protected By Access Code Middleware**

This allows for the use of password protection on viewing Projects and the Project Overview Page. Codes are checked against an Active Guest ID stored in session variable to ensure a user has previously validated their code. If the active guest has not yet expired, the user is sent through to the page. If the Active Guest ID is invalid or the code has expired, the user is shown an access code challenge screen.

**Live Sized Images**

Uploaded images are stored in Application Storage and uploaded via an Admin Panel. The request route for images allows for retrieving sized images from storage or creating them on the fly if they do not exist.

**Front End Components**

Isometric screenshot layouts were created in 100% CSS with load in animations. Also featured Animated SVG on load to projects page and a ASCii images that adjust font size to fit their constraints. The site is also fully keyboard and screenreader navigateable and scores a 96 on Lighthouse Performance test.
