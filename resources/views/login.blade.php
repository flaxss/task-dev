<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container mt-5 p-2 bs-tertiary-bg-rgb" style="width: 400px">
    <div id="liveAlertPlaceholder"></div>
        <form action="/login" method="POST">
            @csrf
            <div class="mb-2">
                <input class="form-control" type="text" name="email" placeholder="Email">
            </div>
            <div class="mb-2">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <button class="btn btn-dark">Login</button>
        </form>
        
    <!-- <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button> -->
    </div>
    <script>
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const appendAlert = (message, type) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')

        alertPlaceholder.append(wrapper)
        }

        const alertTrigger = document.getElementById('liveAlertBtn')
        if (alertTrigger) {
        alertTrigger.addEventListener('click', () => {
            appendAlert('Nice, you triggered this alert message!', 'success')
        })
        }
    </script>
</body>
</html>