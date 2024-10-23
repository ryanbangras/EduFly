var express = require("express");
const mongoose = require('mongoose');
var cors = require("cors");
const Student = require("./models/Student");
const Timetable = require("./models/Timetable");
const dotenv = require('dotenv')
const app = express();

dotenv.config({ path: './secret.env' })

app.use(cors());
app.use(express.json());
app.listen(3000); // Port number

var MONGOURL = process.env.MONGOURI;

mongoose
    .connect(MONGOURL)
    .then(() => {
        console.log("Connected to DB");
    }).catch((error) => {
        console.log(error);
    })

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

const timetableRouter = express.Router();
app.use('/timetable', timetableRouter)

// Creates new timetable object into the database
timetableRouter.post('/', async (request, response) => {
    try {
        const { section, event, startTime, endTime } = request.body;  // Extracts student data from request body

        if (!section || !event || !startTime || !endTime) {
            return res.status(400).json({ error: 'Missing field' });
        }

        const timetableEvent = new Timetable({ section, event, startTime, endTime });

        await timetableEvent.save()

        return response.status(200).json(timetableEvent);
    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

// Return all timetables in the database
timetableRouter.get('/', async (request, response) => {
    try {
        const timetable = await Timetable.find();
        return response.status(200).json(timetable);
    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

// Return timetable event by id
timetableRouter.get('/:id', async (request, response) => {
    try {
        const { id } = request.params;

        await Timetable.findById(id).then(timetable => {
            response.status(200).json(timetable)
        });

    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

// Return timetable by section 
timetableRouter.get('/section/:id', async (request, response) => {
    try {
        const { id } = request.params;
        
        await Timetable.find({section: id}).then(timetable => {
            response.status(200).json(timetable)
        });

    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

// Edit contents of timetable event by id 
timetableRouter.put('/:id', async (request, response) => {
    try {
        const { id } = request.params;
        const { section, event, startTime, endTime } = request.body;  // Extract student data from request body

        if (!section || !event || !startTime || !endTime) {
            return response.status(400).json({ error: 'Missing field' });
        }

        const timetableData = { section, event, startTime, endTime };
        await Timetable.findByIdAndUpdate(id, timetableData, { new: true }).then(timetable => {
            response.status(200).json(timetable)
        });

    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

// Delete timetable event by id
timetableRouter.delete('/:id', async (request, response) => {
    try {
        const { id } = request.params;

        await Timetable.findByIdAndDelete(id).then(timetable => {
            response.status(200).json(timetable)
        });

    } catch (err) {
        return response.status(400).json({ "error_message": "Something went wrong" });
    }
})

module.exports = app; 