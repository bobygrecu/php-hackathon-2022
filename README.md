# PHP Hackathon
This document has the purpose of summarizing the main functionalities your application managed to achieve from a technical perspective. Feel free to extend this template to meet your needs and also choose any approach you want for documenting your solution.

## Problem statement
*Congratulations, you have been chosen to handle the new client that has just signed up with us.  You are part of the software engineering team that has to build a solution for the new client’s business.
Now let’s see what this business is about: the client’s idea is to build a health center platform (the building is already there) that allows the booking of sport programmes (pilates, kangoo jumps), from here referred to simply as programmes. The main difference from her competitors is that she wants to make them accessible through other applications that already have a user base, such as maybe Facebook, Strava, Suunto or any custom application that wants to encourage their users to practice sport. This means they need to be able to integrate our client’s product into their own.
The team has decided that the best solution would be a REST API that could be integrated by those other platforms and that the application does not need a dedicated frontend (no html, css, yeeey!). After an initial discussion with the client, you know that the main responsibility of the API is to allow users to register to an existing programme and allow admins to create and delete programmes.
When creating programmes, admins need to provide a time interval (starting date and time and ending date and time), a maximum number of allowed participants (users that have registered to the programme) and a room in which the programme will take place.
Programmes need to be assigned a room within the health center. Each room can facilitate one or more programme types. The list of rooms and programme types can be fixed, with no possibility to add rooms or new types in the system. The api does not need to support CRUD operations on them.
All the programmes in the health center need to fully fit inside the daily schedule. This means that the same room cannot be used at the same time for separate programmes (a.k.a two programmes cannot use the same room at the same time). Also the same user cannot register to more than one programme in the same time interval (if kangoo jumps takes place from 10 to 12, she cannot participate in pilates from 11 to 13) even if the programmes are in different rooms. You also need to make sure that a user does not register to programmes that exceed the number of allowed maximum users.
Authentication is not an issue. It’s not required for users, as they can be registered into the system only with the (valid!) CNP. A list of admins can be hardcoded in the system and each can have a random string token that they would need to send as a request header in order for the application to know that specific request was made by an admin and the api was not abused by a bad actor. (for the purpose of this exercise, we won’t focus on security, but be aware this is a bad solution, do not try in production!)
You have estimated it takes 4 weeks to build this solution. You have 3 days. Good luck!*

## Technical documentation
### Data and Domain model
In this section, please describe the main entities you managed to identify, the relationships between them and how you mapped them in the database.
Answer:
First I created the 'users' table in which I made 4 columns, ie 'id', 'name', 'CNP' and 'created', in the created column I specified the date and time when the user was appointment.
Then I created two tables 'appointment_pilates' and 'appointment_kangoojumps' where I specified in both tables the columns 'id', 'user_id' where the user id is written in the first table and 'time interval' the time interval that the user chooses .
### Application architecture
In this section, please provide a brief overview of the design of your application and highlight the main components and the interaction between them.
Answer:
I did not create the application in specific design, based on functionality.
###  Implementation
##### Functionalities
For each of the following functionalities, please tick the box if you implemented it and describe its input and output in your application:

[ ] Brew coffee \
[x] Create programme \
[x] Delete programme \
[x] Update programme 

Answer:
In the 'AppointmentController.php' file I implemented the create update and delete appointment functions
##### Business rules
Please highlight all the validations and mechanisms you identified as necessary in order to avoid inconsistent states and apply the business logic in your application.
Answer:
First of all the mechanism of connection and writing in the database, then of user insertion, the choice of the desired program, the time interval and its availability.

##### 3rd party libraries (if applicable)
Please give a brief review of the 3rd party libraries you used and how/ why you've integrated them into your project.
Answer:
I used the Laravel Framework, which I modified and interpreted to create the application.

##### Environment
Please fill in the following table with the technologies you used in order to work at your application. Feel free to add more rows if you want us to know about anything else you used.
| Name | Choice |
| ------ | ------ |
| Operating system (OS) | Windows 11 |
| Database  | MySQL 5.7.31 |
| Web server| Apache 2.4.46 |
| PHP | 7.3.21 |
| Framework | Laravel |
| API platform | Postman 9.11.0 |
| Other platform | DockerDesktop 4.4.4 |

### Testing
In this section, please list the steps and/ or tools you've used in order to test the behaviour of your solution.
Answer:
I tested the application in Postman, adding the files created one by one.

## Feedback
In this section, please let us know what is your opinion about this experience and how we can improve it:

1. Have you ever been involved in a similar experience? If so, how was this one different?
I have never been involved in a similar experience.
2. Do you think this type of selection process is suitable for you?
I like this type of selection because it makes the difference between candidates.
3. What's your opinion about the complexity of the requirements?
The requirements were of medium difficulty for a candidate with little experience in REST API, but unfortunately I have not developed an API or used Laravel.
4. What did you enjoy the most?
The idea of the application seems useful to me during this pandemic period.
5. What was the most challenging part of this anti hackathon?
Since I have never developed any API or REST API projects, this challenge has given me headaches in searching for information and documenting new things.
6. Do you think the time limit was suitable for the requirements?
The time limit was satisfactory.
7. Did you find the resources you were sent on your email useful?
Yes, because I had some time in advance to find out about the challenge.
8. Is there anything you would like to improve to your current implementation?
No, I think this form of recruitment is the most effective.
9. What would you change regarding this anti hackathon?
One thing I think should have been said before the candidacy, namely the specification of the type of technology approached, namely API. If I knew this challenge would be based on this, I probably wouldn't be a candidate because I haven't yet gained the knowledge to implement and create APIs. For now!
It was a challenge from which I learned new things, I noticed my level and which side I should insist on professional development.
