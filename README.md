# info3602-wp
Various labs and classes for INFO 3602 of UWI. This course is about the Wordpress development environment.

## Objective
Follow along in-course content and lab sessions to complete the transation of a static template file into a fully operational theme for Wordpress.

## Table of Contents

## Lab 3 Session
Create the theme, and create a template file.

### Registering a Theme
Registering a theme in wordpress requires two files `style.css` and `index.php` to be in the root of the theme folder.

### Template Files
There are many files that may be expected and handled by wordpress, for example `index.php` is used as a template for the Blog page or Home page.

## Lab 4 Session
Creating dynamic internal page templates for page post content, some UX improvements, manipulating parent/child page relationships, registering dynamic menus.

### Page Templates
Wordpress expects the file `page.php` to template how a Page post type will be displayed on the frontend.

### Parent/Child Pages
We have access to various hooks in wordpress to get the Parent or Children [...] of a Page nodes and making comparisons.

### Dynamic Menus
Wordpress hooks require the registration of a menu list via use of a location hook placed in the nav area. The admin area menu will inject its list where the location is palced in code.

## Lab 5 Session
Building the blog, which will display all current posts on the website sorted by time and paginated.

### Front Page & Index
After registering a static page for the Blog, it now uses `index.php` as its template file, while the Home uses `front-page.php`.

### Pagination
Requires a limit on the blog post previews to show at once, as well as a call to the wordpress hook to get the paginated link list for this blog page.

## Lab 6 Session
Building customized `WP_Query` objects, registering custom post types, and creating archive pages for the custom post time.

### Query Object
Allows us to query by post type, or various conditions of data that exist within the given collection.

### Custom Post Types
Registered by using `register_custom_post(name=string, options=?array)`. We explore the use of `mu-plugins` folder in Wordpress which enforces that code is run and installed.

### Custom Post Archives
TBD
