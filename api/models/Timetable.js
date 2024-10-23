const mongoose = require('mongoose');

const timetableSchema = new mongoose.Schema({
    section: {
        type: String,
        required: true
    },event: {
        type: String,
        required: true
    },
    startTime: {
        type: String,
        required: true
    },
    endTime: {
        type: String,
        required: true
    }
});

module.exports = mongoose.model('Timetable', timetableSchema);