var express = require('express');
var router = express.Router();

router.post('/', function (req, res, next) {

    if (!req.files)
        return res.status(400).send('No files were uploaded.');



    let sampleFile = req.files.file;

    // Use the mv() method to place the file somewhere on your server
    sampleFile.mv(`${__dirname}/../public/${req.body.filename}.jpg`, function (err) {
        if (err)
            return res.status(500).send(err);

        res.send('File uploaded!');
    });
});

module.exports = router;
