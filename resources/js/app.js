import './bootstrap';
import Echo from "laravel-echo";
window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001' // Assuming your Echo server runs on port 6001
    // Additional configuration options can be added here
});


window.Echo.join(`online`)
    .here((users) => {
        console.log(users);
    })
    .joining((user) => {
        console.log(user.name);
    })
    .leaving((user) => {
        console.log(user.name);
    })
    .error((error) => {
        console.error(error);
    });
