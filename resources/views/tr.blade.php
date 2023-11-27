<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Translation</title>
</head>
<body>
 <h1>   {{ __('welcome') }} </h1>
@{{ $data }}({{ __('welcome') }})
 <button onclick="onclick1()"> Change language</button>
<script>

  const onclick1= ()=>{
return fetch('/change/ar', {
        headers: {
            'content-type': 'application/json',
            'accept': 'application/json',

        },
        credentials: 'include',
        method: 'GET'
    });}
</script>

</body>
</html>
