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
           <h1>Создать парсер</h1>
           <form action="{{route('parser.store')}}" method="post">
               @csrf
               <div class="row">
                   <div class="col-12 mt-2">
                       <span>Ссылка для начала парса</span>
                       <input type="text" name="start_url" class="form-control" placeholder="Начальная ссылка">
                   </div>
                   <div class="col-12 mt-2">
                       <span>Селектор СSS для ссылок</span>
                       <input type="text" name="selector_url" class="form-control" placeholder="Селектор ссылок">
                   </div>
                   <div class="col-12 mt-2">
                       <span>Селектор СSS для загловка статьи</span>
                       <input type="text" name="selector_title" class="form-control" placeholder="Селектор заголовка">
                   </div>
                   <div class="col-12 mt-2">
                       <span>Селектор СSS изображения</span>
                       <input type="text" name="selector_image" class="form-control" placeholder="Селектор изображения">
                   </div>
                   <div class="col-12 mt-2">
                       <span>С какого аттрибута берем изображения (src/data-src/lazy-src...)</span>
                       <input type="text" name="selector_image_attr" class="form-control" placeholder="Аттрибут изображения">
                   </div>
                   <div class="col-12 mt-2">
                       <span>Селектор СSS содержания новости</span>
                       <input type="text" name="selector_content" class="form-control" placeholder="Селектор содержания">
                   </div>
                   <div class="col-12 mt-2">
                       <button type="submit" class="btn btn-dark" >Сохранить</button>
                   </div>
               </div>
           </form>
       </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
