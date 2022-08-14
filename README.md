# blogs
To make it work, use the database file located in the SQL folder, change credentials for the database connection in the .env file and run composer install in Symfony terminal.<br>
Admin credentials for the site: l: admin p: 98765<br>
User credentials  for the site: l: user p: 12345<br>
<br>
Credentials for email account that recieves the sent emails: https://mail.tutanota.com/login l: user_blogs_project@tutanota.com p: userpassword123... (dots are a part of the password)<br>
Emails are sent through mailjet.com and include a link to the new post.<br>
<br>
This project is made with Symfony 6.1, styled with Boostrap and has all of the necessary functionality specified in the task.<br>
Extra functionality includes: <br>
<ul>
 <li>admin functionality uses the security component and authentification<br></li>
 <li>pagination<br></li>
 <li>comments (unchangeable like in the Twitter of old)<br></li>
 <li>a page for viewing archived posts and a button to republish them<br></li>
</ul>


