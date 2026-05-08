import fs from 'fs';
import https from 'https';
import querystring from 'querystring';

const diagrams = ['usecase', 'class', 'sequence', 'state'];

diagrams.forEach(name => {
    const code = fs.readFileSync(`${name}.mmd`, 'utf-8');
    const postData = querystring.stringify({
        code: code,
        backgroundColor: '#ffffff'
    });

    const options = {
        hostname: 'quickchart.io',
        port: 443,
        path: '/mermaid',
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Content-Length': Buffer.byteLength(postData)
        }
    };

    const req = https.request(options, (res) => {
        const file = fs.createWriteStream(`${name}.png`);
        res.pipe(file);
        file.on('finish', () => {
            file.close();
            console.log(`Downloaded ${name}.png`);
        });
    });

    req.on('error', (e) => {
        console.error(`Problem with request: ${e.message}`);
    });

    req.write(postData);
    req.end();
});
