import fs from 'fs';
import https from 'https';
import zlib from 'zlib';

const diagrams = ['usecase', 'class', 'sequence', 'state'];

diagrams.forEach(name => {
    const code = fs.readFileSync(`${name}.mmd`, 'utf-8');
    
    // For kroki.io: deflated + base64url
    const deflated = zlib.deflateSync(code);
    const payload = deflated.toString('base64')
        .replace(/\+/g, '-')
        .replace(/\//g, '_')
        .replace(/=+$/, '');
        
    const url = `https://kroki.io/mermaid/png/${payload}`;
    
    https.get(url, (res) => {
        if (res.statusCode !== 200) {
            console.error(`Failed to get ${name}.png: Status Code ${res.statusCode}`);
            res.resume();
            return;
        }
        const file = fs.createWriteStream(`${name}.png`);
        res.pipe(file);
        file.on('finish', () => {
            file.close();
            console.log(`Downloaded ${name}.png`);
        });
    }).on('error', (e) => {
        console.error(`Error with ${name}: ${e.message}`);
    });
});
