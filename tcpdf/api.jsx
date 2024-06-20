// serverless function menggunakan Node.js untuk menjalankan PHP script
module.exports = (req, res) => {
  const { spawn } = require("child_process");
  const php = spawn("php", ["script.php"]);

  php.stdout.on("data", (data) => {
    res.status(200).send(data.toString());
  });

  php.stderr.on("data", (data) => {
    console.error(`stderr: ${data}`);
  });

  php.on("close", (code) => {
    console.log(`child process exited with code ${code}`);
  });
};
