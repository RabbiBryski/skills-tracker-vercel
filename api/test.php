<?php
// Test connection to Supabase PostgreSQL
$host = "aws-1-us-east-2.pooler.supabase.com";
$port = "6543";
$dbname = "postgres";  
$username = "postgres.cvurarqxreipwhsrqelk";
$password = "9!_gmPJP.JxQLh4"; // Replace with your Supabase password

$connection_string = "host=$host port=$port dbname=$dbname user=$username password=$password sslmode=require";

echo "Attempting to connect to Supabase...<br>";

$conn = pg_connect($connection_string);

if (!$conn) {
    echo "Connection failed!<br>";
    echo "Error: " . pg_last_error() . "<br>";
} else {
    echo "Connected successfully to PostgreSQL!<br>";
    
    // Test a simple query
    $result = pg_query($conn, "SELECT COUNT(*) as table_count FROM information_schema.tables WHERE table_schema = 'public'");
    if ($result) {
        $row = pg_fetch_assoc($result);
        echo "Number of tables in database: " . $row['table_count'] . "<br>";
    }
    
    pg_close($conn);
}
?>
