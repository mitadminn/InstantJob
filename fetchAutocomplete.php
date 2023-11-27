<?php

// Example array of suggestions
$suggestions = array(
    'PHP',
    'JavaScript',
    'Python',
    'Java',
    'Ruby',
    'C++',
    'HTML',
    'CSS',
    'React',
    'Vue',
    'Angular'
);

// Retrieve user input and category from POST data
$query = $_POST['query'];
$category = $_POST['category'];

// Filter suggestions based on the user input and category
$filteredSuggestions = array_filter($suggestions, function ($suggestion) use ($query, $category) {
    return stripos($suggestion, $query) !== false; // Case-insensitive search
});

// Return the filtered suggestions as JSON
echo json_encode($filteredSuggestions);
?>
