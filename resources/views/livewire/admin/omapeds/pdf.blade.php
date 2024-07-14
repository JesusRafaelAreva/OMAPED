<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMAPEDS</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;  
            height: 29.7cm; 
            margin: 0 auto; 
            color: #001028;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
            font-size: 10px; 
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: left;
            margin-bottom: 10px;
            width: 15%;
            float: left;
        }

        #logo img {
            width: 90px;
            float: left;
        }

        h2, h3 {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #000000;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 10px 0;
        }

        #project {
            width: 70%;
            float: left;
        }

        #firmas {
            width: 33.3%;
            float: left;
        }

        #firmas span, #project span, #project2 span {
            color: #000000;
            text-align: center;
            display: inline-block;
            font-size: 1em;
            font-weight: 300;
        }

        #project2 {
            width: 30%;
            float: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 10px;
            font-size: 8px; /* Adjusted font size for the table */
            margin-top: 20px; /* Added margin-top to lower the table */
        }

        table th, table td {
            text-align: center;
            border: 1px solid #C1CED9;
            padding: 3px; /* Adjusted padding for table cells */
        }

        table th {
            color: #000000;
            background: #F5F5F5;
            white-space: nowrap;        
            font-weight: normal;
        }

        table .service, table .desc {
            text-align: left;
        }

        table td.service, table td.desc {
            vertical-align: top;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        #mobra {
            width: 40%;
            float: left;
            margin-right: 20px;
        }

        #resumen {
            width: 60%;
            float: left;
            margin-right: 20px;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: -1;
        }

        .watermark img {
            width: 70%; /* Increased width for a larger watermark */
            height: auto;
        }
    </style>
</head>
<body>
    <div class="watermark">
    </div>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Ficha</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Teléfono Fijo</th>
                <th>Número de Whatsapp</th>
                <th>¿Cuántos Hogares Ocupan en la Vivienda?</th>
                <th>Fecha de Nacimiento</th>
                <th>Años</th>
                <th>Meses</th>
            </tr>
        </thead>
        <img src="https://www.mdbellavista.gob.pe/wordpress/wp-content/uploads/2023/04/LOGO_CUADRADO_MDB.png" alt="Watermark" style="width:20px; height: 20px">
        <tbody>
            @foreach($omapedss as $omaped)
            <tr>
                <td>{{ $omaped->DNI }}</td>
                <td>{{ $omaped->ficha }}</td>
                <td>{{ $omaped->direccion }}</td>
                <td>{{ $omaped->telefono }}</td>
                <td>{{ $omaped->telefono_fijo}}</td>
                <td>{{ $omaped->whatsapp}}</td>
                <td>{{ $omaped->hogares_ocupan_vivienda}}</td>
                <td>{{ $omaped->fecha_naci}}</td>
                <td>{{ $omaped->anos}}</td>
                <td>{{ $omaped->mes}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
