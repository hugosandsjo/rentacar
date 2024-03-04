<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>

<body>


    <h1>Rentacar</h1>
    <div class="login-div">
        <div class="form-switch">
            <p>Login</p>
            <label class="switch">
                <input type="checkbox" id="viewToggle">
                <span class="slider round"></span>
            </label>
            <p>Sign up</p>
        </div>
        <div id="content"></div>
    </div>
    <script>
        window.onload = function() {
            fetch('/login')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('content').innerHTML = html;
                });
        };

        document.getElementById('viewToggle').addEventListener('change', function() {
            const viewToFetch = this.checked ? 'signup' : 'login';

            fetch(`/${viewToFetch}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('content').innerHTML = html;
                });
        });
    </script>
</body>

</html>
