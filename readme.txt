To start the project:


1 -> Copy and paste the blogpoo.sql file in your SGBD and run it.


2 -> Create a new class (Database.php) in libraries folder as in the example :

class Database {

    private static $instance = null;

    public static function getPdo(){

        if(self::$instance === null){
            self::$instance = new PDO( *YOUR DSN* , *YOUR DB USER* , *YOUR DB PASSWORD*, [
                PDO::ERRMODE_EXCEPTION => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$instance;

    }

}

Replace *YOUR DSN*, *YOUR DB USER* and *YOUR DB PASSWORD* by your informations. 