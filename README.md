<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

I've implemented the UI/UX in a way that it's users may easily figure out how the application works and avoids confusion.
It means something that can be naturally and instinctively understood and comprehended, I try to keep things clear and concise at the same time.
The UI is also responsive to all kinds of devices.

In coding implementationg I've tried to use Vue for my frontend and Laravel for my backend. I've made use of the MVC pattern that the laravel follows,
however, since I'm not really interacting with the database and just some api's I've made use the model as storage for my keys with setters and getters.
I created vue components that will retrieve user inputs. After the system has gathered the inputs I've used fetch method to let the client side communicate with the backend. But, instead
of using fetch to directly access the api's from openweather and foursquare, I've created my own api links using the api.php. I decided to do that because I want to filter unnecessary inputs that will go through
to the api and at the same time I can return a filtered result coming from the api's. I removed the irrelevant informations before sending back the data to the client side.   
For interacting with the api's I've used HTTP Client that is provided by laravel, allowing devs to quickly make outgoing HTTP requests to communicate with other web applications. 
-----------------------------------------------------------------------------------------------------------------------------

SELECT DISTINCT
CONCAT('T',LPAD(A.id, 11, 0)) AS ID,
A.nickname as nickname,
CASE
    WHEN A.status = 0 THEN 'discontinued'
    WHEN A.status = 1 THEN 'active'
    WHEN A.status = 2 THEN 'deactivated'
    ELSE 'undefined'
END AS Status,
CASE
    WHEN B.role = 1 THEN 'trainer'
    WHEN B.role = 2 THEN 'assesor'
    WHEN B.role = 3 THEN 'staff'
    ELSE 'undefined'
END AS Roles
FROM trn_teacher AS A
INNER JOIN trn_teacher_role B ON B.teacher_id = A.id

----------------------------------------------------------------


SELECT A.id AS ID, A.nickname AS nickname,
SUM(CASE 
         WHEN B.status = '1' THEN 1
             ELSE 0
           END) AS Open,
SUM(CASE 
         WHEN B.status = '3' THEN 1
             ELSE 0
           END) AS Reserved,
SUM(CASE 
         WHEN C.result = '1' THEN 1
             ELSE 0
           END) AS Taught,
SUM(CASE 
         WHEN C.result = '2' THEN 1
             ELSE 0
           END) AS NoShow
FROM trn_teacher AS A
INNER JOIN trn_time_table B ON B.teacher_id = A.id
INNER JOIN trn_evaluation C ON C.teacher_id = A.id
WHERE (A.status = 1 OR A.status = 2)
GROUP BY A.id, A.nickname
