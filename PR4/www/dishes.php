<?php
function openmysqli(): mysqli {
    $connection = new mysqli('db', 'user', 'password', 'appDB');
    return $connection;
}
function outputStatus($status, $message)
{
    echo '{status: ' . $status . ', message: "' . $message . '"}';
}
try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            addDish();
            break;
        case 'DELETE':
            removeDish();
            break;
        case 'PATCH':
            updateDishCost();
            break;
        case 'GET':
            getDishByID();
            break;
        default:
            outputStatus(2, 'Invalid Mode');
    }
}
catch (Exception $e) {
    $message = $e->getMessage();
    outputStatus(2, $message);
};

function addDish() {
    $data = json_decode(file_get_contents('php://input'), True);
    
    if (!isset($data['dishName']) || !isset($data['cost'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $dishName = $data['dishName'];
    $dishCost = $data['cost'];
    $result = $mysqli->query("SELECT * FROM dishes WHERE dishName = '{$dishName}';");
    if ($result->num_rows === 1) {
        $message = 'Dish '. $dishName . ' already exists';
        outputStatus(1, $message);
    } else {
        $query = "INSERT INTO dishes (dishName, cost)
        VALUES ('" . $dishName . "', '" . $dishCost . "');";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Added dish ' . $dishName;
        outputStatus(0, $message);
    }
}
function removeDish()
{
    if (!isset($_GET['id'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $dishID = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM dishes WHERE ID = '{$dishID}';");
    if ($result->num_rows === 1) {
        $query = "DELETE FROM dishes WHERE ID = '" . $dishID . "';";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Removed dish ' . $dishID;
        outputStatus(0, $message);
    } else {
        $message = 'Dish ' . $dishID . ' does not exist';
        outputStatus(1, $message);
    }
}
function updateDishCost()
{
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['dishName']) || !isset($data['cost'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $dishName = $data['dishName'];
    $dishCost = $data['cost'];
    $result = $mysqli->query("SELECT * FROM dishes WHERE dishName = '{$dishName}';");
    if ($result->num_rows === 1) {
        $query = "UPDATE dishes SET cost = '" . $dishCost . "' WHERE dishName = '" . $dishName . "';";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Changed cost for ' . $dishName;
        outputStatus(0, $message);
    } else {
        $message = $dishName . ' does not exist';
        outputStatus(1, $message);
    }
}
function getDishByID()
{
    if (!isset($_GET['id'])) {
        $mysqli = openMysqli();
        $result = $mysqli->query("SELECT * FROM dishes;");
        echo "{\nstatus: 0\n";
        foreach ($result as $info) {
            echo"dishName: '" . $info['dishName'] . "', cost: '" . $info['cost'] . "';\n";
        }
        echo "}";
        $mysqli->close();
    }
    else {
        $mysqli = openMysqli();
        $dishID = $_GET['id'];
        $result = $mysqli->query("SELECT * FROM dishes WHERE ID = '{$dishID}';");
        if ($result->num_rows === 1) {
            foreach ($result as $info) {
                echo "{status: 0, dishName: '" . $info['dishName'] . "', cost: '" . $info['cost'] . "';}";
            }
            $mysqli->close();
        } else {
            $message = 'Dish ID '. $dishID . ' does not exist';
            outputStatus(1, $message);
        }
    }
}
?>

