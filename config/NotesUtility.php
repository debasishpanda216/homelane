<?php
/**
 * Created by PhpStorm.
 * User: debasish.panda
 * Date: 23-12-2018
 * Time: 13:30
 */
include '../config/DBConnection.php';
class NotesUtility
{
    /**
     * @var
     */
    private $_dbConnection;
    /**
     * @var
     */
    private $_conn;

    public function __construct()
    {
        $this->_dbConnection = DBConnection::getInstance();
        $this->_conn         = $this->_dbConnection->getConnection();
    }


    /**
     * @param $data
     */
    public function saveNote($data){
        $title = $data['title'];
        $text  = $data['text'];
        $title = mysqli_real_escape_string($this->_conn, $title);
        $text = mysqli_real_escape_string($this->_conn, $text);
        date_default_timezone_set('Asia/Kolkata');
        $createdOn = date('Y-m-d H:i:s') ;
        $query = "INSERT INTO notes (title, details, createdon) 
                  VALUES('$title', '$text', '$createdOn')";
        //echo $query;die;
        if (mysqli_query($this->_conn, $query)) {
            echo "New note created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($this->_conn);die;
        }
        $this->_dbConnection->closeConnection();
    }

    /**
     * @param string $sort
     * @param string $keyword
     * @return bool|mysqli_result
     */
    public function fetchAllNotes($sort='',$keyword=''){
        $sql = "SELECT * FROM notes";
        if(trim($keyword) != ''){
            $sql .= " where (title like '%$keyword%' OR details like '%$keyword%')";
        }
        if($sort != '' && ($sort == 'DESC' || $sort == 'ASC')){
            $sql .= " order by createdon $sort";
        }
        //echo $keyword;die;
        $result = $this->_conn->query($sql);
        $this->_dbConnection->closeConnection();
        return $result;
    }


    /**
     * @param $id
     * @return array
     */
    public function fetchNoteDetails($id){
        $sql    = "SELECT * FROM notes where id=$id";
        $result = $this->_conn->query($sql);
        $noteDetails = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $noteDetails = $row;
            }
        }
        $this->_dbConnection->closeConnection();
        return $noteDetails;
    }

    /**
     * @param $data
     */
    public function editNote($data){
        $id    = $data['id'];
        $title = $data['title'];
        $text  = $data['text'];
        $title = mysqli_real_escape_string($this->_conn, $title);
        $text = mysqli_real_escape_string($this->_conn, $text);
        $query = "UPDATE notes SET title='$title' , details='$text' WHERE id=$id";
        if (mysqli_query($this->_conn, $query)) {
            echo "Note details updated successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($this->_conn);die;
        }
        $this->_dbConnection->closeConnection();
    }

    /**
     * @param $data
     */
    public function deleteNote($data){
        $id    = $data['id'];
        $query = "DELETE FROM notes WHERE id=$id";
        //echo $query;die;
        if (mysqli_query($this->_conn, $query)) {
            echo "Note deleted successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($this->_conn);die;
        }
        $this->_dbConnection->closeConnection();
    }


}