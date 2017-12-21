var mongoClient = require('mongodb').MongoClient;
var url = 'mongodb://localhost:27017/NhaTro';

var fs = require('fs');
var tinh;
var phuong;
/*
|----------------------------------------------------------------------------------------------------
| Lưu ý: NodeJs không đồng bộ
|----------------------------------------------------------------------------------------------------
*/
mongoClient.connect(url, function(err,db){
    /*
    if(err) throw err;

    var select = {_id:0};
    var where = {maTinh:"04"};

    // lấy tên tỉnh
    db.collection('DiaPhuong').find(null, {_id:0,tenTinh:1}).forEach(function(doc){
        db.close();
        console.log("-----------------------------------------------------------------")
        console.log(doc);
        tinh = doc;
    })


    db.collection('DiaPhuong').find(where, select).forEach(function(doc){
        db.close();
        console.log(doc.quan[0].phuong[0].tenPhuong);
        console.log("-----------------------------------------------------------------")
        phuong = doc.quan[0].phuong;
        console.log(phuong);
        console.log("-----------------------------------------------------------------")
        for(x in doc.quan){
            if(doc.quan[x].maQuan == 02) // === "02"
                console.log(doc.quan[x].phuong)
        }
    })
    */
    db.collection('DiaPhuong').find().sort({'tenTinh' : 1})
});