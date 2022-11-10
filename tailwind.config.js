/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/src/View/**/*.php",
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        // './storage/framework/views/*.php',
        './resources/**/*.js',
    ],
    theme: {
        container: {
            center: true,
        },
    },
    plugins: [
        require('@tailwindcss/forms')
    ],
}
