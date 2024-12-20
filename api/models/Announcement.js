const mongoose = require('mongoose');

const announcementSchema = new mongoose.Schema({
    timestamp: {
        type: String,
        required: true
    },
    section: {
        type: String,
        required: true
    },
    title: {
        type: String,
        required: true
    },
    author: {
        type: String,
        required: true
    },
    message: {
        type: String,
        required: true
    }

})

// Change name here
module.exports = mongoose.model('Announcement', announcementSchema)