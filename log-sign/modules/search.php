<?php

// Get search input and filter values from the URL parameters
$search_input = isset($_GET['search-input']) ? $_GET['search-input'] : '';
$price_filter = isset($_GET['price-filter']) ? $_GET['price-filter'] : '';
$cuisine_filter = isset($_GET['cuisine-filter']) ? $_GET['cuisine-filter'] : '';
$delivery_filter = isset($_GET['delivery-filter']) ? $_GET['delivery-filter'] : '';

// Build the SQL query to retrieve the restaurant data based on the search input and filters
$query = "SELECT * FROM restaurant WHERE 1=1";
if (!empty($search_input)) {
    $query .= " AND (r_name LIKE ? OR location LIKE ?)";
    $db->query($query, 'ss', '%' . $search_input . '%', '%' . $search_input . '%');
}
if (!empty($price_filter)) {
    if ($price_filter == 'htol') {
        $query .= " ORDER BY avg_price DESC";
    } else if ($price_filter == 'ltoh') {
        $query .= " ORDER BY avg_price ASC";
    }
}
if (!empty($cuisine_filter)) {
    $query .= " AND cuisine = ?";
    $db->query($query, 's', $cuisine_filter);
}
if (!empty($delivery_filter)) {
    $query .= " AND delivery = ?";
    $db->query($query, 'i', $delivery_filter == 'delivery' ? 1 : 0);
}

// Execute the query to retrieve the restaurant data
$result = $db->fetchAll();


?>