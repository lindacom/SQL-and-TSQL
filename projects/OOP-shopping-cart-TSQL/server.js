//server.js
const http = require("http"),
  server = http.createServer();

const fs = require("fs");

server.on("request", (request, response) => {
  fs.readFile("index.asp", function(err, data) {
    response.writeHead(200, { "Content-Type": "text/html" });
    response.write(data);
    response.end();
  });
});

server.listen(3000, () => {
  console.log("Node server created at port 3000");
});
