<?php



// Read file JSON
$json = file_get_contents('dischi.json');


// Decode JSON to PHP array
$dischi = json_decode($json, true);


// Check if the form is submitted

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $new_disco = [
        'titolo' => $_POST['titolo'],
        'artista' => $_POST['artista'], 
        'url_della_cover' => $_POST['url_della_cover'],
        'anno_di_pubblicazione' => $_POST['anno_di_pubblicazione'],
        'genere' => $_POST['genere']
    ];

// Add the new disco to the array
    $dischi[] = $new_disco;

// Save back to JSON file
    file_put_contents('dischi.json', json_encode($dischi, JSON_PRETTY_PRINT));

// Set a session message
    $_SESSION['message'] = 'Disco aggiunto con successo!';

// Redirect to the index page
    header('Location: index.php');
    exit;
    
}


