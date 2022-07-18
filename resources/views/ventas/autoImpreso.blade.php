<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

    <style>
        html { margin: 5px}
        * { font-size: 9 }
        @page { size: 216pt 800pt; }
    </style>
    
    ----------------------------------------------------------------------<br/>

    <center>
    {{env('Empresa')}} <br/>
    {{env('Actividad')}} <br/>

    Central: {{env('Central')}} <br/>
    Sucursal: {{$venta->aperturas->cajas->sucursales->nombre}} <br/>
    Ruc: {{env('RUC')}} <br/>
    Teléfono: {{$venta->aperturas->cajas->sucursales->telefono}} <br/>
    Timbrado: {{$venta->aperturas->cajas->timbrados->numero}} <br/>
    Valido desde: {{$venta->aperturas->cajas->timbrados->fecha_inicio}} <br/>
    Valido hasta: {{$venta->aperturas->cajas->timbrados->fecha_fin}} <br/>
    Factura contado No.: {{$venta->aperturas->cajas->expedicion_fiscal}} - {{$venta->numero_factura}} <br/>
    IVA incluido
    </center>
    <br/>

    ----------------------------------------------------------------------<br/>

    <table style="width: 100%">
        <tr>
            <td>FECHA:</td>
            <td> {{date('Y-m-d', strtotime($venta->fecha_hora))}} </td>
            <td>HORA:</td>
            <td> {{date('H:i:s', strtotime($venta->fecha_hora))}} </td>
        </tr>
        <tr>
            <td>CAJA:</td>
            <td> {{$venta->aperturas->cajas->nombre}} </td>
            <td>MONEDA:</td>
            <td>GS.</td>
        </tr>
        <tr>
            <td>CAJERO:</td>
            <td> {{$venta->users->name}} </td>
        </tr>
    </table>

    ----------------------------------------------------------------------<br/>

    <table style="width: 100%">
        <thead>
            <tr>
                <th>COD.</th>
                <th>CANT.</th>
                <th>DESP.</th>
                <th>PRECIO</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->productos as $v)
                <tr>
                    <td> {{$v->id}} </td>
                    <td> {{number_format($v->pivot->cantidad, 0)}} </td>
                    <td> {{$v->nombre}} </td>
                    <td> {{number_format($v->pivot->precio, 0)}} </td>
                    <td> {{number_format($v->pivot->cantidad * $v->pivot->precio , 0)}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    ----------------------------------------------------------------------<br/>

    <table style="width: 100%">
        <tr>
            <td>Total a pagar:</td>
            <td> {{number_format($venta->subTotal(), 0)}} </td>
        </tr>
    </table>

    ----------------------------------------------------------------------<br/>

    <table style="width: 100%">
        <tr>
            <td>TOTAL EXENTO</td>
            <td>:</td>
            <td> {{number_format($venta->totalIVA(3), 0)}} </td>
        </tr>
        <tr>
            <td>TOTAL GRAVADA 5%</td>
            <td>:</td>
            <td> {{number_format($venta->totalIVA(2), 0)}} </td>
        </tr>
        <tr>
            <td>TOTAL GRAVADA 10%</td>
            <td>:</td>
            <td> {{number_format($venta->totalIVA(1), 0)}} </td>
        </tr>
        <tr>
            <td>TOTAL I.V.A. 5%</td>
            <td>:</td>
            <td> {{number_format($venta->totalIVAValor(2), 0)}} </td>
        </tr>
        <tr>
            <td>TOTAL I.V.A. 10%</td>
            <td>:</td>
            <td> {{number_format($venta->totalIVAValor(1), 0)}} </td>
        </tr>
        <tr>
            <td>TOTAL I.V.A.</td>
            <td>:</td>
            <td> {{number_format($venta->totalIVAValor(2) + $venta->totalIVAValor(1), 0)}} </td>
        </tr>
    </table>

    ----------------------------------------------------------------------<br/>

    <table style="width: 100%">
        <tr>
            <td>RAZÓN SOCIAL</td>
            <td>:</td>
            <td> {{$venta->personas->nombre}} </td>
        </tr>
        <tr>
            <td>R.U.C.</td>
            <td>:</td>
            <td>
                {{$venta->personas->documento}}
                @if($venta->personas->digito_verificador)
                    -{{$venta->personas->digito_verificador}}
                @endif
            </td>
        </tr>
    </table>

    ----------------------------------------------------------------------<br/>
    <CENTER> * GRACIAS POR SU COMPRA * </CENTER>
    ----------------------------------------------------------------------<br/>

    <table style="width: 100%">
        <tr>
            <td>ORIGINAL</td>
            <td>:</td>
            <td>CLIENTE</td>
        </tr>
        <tr>
            <td>DUPLICADO</td>
            <td>:</td>
            <td>ARCHIVO TRIBUTARIO</td>
        </tr>
    </table>

</body>
</html>