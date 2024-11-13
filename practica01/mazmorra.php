<html>
<head>
    <style>
            table, td  {
                border-collapse: collapse;
                padding: 0;
            }
    </style>
</head>
<body>
<table>
    <?php
        $array = [
            ["E", "E", "E", "E"],
            ["E", "ETE", "E", "E"],
            ["ET", "TIE", "E", "ET"],
            ["EI", "IT", "T", "TI"]   
        ];
        function mazmorra($tiles) {
            foreach($tiles as $tile){
                echo "<tr>" ;
                foreach($tile as $imagen) {
                    echo "<td>" ;
                    echo "<img src='tiles/$imagen.png'>";
                    echo "</td>" ;  
                }
                echo "</tr>" ;
            }
        }
    mazmorra($array);
    ?>
</table>
</body>
</html>