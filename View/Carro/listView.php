<?= require("header.php");?>
<link rel="stylesheet" href="../Assets/css/app.css">
<h1 style="text-align: center;">CARROS</h1>
<br />
<table border="1px solid grey;" style="margin:auto; width: 70%;" cellpadding="14px;" cellspacing="4px;">
        <th>Name</th>
        <th>Color</th>
        <th>Status</th>
<?php
        foreach($params as $car)
        {

                $status = ($car["status"] == 1) ? "disponivel" : "nao disponivel";
               echo "<tr>
                        <td>
                            ".$car['name']."
                        </td>
                        <td>
                            ".$car['color']."
                        </td>
                        <td>
                            ".$status."
                        </td>
                    </tr>";

        }
?>
</table>