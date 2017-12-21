// config express js
var express = require('express');
var app = express();

// config MongoDB
var mongoClient = require('mongodb').MongoClient;
var url = 'mongodb://localhost:27017/NhaTro';

// config event
var events = require('events');
var eventEmitter = new events.EventEmitter();

var tinh;

mongoClient.connect(url, function(err, db){
    db.collection('DiaPhuong').find(null, {_id:0,tenTinh:1}).toArray(function(err, doc){
        db.close();
        console.log("-----------------------------------------------------------------")
        console.log(doc);
        tinh = doc;
    });
});

app.get('/Tinh', function(req, res){
    // res.writeHead(200, {'Content-Type': 'text/html; charset=utf-8'});
    // res.writeHead(200, {'Content-Type': 'application/json'});
    // res.end(JSON.stringify(tinh));
    res.json(tinh);
});

app.get('/Quan');

app.get('/test', function(req, res){
    res.writeHead(200, {'Content-Type': 'text/html; charset=utf-8'});
    res.end("hihi");
});

app.listen(3000);