<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($files as $file)

    <iframe 
        src="https://view.officeapps.live.com/op/embed.aspx?src={{ asset('bi-monthly-report/Book1_1.xlsx') }}" 
        style="width:600px; height:500px;" 
    frameborder="0">
    </iframe>
    
        {{-- <iframe height="400" width="400" src="/assets/macaraeg/Book1_1.xlsx" frameborder="0"></iframe> --}}
    @endforeach
</body>
</html>