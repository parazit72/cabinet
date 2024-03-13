<!DOCTYPE html>
<html>

<head>
    <style>
    @media only screen and (max-width: 600px) {
        .container {
            padding: 20px;
        }

        table {
            width: 100% !important;
        }

        th,
        td {
            display: block;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td:before {
            content: attr(data-label);
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0 auto;
        padding: 20px;
        background-color: #f7f7f7;
    }

    .container {
        background-color: #ffffff;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    h1 {
        color: #001529;
        font-size: 24px;
        margin-top: 0;
        margin-bottom: 20px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dddddd;
        color: #333333;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    td:before {
        content: "";
        display: none;
    }

    a {
        color: #0066cc;
        text-decoration: none;
    }

    .logo {
        text-align: center;
        margin-bottom: 20px;
    }

    .logo img {
        max-width: 150px;
        height: auto;
    }

    .text-center {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <br />
        <hr />
        <h3 class="text-center">Verification Code: {{$data['verification_code']}}</h3>
        <hr />
        <p>
            We're verifying a recent sign-in for {{$data['username']}}:
        </p>
        <table>
            <tr>
                <th>Timestamp</th>
                <td>{{$data['last_login_at']}} GMT </td>
            </tr>
            <tr>
                <th>IP Address:</th>
                <td>{{$data['ip']}}</td>
            </tr>
            <tr>
                <th>Location:</th>
                <td>{{$data['location']}}</td>
            </tr>
            <tr>
                <th>User agent:</th>
                <td>{{$data['user_agent']}}</td>
            </tr>

        </table>

        <p>
            You're receiving this message because of a successful sign-in from a device that we didn't recognize. <b>If
                you believe that this sign-in is suspicious</b>,
            please reset your password immediately and contact with {{env('MAIL_FROM_ADDRESS')}}.
        </p>
        <p>
            If you're aware of this sign-in, please disregard this notice. This can happen when you use your browser's
            incognito or private browsing mode or clear your cookies.
        </p>
        <p>
            Thanks,
        </p>
    </div>
</body>

</html>