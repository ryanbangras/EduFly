const mongoose = require('mongoose');

const timetableSchema = new mongoose.Schema({
    event: {
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