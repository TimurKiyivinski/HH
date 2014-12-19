<?php
//Rating Display System (Find a way to hide it)
if ($accommodation_item['rating'] == 1)
{
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
}
else if ($accommodation_item['rating'] == 2)
{
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
}
else if ($accommodation_item['rating'] == 3)
{
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
}
else if ($accommodation_item['rating'] == 4)
{
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
}
else if ($accommodation_item['rating'] == 5)
{
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarFilledButton.png'>";
}
else if ($accommodation_item['rating'] == 0)
{
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
    echo "<img class = 'ratings' src='http://localhost/HH/public/images/StarHollowButton.png'>";
}
?>
