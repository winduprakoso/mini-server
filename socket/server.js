const express = require('express');
const app = express();
const http = require('http');
const { Server } = require('socket.io');
const { createServer } = require("http");
const server = http.createServer(app);
const httpServer = createServer(app);
const io = require('socket.io')(server, {
    cors: { origin: "*" }
});

app.use(express.json()); // For parsing JSON request bodies (add this!)

app.get('/', (req, res) => {
    res.send('<h1>Hello world</h1>');
});

app.get("/monitor", (req, res) => {
    res.sendFile(__dirname + "/monitor.html");
});


app.post('/update-monitor', async (req, res) => {
    try {
        const serialNp = req.body.serial_np;
        const scannedAt = req.body.scanned_at;
        const total = req.body.total;

        const responseData = { 
            success: true,
            message : "Successfully Update ",
            data : {
                serial_np : serialNp,
                scanned_at : scannedAt,
                total : total
            },
        }

        io.emit('update-monitor-realtime', responseData);

        res.json(responseData);
    } catch (error) {
        console.error(error);
        res.status(500).json({ error: 'An error occurred' });
    }
});

app.get("/assets/js/jquery.min.js", (req, res) => {
    res.sendFile(__dirname + "/assets/js/jquery.min.js");
});
app.get("/assets/js/bootstrap.min.js", (req, res) => {
    res.sendFile(__dirname + "/assets/js/bootstrap.min.js");
});
app.get("/assets/css/bootstrap.min.css", (req, res) => {
    res.sendFile(__dirname + "/assets/css/bootstrap.min.css");
});

io.on('connection', (socket) => {
    console.log('connection');

    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
})

server.listen(3000, () => {
    console.log('Server is running');
});