<?php

function validateStory(array $story): array
{
    $errors = [];

    if(empty($story['title'])) {
        $errors[] = 'Le titre est obligatoire';
    }
    $maxTitleLength = 255;
    if(strlen($story['title']) > $maxTitleLength) {
        $errors[] = 'Le titre doit faire moins de ' . $maxTitleLength;
    }
    
    $maxAuthorLength = 100;
    if(strlen($story['author']) > $maxAuthorLength) {
        $errors[] = 'L\'auteur doit faire moins de ' . $maxAuthorLength;
    }

    if(empty($story['content'])) {
        $errors[] = 'Le contenu est obligatoire';
    }

    return $errors;
}