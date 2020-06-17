<?php 

class Funciones{
//Recibe un el título de una película y busca su poster, descripción, año y la ficha en imdb
    function getPeliculas($peli){
        $key = '8d5a8aff';
        $peli = $_POST['pelicula'];
        $peli = strtr($peli, " ", "-");//Reemplaza los espacios por guiones

        $api_url = json_decode(file_get_contents('http://www.omdbapi.com/?apikey=' . $key . '&s=' . $peli . ''));
        if (empty($api_url->Search)) {
            echo '<h5 class="text-center text-black">No se ha podido encontrar lo que buscas</h5>';
        } else {
            foreach ($api_url->Search as $search) {

                if($search->Type=="movie"){

                    echo '<div class="col-4 my-3"><div class="card">';
                    echo '<img src="' . $search->Poster . '" alt="" srcset=""><br><br>';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $search->Title . ' ('.$search->Year.')'.'</h5>';
                    $id = $search->imdbID;
                    $api_id = json_decode(file_get_contents('http://www.omdbapi.com/?i=' . $id . '&apikey=' . $key . ''));
                    echo $api_id->Plot . '<br><br>';
                    echo '<a href="https://www.imdb.com/title/'.$search->imdbID .'" target="_blank">Ficha en IMDB</a>';
                    echo "</div></div></div>";

                }
            }
        }
    }
}

?>
<a href=""></a>