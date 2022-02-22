<?php

/*****
 * 
 * Database Class
 * This is the main class for Crud Operation All Functionality
 * Insert Method = Insert Data Into Database
 * Update Method = Update Data In Database
 * getAll Method = Fetch All table data into database
 * get method  = Fetch only single data into database
 * delete Method = Delete Data into database with specific ID;
 * 
 */

class Database
{
    private $dsn = "mysql:host=localhost;dbname=db_blood";
    private $dbUser = "root";
    private $dbPass = "";
    public $conn;
    private $table;
    private $columns = '*';
    private $where;
    private $orderBy;
    private $limit;
    private $jointable = array();
    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->dbUser, $this->dbPass);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /***
     * 
     * This method collect table name
     * 
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /***
     * 
     * This method collect column name
     * If you show specific column data then write your column name 
     * Otherwise is select all column
     * This method accept only array type data
     * 
     */

    public function column(array $columns)
    {
        if (!isset($this->table)) {
            throw new Exception("No table Found");
        }

        $this->columns = implode(', ', $columns);
        return $this;
    }

    /***
     * 
     * This method accept Where condition
     * If you fetch specific data with condition then you use this method
     * This method accept only array type data
     * 
     */

    public function where(array $where)
    {
        if (!isset($this->table)) {
            throw new Exception("No table Found");
        }

        $whereArr = array();
        if ($where) {
            foreach ($where as $key => $value) {
                $whereArr[] = $key . '=' . "'" . $value . "'";
            }
        }

        if (count($where)) {
            $this->where =  " WHERE " . implode(' AND ', $whereArr);
        } else {
            $this->where = '';
        }

        return $this;
    }

    /****
     * 
     * If you sort your data ascending or Descending Then you call this method
     * This method accept array type data
     * 
     */

    public function orderBy(array $order_by)
    {
        if (!isset($this->table)) {
            throw new Exception("No table Found");
        }

        $order = array();
        if ($order_by) {
            foreach ($order_by as $key => $value) {
                $order[] = $key . ' ' . $value;
            }
        }

        if (count($order)) {
            $this->orderBy = " ORDER BY " . implode(' AND ', $order);
        } else {
            $this->orderBy = '';
        }

        return $this;
    }

    /****
     * 
     * If you fetch limited data Them call this method
     * This method accept only int data.
     * 
     */

    public function limit(int $limit)
    {
        if (!isset($this->table)) {
            throw new Exception("No table Found");
        }

        if ($limit) {
            $this->limit = " LIMIT " . $limit;;
        } else {
            $this->limit = '';
        }

        return $this;
    }

    /***
     * 
     * If you fetch all data than you can call this method
     * before call this method you musth call ta table method
     * This method has no parameter
     * 
     */

    public function getAll()
    {
        if (!isset($this->table)) {
            throw new Exception("No table Found");
        }
        $sql = "SELECT {$this->columns} FROM {$this->table} {$this->where} {$this->orderBy} {$this->limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDo::FETCH_ASSOC);
        return $row;
    }

    /**
     * 
     * If you fetch only single data than you can call this method
     * before call this method you musth call ta table method
     * If you fetch specific data please use Where method.
     * Otherwise this method return first row in your database
     * 
     */

    public function get()
    {
        if (!isset($this->table)) {
            throw new Exception("No table Found");
        }

        if (!empty($this->jointable)) {
            $sql = "SELECT {$this->columns} FROM {$this->table}" . implode(' ', $this->jointable) . "{$this->where}";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
            // echo $sql;
        } else {
            $sql = "SELECT {$this->columns} FROM {$this->table} {$this->where}";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
            // echo $sql;
        }
    }

    public function join($table, $baseColumn, $joinColumn)
    {
        $this->jointable[] = " INNER JOIN {$table} ON {$this->table}.{$baseColumn} = {$table}.{$joinColumn}";
        return $this;
    }

    // public function on($baseColumn, $joinColumn){
    //     $this->baseColumn = $baseColumn;
    //     $this->joinColumn = $joinColumn;
    //     return $this;
    // }
    /***
     * 
     * This method use for Inserting Data
     * It's accept only array type data.
     * your must declare array key in your database table column name
     * suppose you have a table user where a column is name
     * you call this insert method below example
     * $array = array('name' => 'John');
     * $db = new Database();
     * $db->table('user')->insert($array);
     * 
     */

    public function insert(array $data)
    {
        if (!isset($this->table)) {
            throw new Exception("No table Found");
        }
        $prep = array();
        foreach ($data as $key => $value) {
            $prep[':' . $key] = $value;
        }
        $sql = "INSERT INTO {$this->table} (" . implode(', ', array_keys($data)) . ") VALUES (" . implode(', ', array_keys($prep)) . ")";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($prep);
        return true;
    }

    /***
     * 
     * This method use for Update data
     * It's accept Only array data
     * your must declare array key in your database table column name
     * suppose you have a table user where a column is name and update your data which id is 1
     * you call this update method below example
     * $array = array('name' => 'John');
     * $db = new Database();
     * $db->table('user')->where(['id' => 1])->update($array);
     * 
     */

    public function update(array $data)
    {
        if (!isset($this->table)) {
            throw new Exception("No table Found");
        }
        if (!isset($this->where)) {
            throw new Exception("No Condition Found");
        }

        $array = array();
        $bindParam = array();
        foreach ($data as $key => $value) {
            $array[':' . $key] = $key . '=' . "'" . $value . "'";
            $bindParam["'" . $key . "'" . '=>' . $value] = $value;
        }

        $sql = "UPDATE {$this->table} SET " . implode(',', $array) . " {$this->where}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([implode(',', array_keys($bindParam))]);
        return true;
    }

    /***
     * 
     * This method use for Delete data
     * suppose you have a table user where a column is name and delete your data which id is 1
     * you call this delete method below example
     * $db = new Database();
     * $db->table('user')->where(['id' => 1])->delete($array);
     * 
     */

    public function delete()
    {
        if (!isset($this->table)) {
            throw new Exception("No table Found");
        }
        if (!isset($this->where)) {
            throw new Exception("No Condition Found");
        }

        $sql = "DELETE FROM {$this->table} {$this->where}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return true;
    }
}


// $db = new Database();
// // $db->table('member')->column(['member.*','divisios.division_name'])->join('divisions','division','id')->get();
// $username = 'iqbal';

// $member_data = $db->table('member')
// ->column(['member.*','divisions.division_name','districts.district_name','upazilas.upozilla_name'])
// ->join('divisions','division','id')
// ->join('districts','district','id')
// ->join('upazilas','upazilla','id')
// ->where(['username'=>$username])
// ->get();

// print_r($member_data);