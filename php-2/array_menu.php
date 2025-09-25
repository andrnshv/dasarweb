<?php
$menu = array(
    "Home" => "#home",
    "About Us" => array(
        "Our Team" => "#team",
        "Our Story" => "#story",
        "Mission & Vision" => "#mission"
    ),
    "Services" => array(
        "Web Development" => "#web",
        "Mobile Development" => "#mobile",
        "SEO Optimization" => "#seo"
    ),
    "Contact" => "#contact"
);

function displayMenu($menu) {
    echo "<ul>";
    foreach ($menu as $key => $value) {
        if (is_array($value)) {
            echo "<li>$key";
            displayMenu($value);
            echo "</li>";
        } else {
            echo "<li><a href='$value'>$key</a></li>";
        }
    }
    echo "</ul>";
}

displayMenu($menu);
?>