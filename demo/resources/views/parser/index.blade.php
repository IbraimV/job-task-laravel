<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
       <div class="container">
           <h1>Все парсеры</h1>
           <a href="{{ route ('parser.create') }}" class="mt-3 mb-5 btn btn-dark">Добавить новый</a>
           <table width="100%">
                       <thead>
                           <tr>
                               <td>id</td>
                               <td>Начальная ссылка</td>
                               <td>Селектор ссылок</td>
                               <td>Селектор загловка</td>
                               <td>Селектор картинки</td>
                               <td>Тип аттрибута картинки</td>
                               <td>Селектор контента</td>
                               <td></td>
                           </tr>
                       </thead>
                       <tbody>
                       @foreach($parsers as $parser)
                           <tr>
                               <td>{{$parser->id}}</td>
                               <td>{{$parser->start_url}}</td>
                               <td>{{$parser->selector_url}}</td>
                               <td>{{$parser->selector_title}}</td>
                               <td>{{$parser->selector_image}}</td>
                               <td>{{$parser->selector_image_attr}}</td>
                               <td>{{$parser->selector_content}}</td>
                               <td>
                                   <form
                                       class="float-right ml-2" method="post" action="{{route('parser.destroy', $parser->id)}}">
                                       @csrf
                                       @method('DELETE')
                                       <button  type="submit" class="btn btn-danger btn-sm" href="#" onclick="return confirm('Are you sure you want to delete this category?')">
                                           Удалить
                                       </button>
                                   </form>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
       </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
