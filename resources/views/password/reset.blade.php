<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Reset Password - {{ env('APP_NAME') }}</title>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
</head>

<body>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            font-weight: 100;
            font-size: 12px;
            line-height: 30px;
            color: #777;
            background: #edf2f7;
            padding: 0 1rem;
        }

        .container {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        #card input[type="password"],
        #card button[type="submit"] {
            font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
        }

        #card {
            background: #F9F9F9;
            padding: 25px;
            margin: 150px 0;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        #card h3 {
            display: block;
            font-size: 30px;
            font-weight: 300;
            margin-bottom: 10px;
        }

        #card h4 {
            margin: 5px 0 15px;
            display: block;
            font-size: 13px;
            font-weight: 400;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #card input[type="password"],
        #card textarea {
            width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
        }

        #card input[type="password"]:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #aaa;
        }

        #card button[type="submit"] {
            cursor: pointer;
            width: 100%;
            border: none;
            background: #2d3748;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }

        #card button[type="submit"]:hover {
            background: #505a6b;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }

        #card button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .copyright {
            text-align: center;
        }

        #card input:focus {
            outline: 0;
            border: 1px solid #aaa;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        :-moz-placeholder {
            color: #888;
        }

        ::-moz-placeholder {
            color: #888;
        }

        :-ms-input-placeholder {
            color: #888;
        }

        /* submitting animation */
        .submitting{
            display: none;
            width: 100%;
            height: 35px;
            border: none;
            background: #2d3748;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }
        .lds-ellipsis {
            display: inline-block;
            position: relative;
        }
        .lds-ellipsis div {
            position: absolute;
            top: -17px;
            width: .5rem;
            height: .5rem;
            border-radius: 50%;
            background: #fff;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }
        .lds-ellipsis div:nth-child(1) {
            left: 90px;
            animation: lds-ellipsis1 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(2) {
            left: 90px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(3) {
            left: 115px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(4) {
            left: 50px;
            animation: lds-ellipsis3 0.6s infinite;
        }
        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }
        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(0);
            }
        }
        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(24px, 0);
            }
        }

        @media (min-width: 424px) {
            .lds-ellipsis div:nth-child(1) {
                left: 130px;
                animation: lds-ellipsis1 0.6s infinite;
            }
            .lds-ellipsis div:nth-child(2) {
                left: 130px;
                animation: lds-ellipsis2 0.6s infinite;
            }
            .lds-ellipsis div:nth-child(3) {
                left: 155px;
                animation: lds-ellipsis2 0.6s infinite;
            }
        }
    </style>

    <div class="container">
        <div id="card">
            <div class="reset">
                <h3>Reset your password</h3>
                <h4>Set your new password</h4>
                <fieldset>
                    <input placeholder="Your new password" type="password" tabindex="1" required autofocus name="password">
                </fieldset>
                <fieldset>
                    <input placeholder="Re enter password" type="password" tabindex="2" required name="repassword">
                </fieldset>
                <input type="hidden" value="{{ $token }}" name="token">
                <fieldset>
                    <button type="submit" onclick="passwordSubmit()">
                        Submit
                    </button>
                    <div class="submitting">
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="successful" style="display: none">
                <h3>Done!</h3>
                <h4>Your password has been successfully updated!</h4>
                <h4>Now, you need to do login with your new password.</h4>
                <h4>Regards.</h4>
            </div>
            <p class="copyright">© 2020 {{ env('APP_NAME') }}. All rights reserved.</p>
        </div>
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        password = document.getElementsByName('password')[0]
        repassword = document.getElementsByName('repassword')[0]
        token = document.getElementsByName('token')[0].value

        passwordSubmit = () => {
            switch (true) {
                case password.value === '':
                    toastr.warning('Insert password.', 'Please', {timeOut: 700})
                    break
                case repassword.value === '':
                    toastr.warning('Re enter the new password', 'Please', {timeOut: 700})
                    break
                case password.value.length < 4:
                    toastr.warning('Insert a password more then 4 letters', 'Please', {timeOut: 1200})
                    break
                case password.value.length > 20:
                    toastr.warning('Insert a password less then 20 letters', 'Please', {timeOut: 1200})
                    break
                case password.value !== repassword.value:
                    toastr.error('Passwords doesnt equals.', 'Sorry', {timeOut: 700})
                    break
                default:
                    document.getElementsByTagName('button')[0].style.display = 'none'
                    document.getElementsByClassName('submitting')[0].style.display = 'block'
                    axios.post('http://api.bookcommunity.local/api/user/password/reset', {
                        password: password.value,
                        repassword: repassword.value,
                        token: token
                    })
                        .then(() => {
                            document.getElementsByClassName('reset')[0].style.display = 'none'
                            document.getElementsByClassName('successful')[0].style.display = 'block'
                        })
                        .catch(error => {
                            console.log(error)
                        })
            }
        }
    </script>
</body>

</html>
