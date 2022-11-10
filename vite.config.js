import {defineConfig} from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import livewire from '@defstudio/vite-livewire-plugin';
import fs from "fs";
import {homedir} from "os";
import {resolve} from "path";

let host = "pest-test.test";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
                'app/Forms/Components/**',
            ],
        }),
        // livewire({
        //     refresh: ['resources/css/app.css'],
        // })
    ],
    server: detectServerConfig(host),
});

/**
 * Making Vite and Valet play nice together
 * https://freek.dev/2276-making-vite-and-valet-play-nice-together
 *
 * comment this out if you don't use Valet
 */

function detectServerConfig(host) {
    let keyPath = resolve(homedir(), `.config/valet/Certificates/${host}.key`);
    let certificatePath = resolve(homedir(), `.config/valet/Certificates/${host}.crt`);

    if (!fs.existsSync(keyPath)) {
        return {};
    }

    if (!fs.existsSync(certificatePath)) {
        return {};
    }

    return {
        // hmr: {host},
        host,
        https: {
            key: fs.readFileSync(keyPath),
            cert: fs.readFileSync(certificatePath),
        },
    };
}
