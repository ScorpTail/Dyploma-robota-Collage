import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...getScssFiles(),
                ...getJsFiles(),
                ...getCssFiles(),
                // Додайте інші файли, які вам потрібні
                // ...
            ],
            refresh: true,
        }),
    ],
});

function getScssFiles() {
    const scssPath = path.resolve(__dirname, 'resources/sass/');
    const files = getFilesRecursively(scssPath);
    return files.filter((file) => file.endsWith('.scss'));
}

function getCssFiles() {
    const scssPath = path.resolve(__dirname, 'resources/js/');
    const files = getFilesRecursively(scssPath);
    return files.filter((file) => file.endsWith('.css'));
}

function getJsFiles() {
    const resourcesDir = path.resolve(__dirname, 'resources');
    const jsFiles = getFilesRecursively(path.join(resourcesDir, 'js')).filter(file => file.endsWith('.js'));
    return jsFiles;
}

function getFilesRecursively(dir) {
    const files = fs.readdirSync(dir);
    let fileArray = [];
    files.forEach((file) => {
        const filePath = path.join(dir, file);
        const stat = fs.statSync(filePath);
        if (stat && stat.isDirectory()) {
            fileArray = fileArray.concat(getFilesRecursively(filePath));
        } else {
            fileArray.push(filePath);
        }
    });
    return fileArray;
}