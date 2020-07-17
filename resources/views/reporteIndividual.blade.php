<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1"> Para que se vea bien en dispositivos moviles-->
    <title>Reporte Proveedor</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
</head>
<body>
        <div>
            <table width="100%" border="0">
                <tr>
                    <td width="30%" rowspan="2" > <div align="center"><img src="/images/webcoop.png"  width="185" height="63"  alt="imagen webcoop" > </div></td>
                    <td> <div align="center"><span style="font-weight:bold"> !Solvecia y seguridad a su servicio..! <span> </div></td>
                </tr>    
            <table>
        </div>

<div style="margin:auto; align:center;">
        <table class="table table-striped" align="center"  style="border-width:3px;" border="1" cellpadding="4" cellspacing="2" >
                            <thead >
                                <tr> 
                                    <td align="center" bgcolor="#006699" colspan="15" ><font color="white"><span style="font-weight:bold">REPORTE DE ASISTENCIAS {{$grupo}}</span ></font></td>
                                </tr>
                                <tr>
                                    <td align="center" bgcolor="#006699" >NOMBRE</td>
                                    <td align="center" bgcolor="#006699">TIPO DE REGISTRO</td>
                                    <td align="center" bgcolor="#006699">FECHA</td>
                                </tr>
                            <tbody >
                                @if($reporteIndividualVar->count())
                                @foreach($reporteIndividualVar as $reporteIndividualVar)
                                <tr>
                                    <td>{{$reporteIndividualVar->name}}</td>
                                    <td>{{$reporteIndividualVar->tipoRegistro}}</td>
                                    <td>{{$reporteIndividualVar->horaRegistro}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspn="8"> No existen información de la matriz </td>
                                </tr>
                                @endif
                            </tbody>
        </table>
</div>   
</body>
</html>