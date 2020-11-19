<?php
if (isset($averateRatings)) {
    //5 start
    if ($averateRatings > 4.80) {
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
    }elseif ($averateRatings >= 4.00 && $averateRatings < 4.50) {
        //4 star
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
    
    }elseif ($averateRatings >= 4.50 && $averateRatings < 4.80) {
        //4.5 star
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/half_star.svg'>";
    
    }elseif ($averateRatings >= 3.00 && $averateRatings < 3.50) {
        //3 star
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
    
    }elseif ($averateRatings >= 3.50 && $averateRatings < 4.00) {
        //3.5 star
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/half_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
    
    }elseif ($averateRatings >= 2.00 && $averateRatings < 2.50) {
        //2 star
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
    
    }elseif ($averateRatings >= 2.50 && $averateRatings < 3.00) {
        //2.5 star
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/half_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
    }elseif ($averateRatings >= 1.00 && $averateRatings < 1.50) {
        //1 star
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
    
    }elseif ($averateRatings >= 1.50 && $averateRatings < 2.00) {
        //1.5 star
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/half_star.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
    }else{
        //no reviews
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
        echo "<img style='width:20px; display: inline-block;' src='/assets/svg/not_rating.svg'>";
    }
} 
?>