<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  
    <div class="mb-2">
      <img src="{{public_path('/images/logo_alfm.png')}}" width="60"  >
     </div>
      
      <table class="table table-bordered ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Equipo</th>
              <th scope="col">Serial</th>
              <th scope="col">Marca</th>
              <th scope="col">Adquirido</th>
              <th scope="col">PC</th>
              <th scope="col">Foto</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($data as $item)
                  <tr>
                      <th scope="row">{{ $item->id }}</th>
                      <td class=" text-sm ">{{ $item->tipoequipo->nombretipo }}</td>
                      <td class="">{{ $item->serial }}</td>
                      <td class="text-truncate">{{ $item->marca->nombremarca }}</td>
                      <td class="">{{ \Carbon\Carbon::parse($item->fe_adquisicion)->format('M, Y')}} </td>
                      <td>{{$item->nompc}}</td>
                      <td class=""><img src="{{ public_path('/images/equipos/'.$item->namefoto)}}" width="60" ></td>
                  </tr>
             
              @endforeach
          </tbody>
        </table>
  
  
</body>
</html>