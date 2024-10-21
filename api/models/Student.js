const mongoose = require('mongoose');

const studentSchema = new mongoose.Schema({
    name: {
        type: String,
        required: true
    },
    section: {
        type: String,
        required: true
    }, 
    taskList: {
        type: [String],
        required: false
    }
})

// Change name here
module.exports = mongoose.model('Student', studentSchema)