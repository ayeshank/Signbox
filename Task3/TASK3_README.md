# SET EVENTS IN DATABASE AND GENERATE REPORT USING MYSQL & PHP
We are going to have a look on creating events (schedules) in database by doing one practical example and generating the report of database record in the pdf form usinf **fpdf.php**

> Lets discuss the events of the database first and find the answers to following questions:
>* How Events are created?
>* Where can we find events in database?
>* How events can be created by sql query?
>* What are the types of events?
>* How many query can we write in events to perform an action on schedule time?

###### We will see the funcitonality of events by considering the following scenario:
>Let suppose you want the record of the user registration table to be backup into another table(let's say userbackup table) to reduce the load on the server.
>This can be made possible by creating an event which automatically transfers the user registration table record into the userbackup table.
For this you have to create 
* **User/Registration Table** - to register users
* **UserBackup Table** - to store backup data
* **An event** - to schedule a time for transfering or backing up the user registration table data into the userbackup table.

By using **phpmyadmin** database we had created the following table

##USER TABLE

Create the **user table** by the following sql query:

```
CREATE TABLE `user` (
 `id` int(28) NOT NULL AUTO_INCREMENT,
 `FName` varchar(128) NOT NULL,
 `MName` varchar(128) NOT NULL,
 `LName` varchar(128) DEFAULT NULL,
 `Email` varchar(128) NOT NULL,
 `Mobile` varchar(128) NOT NULL,
 `Password` varchar(128) NOT NULL,
 `DOB` date NOT NULL,
 `Gender` varchar(128) NOT NULL,
 `currenttime` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4
```
Insert some dummy data into the database and the resultant table along with the user record will look like this :

![alt text][user]

>Note : the currenttime field will contain the time at which the user was registered using NOW() functionin php;

##USERBACKUP TABLE

Create the **user table** by the following sql query:

```
CREATE TABLE `userbackup` (
 `b_id` int(128) NOT NULL,
 `fname` varchar(128) NOT NULL,
 `mname` varchar(128) NOT NULL,
 `lname` varchar(128) DEFAULT NULL,
 `email` varchar(128) NOT NULL,
 `mobile` varchar(128) NOT NULL,
 `pswd` varchar(128) NOT NULL,
 `dob` date NOT NULL,
 `gender` varchar(128) NOT NULL,
 `currenttime` datetime(6) NOT NULL DEFAULT current_timestamp(6),
 PRIMARY KEY (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
```
After running the above sql query a table with null data record will be created as shown below:

![alt text][userbackup]

> **Now our task is to transfer the values from user table into the userbackup table automicatically**
> **For this create an event**

## CREATE EVENT THROUGH SQL QUERY

*On the navbar above in phpmyadmin click on the sql option and write the following query there:

```
CREATE EVENT `userbackup` 
ON SCHEDULE EVERY 2 MINUTE 
STARTS '2021-02-23 20:30:11' 
ON COMPLETION PRESERVE ENABLE 
COMMENT 'Archive table' 
DO 
BEGIN 
INSERT INTO userbackup(b_id,fname,lname,email,mobile,pswd,dob,gender,currenttime) 
SELECT id,FName,LName,Email,Mobile,Password,DOB,Gender,NOW() 
FROM user 
WHERE NOT EXISTS (SELECT b_id,fname,lname,email,mobile,pswd,dob,gender,currenttime FROM userbackup WHERE user.id=userbackup.b_id); 
END
```
Lets understand the above event query step by step:
* **CREATE EVENT `userbackup`** - This will create an event with name 'userbackup'
* **ON SCHEDULE EVERY 2 MINUTE** - This means that the event will be active or start after every 2 minutes.
* **STARTS '2021-02-23 20:30:11'** - This sets the start timing of the event or in simply means from when you want to start this event.
* **COMMENT 'Archive table'** - This is optional statement to make you remember that for which purpose you had created the event.
* **DO** - This means that which action you want to perform and write the action afterwards DO keyword
* **BEGIN** - When you want to execute multiple sql queries after DO keyword than you should write BEGIN keyword

* **INSERT INTO userbackup(b_id,fname,..)** - It will insert the user table record into the userbackup table
* **SELECT id,FName,.. FROM user** - It will select the data from the user table which we want to put in userbackup table.
* **WHERE NOT EXISTS (SELECT b_id,fname,.. FROM userbackup WHERE user.id=userbackup.b_id)** - It will check whether the user table data already exist in the userbackup table or not .If it is then it will not copy that data returning false to the **WHERE NOT EXISTS** keyword hence no data will be selected and inserted.
* **END** - It shows end to the BEGIN keyword.

> Note: The query here is a single sql query but it is a good practice to write the queries inside BEGIN and END keyword.
> Note: The **STARTS '2021-02-23 20:30:11'** statement indicate the start of schedule but this query doesn't have the **ENDS** statemnet that means it will be a recursive event which will be automatically generate again and again.
While the events with both STARTS and ENDS are called **ONE TIME** events
After running the above query the userbackup table will fill with all the record of the user table as shown:

![alt text][userbackup2]

## CONCLUSION OF EVENTS
Thats how the events are created in the database to perform an action related to database automatically





