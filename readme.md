# Project 3
+ By: Daniel McCullough
+ Production URL: <http://p3.beachboffin.com>

## Outside resources
Nothing beyond our expected outside resources.

## 3 Unique inputs
Like p2 the following unique inputs can be found.
1. Text input for the currency amount that is to be converted.
2. Dropdown for current currency selection.
3. Dropdown for target currency selection.
4. Checkbox for user to choose rounding option.

## Packages
The barryvdh/laravel-debugbar is the only additional packages used, and I made sure it isn't implemented in my production version.

## Code style divergences
None that I am aware of.

## Notes for instructor
While p3 closely resembles p2, there are a few changes:

1. A button to clear the form and retrieve the latest currency exchange rates was added.
2. The Cache was used to maintain the currency exchange rates to avoid unnecessary REST calls.
3. Bootstrap css was added to improve the appearance of the project.  
4. The list of currencies can be found in config/app.php and is retrieved via the "config" helper.  Note that while it can be edited to change/add to the list of currencies, the Euro currency is still not like the others and returns an error of it is the "base" and also included as one of the "symbols" to convert to.   