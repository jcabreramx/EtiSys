<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Alertas ETICOM</title>
</head>

<body>

    <table style="width: 100%">
        <tr style="background-color: #436586; color: #fff; font-stretch: bold; border: #436586 solid 1px">
            <th colspan="2">
                <h2>{{ $mensaje }}</h2>
            </th>
        </tr>
        <tbody>
            <tr>
                <td style="border: solid 1px #436586; text-align: right">Correo : </td>
                <td style="border: solid 1px #436586">{{ $email }} &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td style="border: solid 1px #436586; text-align: right">Usuario : </td>
                <td style="border: solid 1px #436586">{{ $usuario }} &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td style="border: solid 1px #436586; text-align: right">Nombre : </td>
                <td style="border: solid 1px #436586">{{ $nombre }} &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td style="border: solid 1px #436586; text-align: right">Password : </td>
                <td style="border: solid 1px #436586">{{ $password }} &nbsp;&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <p>Este e-mail se ha generado por un sistema automático. Por favor, no respondas a este e-mail directamente.</p>
</body>
