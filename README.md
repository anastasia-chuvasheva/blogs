# blogs
To make it work, use the database file located in the SQL folder, change credentials for the database connection in the .env file and run composer install in Symfony terminal.<br>
Admin credentials for the site: l: admin p: 98765<br>
User credentials  for the site: l: user p: 12345<br>
<br>
Credentials for email account that recieves the sent emails: https://mail.tutanota.com/login l: user_blogs_project@tutanota.com p: userpassword123... (dots are a part of the password)<br>
Emails are sent through mailjet.com and include a link to the new post.<br>
<br>
This project is made with Symfony 6.1, styled with Boostrap 5 and has all of the necessary functionality specified in the task.<br>
Extra functionality includes: <br>
<ul>
 <li>admin functionality that uses the security component and authentification<br></li>
 <li>pagination<br></li>
 <li>comments (unchangeable like in the Twitter)<br></li>
 <li>a page for viewing archived posts and a button to republish them<br></li>
 <li>JQuery styling effects: fadeIn and fadeOut<br></li>
 <li>AJAX-based real time search for blogs<br></li>
 <li>pop ups with subtitle content<br></li>
 <li>user registration page with validation, immidiate authorisation after registering, AJAX-based functionality to ensure that the username is available, password hashing and JQuery-based show/hide password eye icon button</li>
 <li>AJAX-based functionality to load comments in batches of two. If there aren't any comments, the button won't be shown</li>
 <li>Event subscribers for assign a role to a user upon creation</li>
 <li>Form post submit event subscribers for uniqueness checks</li>
  
</ul>


