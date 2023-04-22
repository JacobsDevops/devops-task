<pre>
<?php

final class QuickDbTest
{
    private const host = 'localhost';
    private const db = 'db_vero_digital';
    private const user = 'sa';
    private const pass = 'Un!q@to2023';
    #private const port = '1433';

    private function connectToDatabase() {
        try {
            $dsn = "sqlsrv:Server=localhost;Database=db_vero_digital;Encrypt=no;TrustServerCertificate=yes;LoginTimeout=45";
            #$dsn = "sqlsrv:Server=".self::host.";""Database=".self::db;
            #$dsn = "sqlsrv:Server=tcp:localhost,1433;Database=db_vero_digital;Encrypt=no;TrustServerCertificate=yes";       
            $connection = new PDO($dsn, "sa", "Un!q@to2023");
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
            $this->quickLog(['conf' => [self::host, self::db, self::user],'sqlsrv_errors' => $e->getMessage()], 'DB failed to connect.');
        }
        return $connection;
    }

    private function quickLog($message, $obituaryLetter = '')
    {
        echo gmdate('[Y-m-d\TH:i:s\Z] - ') . print_r($message, true) . PHP_EOL;
        if ($obituaryLetter) {
            die($obituaryLetter);
        }
    }

    public function runDbTest()
    {
        $db = $this->connectToDatabase();
        $sql = "
            IF NOT EXISTS(SELECT * FROM sysobjects WHERE name ='testing_table' AND xtype='U')
            BEGIN
                CREATE TABLE testing_table
                (
                    congratulations VARCHAR(255) NOT NULL,
                    stars INT NOT NULL
                )
                INSERT INTO testing_table (congratulations, stars)
                VALUES
                ('Success!!!', 1),
                ('You did it!!!', 2)
            END
        ";
        $db->query($sql);
        $sql = "SELECT * FROM testing_table";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

echo json_encode((new QuickDbTest())->runDbTest(), JSON_PRETTY_PRINT);

?></pre>
