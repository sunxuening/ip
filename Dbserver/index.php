<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$config=array(
$config=array(
	 'secret'=>'liangwei', //填写通信密匙
	 'host'=>SAE_MYSQL_HOST_M, //数据库服务器地址
	 'port'=>SAE_MYSQL_PORT, //数据库服务器地址端口，
	 'username'=>SAE_MYSQL_USER, //数据库用户名
	 'password'=>SAE_MYSQL_PASS, //数据库密码
	 'dbname'=>SAE_MYSQL_DB, //选择使用哪个数据库
	 'charset'=>'utf8' //编码，默认utf8
);
if(isset($_POST['secret'])){
	$secret=$_POST['secret'];
	$optype=$_POST['optype'];
    $ip=$_POST['ip'];
	$bsql=$_POST['bsql'];
	$sql=base64_decode($bsql);
	$removemysql=new removeMysql($secret,$config);
	if(!empty($removemysql))$removemysql->$optype($sql);
}

/**
* 		远程数据库服务端类
*/
class removeMysql 
{
	private $conn;

	function __construct($secret,$config)
	{
		if($secret!=$config['secret']){
			$Info['errno']=-1;//密匙不正确
			$Info['error_mess']='secret is not miss';
			echo json_encode($Info);
			exit();

		}
		$this->db_connect($config);

		
	}

	/**
	 *	链接数据库
	 */
	function db_connect($c){
	    $server = $c['host'] . ':' . $c['port'];
	    $this->conn = mysql_connect($server, $c['username'], $c['password'], true) or die('connect db error');
	    mysql_select_db($c['dbname'], $this->conn) or die('select db error');
	    if($c['charset']){
	        mysql_query("set names " . $c['charset'], $this->conn);
	    }
	}

    public function query($sql){

        $result = mysql_query($sql, $this->conn);
        return $result;
    }

	/**
	 *	
	 */
	function json_echo($Info){
        $Info['errno']=mysql_errno();
        $Info['error_mess']=mysql_error();
		echo json_encode($Info);
		exit();
	}

    /**
     *  只执行sql语句，不返还执行后数据，只返回执行状态
     */
    public function query_sql($sql){
        $result = $this->query($sql);
        $Info=array();
        $this->json_echo($Info);
    }

    /**
     * 执行 SQL 语句, 返回结果的第一条记录
     */
    public function get($sql){
        $result = $this->query($sql);
        if($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $Info['row'] = $row;
        }
        $this->json_echo($Info);
    }

    /**
     * 执行 SQL 语句, 返回结果的多条记录
     */
    public function gets($sql){
        $result = $this->query($sql);
        $rows=array();
        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $rows[] = $row;
        }
        if($rows)$Info['rows']=$rows;
        $this->json_echo($Info);
    }

    /**
     * 执行一条带有结果集计数的 count SQL 语句, 并返该计数.
     */
    public function count($sql){
        $result = $this->query($sql);
        if($row = mysql_fetch_array($result)){
            $Info['count'] = (int)$row[0];;
        }
        $this->json_echo($Info);
    }

    /**
     * 保存一条记录, 返回新插入的id(若id存在的话).
     */
    public function save($sql){
        $result = $this->query($sql);
        $Info['last_insert_id'] =mysql_insert_id();
        $this->json_echo($Info);
    }

    /**
     *  更新
     */
    public function update($sql){
        $result = $this->query($sql);
        $Info=array();
        $this->json_echo($Info);
    }

    /**
     *  删除
     */
    public function remove($sql){
        $result = $this->query($sql);
        $Info=array();
        $this->json_echo($Info);
    }

};

?>