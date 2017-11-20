# tagroll
Perform object recognition on a folder of images with http://machinebox.io Tagbox facial recognition model and print the results. 

## How it works
Tagroll scans a designated folder for images, then posts each image to a local instance of Tagbox, returning the results to a crude HTML page. 

## Requisites
- Download and install Docker at http://www.docker.com
- Visit http://machinebox.io and download Tagbox
- Run Tagbox
- Add images you wish to scan into a directory called check at the same level as the .php file

Make sure PHP 5 or later is installed on your local machine or server. The JavaScript file is used to parse the JSON response from the PHP code and place it into a `<div>` on the HTML page. The PHP code will run on its own scanning any folder in the same directory called check, echoing the results as JSON.
