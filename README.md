# EduFly

## API: Steps to run
Step 1: Request leandro for secret.env file
Step 2: Put secret.env file inside of /api
Step 3: Open terminal and go to api directory and run the commands below
```
cd api
npm i
npm run dev
```
Step 4: To connect to backend AXIOS to `localhost:3000` after running

### Endpoints
GET localhost:3000/students             -> Get list of all students
GET localhost:3000/students/123         -> Get information about student with id 123
POST localhost:3000/students            -> Create a new student
PUT localhost:3000/students/123         -> Update the student with id 123
DELETE localhost:3000/students/123      -> Delete the student with id 123

