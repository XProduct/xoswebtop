xOS Webtop
=========

HTML/CSS/JS based "operating system" in the browser. 

This was the first project I worked on when I began programming about 4 and a half years ago. (December 2009) I no longer have the time to maintain this project and improve the security of the user accounts (Oh yeah, md5 passwords all the way). I am just putting the code here on GitHub to save it. You can take it. Upload it to your own server (please don't use md5). 

If you do upload it to your own server, please keep in mind you will need to execute the sql files at the root of this repository in MySQL. You will then need to update your MySQL credentials in all the places you find the string "password_here". Yes I duplicated the SQL credentials in a million places. This should be easily fixable however with a simple class. 

I also feel I should admit that at some point during this project I didn't know what a function was, so I wrote about 10 or so files that updated the database with a different number for a preference. Oh yes, it was the best thing ever. Even better, each file defines the server, username, and password of the MySQL database. Super smart right? 

Some Lessons Learned
=========

1. Never ever under any circumstance use MD5. 
2. Use Functions. They are helpful.
3. Don't duplicate code.
4. Classes are HUGEly helpful.
5. JavaScript and AJAX are awesome.
6. PHP sucks. (But then again I don't know it that well. [Confession: I still use PHP on rare occasions, though it is much better code])
