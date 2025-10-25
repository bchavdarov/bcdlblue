import fs from "fs";

const pkg = JSON.parse(fs.readFileSync("package.json", "utf8"));
const cssPath = "style.css";

let css = fs.readFileSync(cssPath, "utf8");
css = css.replace(/Version:\s*[0-9]+\.[0-9]+\.[0-9]+/, `Version: ${pkg.version}`);
fs.writeFileSync(cssPath, css);

console.log(`✔ Updated style.css to version ${pkg.version}`);
