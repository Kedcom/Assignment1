In this project we created a REST API using PHP, MySQL, and Apache for managing student records. 
The API allows you to get all student records, to get a particular student's record by their ID, and inserting new student records into the database.

How to test the program:
- Install Apache, MySQL, and PHP and ensure that all are installed and
  running on your system.
- Setup MySQL Database by logging into PhpMyAdmin to create the database 
  and table(TECH2012_term_assignment1.sql)
-Open connection.php on VS Code and update the MySQL credentials (host, username, password, and db_name) to your setup.

- Testing API:
Open postman and create a new request. Input the localhost URL and set the method to "GET" and Click "send" to fetch all students data, To get student data by id input "?id=student_id_here" into the URL after student.php and click "send", to insert new data set your method to "POST" and input the data into the curly brackets, delete "?id=student_id_here" from the URL and click send.


Team Members:
Harsh Khullar
Kenechukwu Ejinkeonye
