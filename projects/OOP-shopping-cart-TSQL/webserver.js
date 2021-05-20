var express = require('express');
var app = express();

var execPHP = require('./ExecPHP.js')();

///execPHP.phpFolder = 'C:\\Users\\cex\\Desktop\\npmphpproject\\';
execPHP.phpFolder = 'C:\\Users\\cex\\Desktop\\nodephpoopmvc_dev\\';

 // app.use('*.php',function(request,response,next) {
    app.use('/',function(request,response,next) {
	execPHP.parseFile(request.originalUrl,function(phpResult) {
		response.write(phpResult);
		response.end();
	});
});

app.listen(3000, function () {
	console.log('Node server listening on port 3000!');
});
