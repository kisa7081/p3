## P3 Peer Review

+ Reviewer's name: Daniel McCullough
+ Reviwee's name: Phil Plencner
+ URL to Reviewe's P3 Github Repo URL: https://github.com/kisa7081/p3/blob/master/peer-review.md

## Billboard Top Album Charts

The project I reviewed is a Billboard Top Album Charts list application that accepts a "number of results," year, and chart type as input and presents the user with an ordered listing of the chart's top ablums for the chosen year with the album's name, artist, and an album cover image.

## 1. Interface
The interface is well laid out with clear intent for what is expected from the user.  There was no confusion as to how to proceed to retrieve the results, which were neatly stacked vertically in chart ranking order with in a pleasant display.  Also included with the results is a reminder of the criteria used to retrieve the data (i.e. "You searched for the top 5 of the Top R & B Albums in 2002.").  The previous criteria is also nicely pre-selected for the user.  I found the large "billboard" image at the top of the page to be rather "eye-grabbing" and helped convey the application's purpose on first impression.  

While each input section is horizontally aligned as a whole, the input elements themselves seem to be a bit askew from one another. Lining up different types of inputs can be tricky, but perhaps having the year selection under the year label itself in the same way the "number of results" and chart inputs are set might have given a better sense of symmetry.  

The copyright information and the Github link in the footer were nice touches that gave an air of professionalism. I wish I had thought to do that for my project.

## 2. Functional testing
I tried various types of non-numeric and "out of range" inputs for the "number of results" field and expectedly received the error information.  A nice error prevention action taken was limiting this input field to only 2 characters.  As for the other inputs, one a dropdown selection and the other a set of radio buttons, the right/wrong criteria was only a matter of the user choosing values for each.  When these values weren't chosen, the application responded with clear instructions to make a selection.  Finally, when entering a URL for a non-existent path, the application responded with the proper "404" error response.  In summary, I was unable to "break" the page.

## 3. Code: Routes
The routes file ("web.php") consisted of two routes, one for the primary display that called a function named "index" in the controller ("BillboardChartController") and another to retrieve the user's input, which then redirected back to the primary display ("chartProcess").  All route code was in the proper place without extraneous code that should be placed elsewhere.

## 4. Code: Views
The views consisted of three files: "master.blade.php," "index.blade.php," and "error-field.blade.php."  As per instructed, the "index.blad.php" view properly extended the "master.blad.php" view.  In this "index" file, a "title" and a "content" section were defined and displayed in its parent view.  An "include" statement was placed under each user input to display errors as they occur.

I noticed in the logic used to determine the user's previous choice of year was a bit verbose and could be shortened with a bit of "syntactic sugar."  For example, this...

`
{{ (old('year') == '2004' || $year == '2004') ? 'selected' : '' }}
`

...could be changed to something like this using the "null coalescing operator:"

`
{{ (old('year') ?? $year == '2004') ? 'selected' : '' }}
`

After running the page through the "Nu Html Checker" (https://validator.w3.org), the following results were returned:


**Error:** An img element must have an alt attribute, except under certain conditions. 

**Warning:** The border attribute is obsolete. Consider specifying img { border: 0; } in CSS instead.

**Warning:** Section lacks heading. Consider using h2-h6 elements to add identifying headings to all sections.

I personally disagree with an "img" tag lacking an "alt" attribute as being considered to be an error.  The other two issues could be fixed by removing the "border='0" attribute.

Running the CSS thought the Jigsaw validator resulted in no errors.  I did notice a "ul#chart-radios" selector that could simply be just "#chart-radios," since an element with an id would only occur once and the style would be applied regardless of where it occurs.


## 5. Code: General
The code was clean and easy to read by following the "best practices" and a good use of comments.  A few notes:

+ There were several public functions in the BillboardChartController ("getByYear," "getByChart," and "getByYearAndChart") that could be made either private or protected.
+ Because of the form fields' validation, null checks such as ``input('numResults', null)`` and ``if ($numResults && $year && $chart)`` aren't necessary.
+ The process of applying the criteria to find the results to the array could be simplified a bit.  I see the albums are first searched for by year, then the same full list of albums is searched for by chart and merged together like so:

```
$yearAlbums = $this->getByYear($albums, $year);
$chartAlbums = $this->getByChart($albums, $chart);
$mergedAlbums = array_intersect_key($yearAlbums, $chartAlbums);
```
The same action could be accomplished by searching for the charts from the array of albums by year without a need to do a merge:
```
$yearAlbums = $this->getByYear($albums, $year);
$chartAlbums = $this->getByChart($yearAlbums, $chart);
```
+ The consistent use of varibale names between the views and the controller was very good and helps to follow the code.
+ I like the use of the "bail" criteria in the form validation.  I was not aware it existed, and I'll be using it in the future.

## 6. Misc
The displaying of album image files might have been accomplished by using URL values from the Billboard site rather than have the application save them in "public/images" folder and serve them itself.  For example the image of Usher's album has a URL value pointing to a local "/images/2004/rb1.jpg" file that could be replaced with "/2004/06/usher-oqp-87x87.jpg" and having a constant value of "https://charts-static.billboard.com/img" in the view to build the URL to retrieve the value from the Billboard.com site.
