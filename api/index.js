var express = require("express");
const mongoose = require('mongoose');
var cors = require("cors");
const Student = require("./models/Student");
const dotenv = require('dotenv')
const app = express();

dotenv.config({ path: './secret.env' })

app.use(cors());
app.use(express.json());
app.listen(3000);

var MONGOURL = process.env.MONGOURI;

mongoose
    .connect(MONGOURL)
    .then(() => {
        console.log("Connected to DB");
    }).catch((error) => {
        console.log(error);
    })

console.log("Running on port: ${app.port}")
// const teacherRouter = express.Router();
// app.use('/teachers', studentRouter)

const studentRouter = express.Router();
app.use('/students', studentRouter)

// Creates new student object into the database
studentRouter.post('/', async (request, response) => {
    try {
        const { name, section, taskList } = request.body;  // Extracts student data from request body

        if (!name || !section) {
            return res.status(400).json({ error: 'Missing field' });
        }

        const student = new Student({ name, section, taskList });

        await student.save()

        return response.status(200).json(student);
    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

// Return all students in the database
studentRouter.get('/', async (request, response) => {
    try {
        const students = await Student.find();
        return response.status(200).json(students);
    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

// Return student by id
studentRouter.get('/:id', async (request, response) => {
    try {
        const { id } = request.params;

        await Student.findById(id).then(student => {
            response.status(200).json(student)
        });

    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

// Edit contents of student by id (taskList append into returned list and send back)
studentRouter.put('/:id', async (request, response) => {
    try {
        const { id } = request.params;
        const { name, section, taskList } = request.body;  // Extract student data from request body

        if (!name || !section) {
            return response.status(400).json({ error: 'Missing field' });
        }

        const studentData = { name, section, taskList };
        await Student.findByIdAndUpdate(id, studentData, { new: true }).then(student => {
            response.status(200).json(student)
        });

    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

// Delete student by id
studentRouter.delete('/:id', async (request, response) => {
    try {
        const { id } = request.params;

        await Student.findByIdAndDelete(id).then(student => {
            response.status(200).json(student)
        });

    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

module.exports = app;