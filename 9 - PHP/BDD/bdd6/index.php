<?php
    require_once 'Paginator.class.php';
 
    $conn       = new mysqli( 'localhost', 'root', '', 'proves' );
 
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    $query      = "SELECT * FROM customers";
 
    $Paginator  = new Paginator($conn, $query );
 
    $results    = $Paginator->getData( $page, $limit );
?>
<html>
    <head>
        <title>PHP Pagination</title>
    </head>
    <body>
        <div class="container">
                <div class="col-md-10 col-md-offset-1">
                <h1>PHP Pagination</h1>
                <table class="table table-striped table-condensed table-bordered table-rounded">
                        <thead>
                        <tr>
                                <th>CustomerID</th>
                                <th>CompanyName</th>
                                <th>ContactName</th>
                                <th>ContactTitle</th>
                                <th>Adress</th>
                                <th>City</th>
                                <th>PostalCode</th>
                                <th>Country</th>
                        </tr>
                        <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
                            <tr>
                                    <td><?php echo $results->data[$i]['CustomerID']; ?></td>
                                    <td><?php echo $results->data[$i]['CompanyName']; ?></td>
                                    <td><?php echo $results->data[$i]['ContactName']; ?></td>
                                    <td><?php echo $results->data[$i]['ContactTitle']; ?></td>
                                    <td><?php echo $results->data[$i]['Address']; ?></td>
                                    <td><?php echo $results->data[$i]['City']; ?></td>
                                    <td><?php echo $results->data[$i]['PostalCode']; ?></td>
                                    <td><?php echo $results->data[$i]['Country']; ?></td>
                            </tr>
                        <?php endfor; ?>
                        </thead>
                        <tbody></tbody>
                </table>
                </div>
        </div>
        <?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?> 
        </body>
</html>