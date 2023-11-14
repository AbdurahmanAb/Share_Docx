<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <script>
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) {
                return parts.pop().split(';').shift();
            }
        }

        function login() {
            const cookie = getCookie('XSRF-TOKEN');
            console.log(decodeURIComponent(cookie));
            return fetch('/login', {
                headers: {
                    'content-type': 'application/json',
                    'accept': 'application/json',
                    'X-XSRF-TOKEN': decodeURIComponent(cookie),
                },
                creddentials: 'include',
                method: 'POST',

                body: JSON.stringify({
                    "email": "abd4@gmail.com",
                    "password": "12345678"
                })
            })
        }
        fetch('/sanctum/csrf-cookie', {
    headers: {
        'content-type': 'application/json',
        'accept': 'application/json'
    },
    credentials: 'include'
})
.then(() => {
    login();
})
.then(() => {
    const cookie = getCookie('XSRF-TOKEN');
    return fetch('/api/v1/user', {
        headers: {
            'content-type': 'application/json',
            'accept': 'application/json',
            'X-XSRF-TOKEN': decodeURIComponent(cookie),
        },
        credentials: 'include',
        method: 'GET'
    });
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
})
.then(data => {
    console.log(data);
})
.catch(error => {
    console.error('There was an error!', error);
});

    </script>
</body>

</html>
