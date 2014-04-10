# EA Symfony2 Technical Test

### Will Melbourne's Fork

I completed this work on the evening of 9 April 2014 and it took me three hours. It was good fun getting to know Symfony again.
I especially liked the built in testing integration of PHPUNIT and see how easy it was to get going with it. The fact you can
write not only unit tests fully server side but also functional tests to test controllers and views is incredibly useful right of the box.
Also being able to use the console to work with the application, see the routes and generate code is a great feature for a PHP framework.

### Task

* The task is implement a website that allows the user to login to search the Github repoistories.
* You have 4 hours to complete the test.
* Please finish all the items outlined in the Requirements section first, then try to tackle items in the Nice to Haves section if you have time.
* If you cannot finish the test, please explain why as we are reasonable and realize people have time constraints.

### Setup

* You can find the design under the design folder
* You would need php5.5, Symfony 2 and a web server to run the application
* To see if the app running, http://localhost/app_dev.php/ or http://localhost/app_dev.php/demo/hello/Fabien

### Requirements

* You are free to use 3rd party authentication bundle or build your own bundle
* The login form should have server side validation
* All pages should be gated by the login page if the user is not login.
* You are free to use any http client to call out to Github's API
* Have a search field that allows searching for a GitHub user's repositories. See http://developer.github.com/v3/repos/#list-user-repositories for more info. Call the following API (where USER_NAME is the value typed into the search field):
```
https://api.github.com/users/USER_NAME/repos
```
* Once the search is clicked, the results should show a list of that user's public repositories with each item in a "name/number of watchers" format.
* The results should be in json format for the view to consume
* It's not a requirement to style the pages
* We expect to have unit test code coverage of your code

### Nice to Haves

* When a result is clicked, display an alert box with the repository's ID and the created_at time.
* Use AngularJS to display the repositories results
* Extended functionalities where you see fit.

### Deliverables

* Please fork this project on GitHub and add your code to the forked project.
* Update the README file to include the time you spent and anything else you wish to convey.
* Send the link to your forked GitHub project to your recruiter.

*Good luck!**
