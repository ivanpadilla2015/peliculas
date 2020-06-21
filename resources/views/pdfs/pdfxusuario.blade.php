<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipos x User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
      body {
            /* el tamaño por defecto es 14px */
            font-size: 12px;
            }
    
    </style>
</head>
<body>
    <div class="flex">
        <div class="mt-2">
             <img src="{{ public_path('/images/logo_alfm.png')}}" width="60"  >
        </div>
        <div>
            <p>Equipos Por Usuario</p>
        </div>
    </div>
    
          <div class="mb-1">
            <small class="font-weight-bold"> Usuario:</small> {{ $user->name}}
            <small class="font-weight-bold"> Correo:</small> {{ $user->email}}
            <small class="font-weight-bold">Dependencia:</small> {{$user->dependencia->nombredepen}}
         </div> 
            <table class="table table-bordered table-sm">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Equipo</th>
                    <th scope="col">Serial</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">F. Adqui</th>
                    <th scope="col">Nombre PC</th>
                    <th scope="col">Ip</th>
                    <th scope="col">Foto</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($user->equipos as $item)
                        <tr class="">
                            <td class="">{{ $item->tipoequipo->nombretipo }}</td>
                            <td class="">{{ $item->serial }}</td>
                            <td class="text-truncate">{{ $item->marca->nombremarca }}</td>
                            <td class="text-truncate">{{ $item->modelo->nombremodelo }}</td>
                            <td class="">{{ \Carbon\Carbon::parse($item->fe_adquisicion)->format('M, Y')}} </td>
                            <td class="text-truncate">@if($item->nompc){{$item->nompc}} @else {{'Sin Nombre'}} @endif</td>
                            <td class="text-truncate">@if($item->ip){{$item->ip}} @else {{'Sin Ip'}} @endif</td>
                            <td class=""><img src="{{ public_path('/images/equipos/'.$item->namefoto)}}" width="60" ></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
   
</body>
</html>