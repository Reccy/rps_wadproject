// Code taken from https://gist.github.com/hectorcorrea/2573391

// A very basic web server in node.js
// Stolen from: Node.js for Front-End Developers by Garann Means (p. 9-10) 

var port = process.env.PORT;
var serverUrl = process.env.IP;

var http = require("http");
var path = require("path"); 
var fs = require("fs"); 		

console.log("Starting web server at " + serverUrl + ":" + port);

http.createServer( function(req, res) {

	var now = new Date();
	
	var filename = req.url || "index.html";
	var ext = path.extname(filename);
	var localPath = __dirname;
	var validExtensions = {
		"" : "text/html",
		".html" : "text/html",			
		".js": "application/javascript", 
		".css": "text/css",
		".txt": "text/plain",
		".jpg": "image/jpeg",
		".gif": "image/gif",
		".png": "image/png"
	};
	var isValidExt = validExtensions[ext];
	
	if (isValidExt) {
		
		localPath += filename;
		fs.exists(localPath, function(exists) {
			if(exists) {
				if(filename == "/"){ //If filename is '/' then load index.html
					console.log("Serving file: " + localPath + "index.html"); 
					getFile("/home/ubuntu/workspace/index.html", res, isValidExt);
				} else {
					console.log("Serving file: " + localPath); 
					getFile(localPath, res, isValidExt);
				}
				
			} else {
				console.log("File not found: " + localPath);
				res.writeHead(404);
				res.end();
			}
		});

	} else {
		console.log("Invalid file extension detected: " + ext);
	}

}).listen(port, serverUrl);

function getFile(localPath, res, mimeType) {
	fs.readFile(localPath, function(err, contents) {
		if(!err) {
			res.setHeader("Content-Length", contents.length);
			res.setHeader("Content-Type", mimeType);
			res.statusCode = 200;
			res.end(contents);
		} else {
			res.writeHead(500);
			res.end();
		}
	});
}