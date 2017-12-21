var mongoClient = require('mongodb').MongoClient;
var url = 'mongodb://localhost:27017/NhaTro';

var fs = require('fs');
var documents;
/*
|----------------------------------------------------------------------------------------------------
| Lưu ý: NodeJs không đồng bộ
|----------------------------------------------------------------------------------------------------
*/
mongoClient.connect(url, function(err,db){
    if(err) throw err;
    db.collection('DiaPhuong').drop(function(){
        console.log('Collection DiaPhuong has been Deleted');
        
        fs.readFile('./database/TableDiaPhuong/diaPhuong.json','utf8', function(err, data){
            if(err) throw err;
            documents = JSON.parse(data);
            console.log('Has read .json');
                
            db.collection('DiaPhuong').insertMany(documents, function(err, result){
                if(err) throw err;
                console.log('Insert Successfull');
                db.close();
            });
        });
    });
});