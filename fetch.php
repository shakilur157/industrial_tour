<style type="text/css">
    
    #serarchid{
        text-decoration: none;
    }
</style>



<?php
    if($_GET['keyword'] && !empty($_GET['keyword']))
    {
        $conn = mysqli_connect('localhost','root','','tour'); //Connection to my database
        $keyword = $_GET['keyword'];
        $keyword="%$keyword%";
        $query = "select company_name from search where company_name like ?";
        $statement = $conn->prepare($query);
        $statement->bind_param('s',$keyword);
        $statement->execute();
        $statement->store_result();
        if($statement->num_rows() == 0) // so if we have 0 records acc. to keyword display no records found
        {
            echo '<div id="item">No results found </div>';
            $statement->close();
            $conn->close();
 
        }
        else {
            $statement->bind_result($name);
            while ($statement->fetch()) //outputs the records
            {
                echo "<div id='item'><a id = 'serarchid' href='result.php?result=$name'>$name</a></div>";
            };
            $statement->close();
            $conn->close();
        };
    };
?>